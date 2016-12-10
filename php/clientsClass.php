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
        $year = date("Y");
        global $database;
        $query = "INSERT INTO `clients`(`name`,`contact`,`email`, `location`,`nextOfKin`,`salesPerson`,`unitContribution`, `houseNumber`, `dateOfBirth`,`sex`,`accountType`) VALUES ('$name', '$contact', '$email', '$location','$nextOfKin','$salesPerson', '$unitContribution', '$houseNumber', '$dateOfBirth','$sex','$accountType')";
        $result = $database->exec_query($query);
        if ($result ==1){
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
        global $database;
        $query = "UPDATE `clients` SET `name` ='$name',`contact`='$contact',`email`='$email', `location` ='$location',`nextOfKin` = '$nextOfKin',`salesPerson` ='$salesPerson',`unitContribution` ='$unitContribution', `houseNumber` ='$houseNumber', `dateOfBirth`='$dateOfBirth',`sex`='$sex',`accountType` ='$accountType' WHERE `id`=".$id;
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