<?php
    require_once("database.php");

class trans{
    public function createTransaction($type, $date, $client, $amount){
        global $database;
        $balance="";
        $query = "Select balance from clients where id=".$client;
        $result = $database->exec_query($query);
        while($rows = $database->fetchArray($result)){
            $balance = $rows[0];
        }
        if($type == "Withdrawal"){
            $balance = $balance - $amount;
        }elseif($type == "Deposit"){
            $balance = $balance + $amount;
        }
        if($balance <0){
            return "Insufficient Funds in this Account";
        }
 
        $user= $_COOKIE['user_id'];
        $query = "INSERT INTO `transactions`(`type`, `date`, `client`, `amount`, `balance`, `user`) VALUES ('$type','$date', $client, $amount, $balance, $user  )";
        $result = $database->exec_query($query);
        if ($result == 1){
            $query = "Update clients set balance=".$balance." where id=".$client;
            $result = $database->exec_query($query);
            if($result == 1){
                return "Transaction Created Successfully";
            }else{
                return "Transaction Creation Failed";
            }

        }else{
            return "Transaction Creation Failed";
        }
    }

    public function loadTrans(){
        global $database;
        $query = "SELECT transactions.id, transactions.type, transactions.date, clients.name, transactions.amount, transactions.balance, users.name
FROM transactions, users, clients
WHERE transactions.user = users.id
AND transactions.client = clients.id ORDER BY id DESC";
        $result = $database->exec_query($query);
        return $result;
    }

    public function loadOneTrans(){
        global $database;
        $query = "SELECT transactions.id, transactions.type, transactions.date, clients.name, transactions.amount, transactions.balance, users.name
FROM transactions, users, clients
WHERE transactions.user = users.id
AND transactions.client = clients.id ORDER BY id DESC limit 1";
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