<?php

   require_once("database.php");

class users{
    public function createUser($name, $contact, $email, $location, $username, $password, $position){
        global $database;
        $query = "INSERT INTO `users`(`name`, `contact`, `email`, `location`, `username`, `password`, `position`) VALUES ('$name', '$contact','$email', '$location', '$username','$password', '$position')";
        $result = $database->exec_query($query);
        if ($result ==1){
            return "User Created Successfully";
        }else{
            return "User Creation Failed";
        }
    }

    public function editUser($name, $contact, $email, $location, $username, $password, $position, $id){
        global $database;
        $query = "UPDATE `users` SET `name`='$name',`contact`='$contact',`email`='$email',`location`='$location',`username`='$username',`password`='$password',`position`='$position' WHERE `id`=".$id;
        $result = $database->exec_query($query);
        if ($result ==1){
            return "User Updated Successfully";
        }else{
            return "User Update Failed";
        }
    }

    public function loadUsers(){
        global $database;
        $query = "Select * from users";
        $result = $database->exec_query($query);
        return $result;
    }

    public function loadSales(){
        global $database;
        $query = "Select * from users where position = 'Sales'";
        $result = $database->exec_query($query);
        return $result;
    }



    public function activate($id, $status){
        global $database;
        $query = "";
        $result = "";
        if($status == 1){
            $query = "Update users set status=0 where id=".$id;
            $result = "User Deactivated Successfully";
        }else{
            $query = "Update users set status=1 where id=".$id;
            $result = "User Activated Successfully";
        }

        if($database->exec_query($query) == 1){
            echo $result;
        }else{
            echo "Activation/Deactivation Failed";
        }

    }

    public function login($username,$password ){
        global $database;
        $query  = "Select * from users where username ='$username' and password = '$password' limit 1";
        $result = $database->exec_query($query);
        $num    = mysqli_num_rows($result);
        if($num > 0){
            while($rows = $database->fetchArray($result)){
                setcookie('user_id',$rows[0]);
                setcookie('username', $rows[5]);
                //echo "success";
                header('Location:trans.php');
                //return "success";
            }
        }else{
            return '<script type="text/javascript">
                        alert("Username or Password Incorrect");
                   </script>';
            //echo "Username or Password Incorrect";
        }
    }



}

?>