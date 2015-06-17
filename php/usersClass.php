<?php
    require_once("database.php");

class users{
    public function createUser($name, $contact, $email, $location, $username, $password, $position){
        global $database;
        $query = "INSERT INTO `users`(`name`, `contact`, `email`, `location`, `username`, `password`, `position`) VALUES ('$name', '$contact','$email', '$location', '$username','$password', SHA1('$position'))";
        $result = $database->exec_query($query);
        if ($result ==1){
            return "User Created Successfully";
        }else{
            return "User Creation Failed";
        }
    }

    public function loadUsers(){
        global $database;
        $query = "Select * from users";
        $result = $database->exec_query($query);
        return $result;
    }

    public function login($username,$password ){
        global $database;
        $query  = "Select * from users where username ='$username' and password = '$password' limit 1";
        $result = $database->exec_query($query);
        $num    = mysqli_num_rows($result);
        if($num > 0){
            while($rows = $database->fetchArray($result)){
                setcookie('userId',$rows[0]);
                setcookie('username', $rows[5]);
                echo "success";
            }
        }else{
            echo "Username or Password Incorrect";
        }
    }



}

?>