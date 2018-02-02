<?php
/**
 * Created by PhpStorm.
 * User: Dell
 * Date: 1/10/2018
 * Time: 5:41 PM
 */


class Connection{
    private $dbhost;
    private $dbuser;
    private $dbname;
    private $dbpass;

    /**
     * @return mixed
     */
    public function getDbhost()
    {
        return $this->dbhost;
    }

    /**
     * @param mixed $dbhost
     */
    public function setDbhost($dbhost)
    {
        $this->dbhost = $dbhost;
    }

    /**
     * @return mixed
     */
    public function getDbuser()
    {
        return $this->dbuser;
    }

    /**
     * @param mixed $dbuser
     */
    public function setDbuser($dbuser)
    {
        $this->dbuser = $dbuser;
    }

    /**
     * @return mixed
     */
    public function getDbname()
    {
        return $this->dbname;
    }

    /**
     * @param mixed $dbname
     */
    public function setDbname($dbname)
    {
        $this->dbname = $dbname;
    }

    /**
     * @return mixed
     */
    public function getDbpass()
    {
        return $this->dbpass;
    }

    /**
     * @param mixed $dbpass
     */
    public function setDbpass($dbpass)
    {
        $this->dbpass = $dbpass;
    }


    public function  __construct($host, $user, $name, $pass)
    {
        $this->setDbpass($pass);
        $this->setDbuser($user);
        $this->setDbhost($host);
        $this->setDbname($name);

    }


    public  function  EstablishConn(){
        $conn = new PDO('mysql:host='.$this->getDbhost().';'.$this->getDbname(), $this->getDbuser(),$this->getDbpass());

        try{
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//            echo "Connection Established";
            return $conn;
        }catch (PDOException $e){
//            echo "Connection NOT Established: ".$e;
            return false;
        }

    }


}



class Register{

    function registerUser($db, $email, $password, $name){
        $tableName = "loginsystem.users";

        $query = $db->prepare("SELECT * FROM $tableName WHERE email= ?");
        $query->execute([$email]);

        if($query->rowCount()>0){
            echo "<script>location='register.php?err=".urldecode('Email already exists')."'</script>";
            exit();
        }else{
            $hash = password_hash($password, PASSWORD_DEFAULT);
            $token = bin2hex(openssl_random_pseudo_bytes(64));


            $stmt = $db->prepare("INSERT INTO $tableName SET name=?, email=?, status=?, token=?, password=?");
            $stmt->execute([$name, $email, 0, $token, $hash]);

            $msg = "Hello $name, Thanks for registering. Click on the following link to activate your account. localhost/loginSystem/activate.php?token=".$token;
            mail($email, 'Account Activation', $msg, 'From: k152123@nu.edu.pk');

            echo "<script>location='register.php?succ=".urldecode("An email has been sent to you")."'</script>";
            exit();
        }
    }

    function resetPasswordRequest($db, $email){
        $tableName = "loginsystem.users";

        $query = $db->prepare("SELECT * FROM $tableName WHERE email= ?");
        $query->execute([$email]);

        if($query->rowCount()==0){
            echo "<script>location='forgot_password.php?err=".urldecode('No such email exists')."'</script>";
            exit();
        }else{
            $token = bin2hex(openssl_random_pseudo_bytes(64));

            $stmt = $db->prepare("UPDATE $tableName SET token=? WHERE email=?");
            $stmt->execute([$token, $email]);

            $msg = "To complete the process of resetting password, please click on the link below. If you did not requested to reset password then please ignore this email localhost/loginSystem/reset_password.php?token=".$token;
            mail($email, 'Password reset', $msg, 'From: k152123@nu.edu.pk');

            echo "<script>location='forgot_password.php?succ=".urldecode("An email has been sent to you to reset your password.")."'</script>";
            exit();
        }
    }


    function resetPassword($db, $token, $password){
        $tableName = "loginsystem.users";

        $query = $db->prepare("SELECT * FROM $tableName WHERE token= ?");
        $query->execute([$token]);

        if($query->rowCount()==0){
            echo "<script>location='forgot_password.php?err=".urldecode('Invalid Token')."'</script>";
            exit();
        }else{
            $token = bin2hex(openssl_random_pseudo_bytes(64));
            $hash = password_hash($password, PASSWORD_DEFAULT);


            $stmt = $db->prepare("UPDATE $tableName SET password=?, token=? WHERE token=?");
            $stmt->execute([$hash,$token,$token]);


            $query = $db->prepare("SELECT * FROM $tableName WHERE token= ?");
            $query->execute([$token]);

            $name = '';
            $email = '';
            $result = $query->setFetchMode(PDO::FETCH_ASSOC);
            foreach ($query->fetchAll() as $k => $v){
                $name = $v['name'];
                $email = $v['email'];
            }

            $msg = "Dear $name, Your password has been successfully updated.";
            mail($email, 'Password Updated', $msg, 'From: k152123@nu.edu.pk');

            echo "<script>location='forgot_password.php?succ=".urldecode("Password Updated")."'</script>";
            exit();
        }
    }


}





class Login{

    function loginUser($db, $email, $password){
        $tableName = "loginSystem.users";

        $stmt = $db->prepare("SELECT * FROM $tableName WHERE email=?");
        $stmt->execute([$email]);

        $hash = '';
        $user_id = -99;
        $name = '';
        $hash = '';

        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        foreach ($stmt->fetchAll() as $k => $v){
            $hash = $v['password'];
            $user_id = $v['id'];
            $user_status = $v['status'];
            $name = $v['name'];
            $email = $v['email'];
        }


        if(password_verify($password,$hash)){
            if($user_status==1){
                $user = new User();
                $user->setUserStatus($user_status);
                $user->setUserId($user_id);
                $user->setEmail($email);
                $user->setName($name);

                $_SESSION['user_obj'] = $user;
                header('Location: index.php');
                exit();
            }else{
                echo "<script>location='login.php?err=".urldecode("Your account is not activated yet.")."'</script>";
                exit();
            }


        }else{
            echo "<script>location='login.php?err=".urldecode("Incorrect login credentials")."'</script>";
            exit();
        }

    }
}




class User{
    private $user_id;
    private $user_status;
    private $name;
    private $email;

    /**
     * @return mixed
     */
    public function getUserId()
    {
        return $this->user_id;
    }

    /**
     * @param mixed $user_id
     */
    public function setUserId($user_id)
    {
        $this->user_id = $user_id;
    }

    /**
     * @return mixed
     */
    public function getUserStatus()
    {
        return $this->user_status;
    }

    /**
     * @param mixed $user_status
     */
    public function setUserStatus($user_status)
    {
        $this->user_status = $user_status;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }
}

?>

