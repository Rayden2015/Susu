<?php
    require_once("database.php");

class clients{
    public function createClient($name, $contact, $email, $location, $picture){
        $year = date("Y");
        global $database;
        $query = "INSERT INTO `clients`(`name`, `contact`, `email`, `location`, `picture`, `year`) VALUES ('$name', '$contact', '$email', '$location', '', '$year')";
        $result = $database->exec_query($query);
        if ($result ==1){
            return "Client Created Successfully";
        }else{
            return "Client Creation Failed";
        }
    }

    public function editClient($name, $contact, $email, $location, $picture,$id){
        global $database;
        $query = "UPDATE `clients` SET `name`='$name',`contact`='$contact',`email`='$email',`location`='$location' WHERE `id`=".$id;
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