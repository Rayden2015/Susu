<?php
    require_once("database.php");

class clients{

    public function clients_per_salesPerson($salesPerson){
        global $database;
        $query = "Select * from clients where salesPerson ='$salesPerson'";
        $result = $database->exec_query($query);
        return $result;
    }

    public function createClient($name, $contact, $email, $location, $picture,$nextOfKin,$salesPerson, $unitContribution, $houseNumber, $dateOfBirth, $sex, $accountType){
        //return $_FILES["picture"]["name"];

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
        $query = "INSERT INTO `clients`(`picture`,`name`,`contact`,`email`, `location`,`nextOfKin`,`salesPerson`,`unitContribution`, `houseNumber`, `dateOfBirth`,`sex`,`accountType`) VALUES ('$picture','$name', '$contact', '$email', '$location','$nextOfKin','$salesPerson', '$unitContribution', '$houseNumber', '$dateOfBirth','$sex','$accountType')";

        $result = $database->exec_query($query);
        if ($result == 1){
            $query = "Select id from clients order by id desc limit 1";
            $result = $database->exec_query($query);
            $id = "";
            while($rows = $database->fetchArray($result)){
                $id = $rows[0];
            }
            $acc = str_pad($id, 4, "0", STR_PAD_LEFT);
            $acc = "CCSS".$acc;
            $query = "Update clients set accountNumber = '$acc' where id=".$id;

            $result = $database->exec_query($query);

            if($result == 1){
                return "Client Created Successfully";
            }else{
                return "Client Creation Failed";
            }

        }else{
            return "Client Creation Failed";
        }
    }

     public function editClient($name, $contact, $email, $location, $picture,$nextOfKin,$salesPerson, $unitContribution, $houseNumber, $dateOfBirth, $sex,$accountType,$id){
         $target_dir = "\uploads/";
         $target_file = $target_dir . basename($_FILES["picture"]["name"]);
        if(is_uploaded_file($_FILES["picture"]["tmp_name"])){
            define ('SITE_ROOT', realpath(dirname(__FILE__)));


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
        }


         global $database;
         $picture = $_FILES["picture"]["name"];
        $query = "UPDATE `clients` SET `name` ='$name',`contact`='$contact',`email`='$email', `location` ='$location',`nextOfKin` = '$nextOfKin',`salesPerson` ='$salesPerson',`unitContribution` ='$unitContribution', `houseNumber` ='$houseNumber', `dateOfBirth`='$dateOfBirth',`sex`='$sex',`accountType` ='$accountType', `picture`='$picture' WHERE `id`=".$id;
        $result = $database->exec_query($query);
        if ($result ==1){
            return "Client Updated Successfully";
        }else{
            return "Client Update Failed";
        }
    }

    public function loadClients(){
        global $database;
        $query = "Select * from clients order by id desc";
        $result = $database->exec_query($query);
        return $result;
    }

    public function loadSales(){
        global $database;
        $query = "Select * from users  where  position = 'Sales' order by name asc";
        $result = $database->exec_query($query);
        return $result;
    }

    public function activate($id, $status){
        global $database;
        $query = "";
        $result = "";
        if($status == 1){
            $query = "Update clients set status=0 where id=".$id;
            $result = "Client Deactivated Successfully";
        }else{
            $query = "Update clients set status=1 where id=".$id;
            $result = "Client Activated Successfully";
        }

        if($database->exec_query($query) == 1){
           echo $result;
        }

    }

}

?>