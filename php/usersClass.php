<?php

   require_once("database.php");

class users{
    public function createUser($name, $contact, $email, $location, $username, $password, $position,$picture){
        define ('SITE_ROOT', realpath(dirname(__FILE__)));

        $target_dir = "\uploads/";
        $picture = $_FILES["picture"]["name"];
        $target_file = $target_dir . basename($_FILES["picture"]["name"]);

        //return move_uploaded_file($_FILES["picture"]["tmp_name"], SITE_ROOT.$target_file);

        $uploadOk = 1;
        $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
        // Check if image file is a actual image or fake image

        $check = getimagesize($_FILES["picture"]["tmp_name"]);
        if($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }

        // Check if file already exists
        if (file_exists($target_file)) {
            echo "Sorry, file already exists.";
            $uploadOk = 0;
        }

        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif" ) {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
            // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["picture"]["tmp_name"], SITE_ROOT.$target_file)) {
                echo "The file ". basename( $_FILES["picture"]["name"]). " has been uploaded.";
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }

        $picture = $_FILES["picture"]["name"];
        global $database;
        $query = "INSERT INTO `users`(`name`, `contact`, `email`, `location`, `username`, `password`, `position`,`picture`) VALUES ('$name', '$contact','$email', '$location', '$username','$password', '$position','$picture')";
        $result = $database->exec_query($query);
        if ($result ==1){
            return "User Created Successfully";
        }else{
            return "User Creation Failed";
        }
    }

    public function editUser($name, $contact, $email, $location, $username, $password, $position,$picture, $id){
        define ('SITE_ROOT', realpath(dirname(__FILE__)));

        $target_dir = "\uploads/";
        $picture = $_FILES["picture"]["name"];
        $target_file = $target_dir . basename($_FILES["picture"]["name"]);

        //return move_uploaded_file($_FILES["picture"]["tmp_name"], SITE_ROOT.$target_file);

        $uploadOk = 1;
        $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
        // Check if image file is a actual image or fake image

        $check = getimagesize($_FILES["picture"]["tmp_name"]);
        if($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }

        // Check if file already exists
        if (file_exists($target_file)) {
            echo "Sorry, file already exists.";
            $uploadOk = 0;
        }

        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif" ) {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
            // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["picture"]["tmp_name"], SITE_ROOT.$target_file)) {
                echo "The file ". basename( $_FILES["picture"]["name"]). " has been uploaded.";
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }


        global $database;
        $query = "UPDATE `users` SET `name`='$name',`contact`='$contact',`email`='$email',`location`='$location',`username`='$username',`password`='$password',`position`='$position', `picture`='$picture' WHERE `id`=".$id;
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