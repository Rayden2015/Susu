<?php
    require_once("database.php");

class trans{

    
    public function createTransaction($type, $date, $client, $amount,$sales){
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
        $query = "INSERT INTO `transactions`(`type`, `date`, `client`, `amount`, `balance`, `user`,`sales`) VALUES ('$type','$date', $client, $amount, $balance, $user, '$sales' )";
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
        $date = date('d-M-Y');
        $query = "SELECT transactions.id, transactions.type, transactions.date, clients.name, transactions.amount, transactions.balance, users.name,transactions.sales
            FROM transactions, users, clients
            WHERE transactions.user = users.id
            AND transactions.client = clients.id
            AND transactions.date LIKE '$date%'
            ORDER BY id DESC";
        $result = $database->exec_query($query);
        return $result;
    }

    public function loadOneTrans(){
        global $database;
        $query = "SELECT transactions.id, transactions.type, transactions.date, clients.name, transactions.amount, transactions.balance, users.name, transactions.sales
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

    public function loadTransWithin($start, $end){
        global $database;
        $query = "";
        if($end == ''){
            $query = "SELECT transactions.id, transactions.type, transactions.date, clients.name, transactions.amount, transactions.balance, users.name,transactions.sales
            FROM transactions, users, clients
            WHERE transactions.user = users.id
            AND transactions.client = clients.id
            AND `date` like '$start%' ORDER by id DESC";
        }else{
            $query = "SELECT transactions.id, transactions.type, transactions.date, clients.name, transactions.amount, transactions.balance, users.name,transactions.sales
            FROM transactions, users, clients
            WHERE transactions.user = users.id
            AND transactions.client = clients.id
            AND `date` >= '$start' AND `date` <= '$end'  ORDER by id DESC";
        }

        $result = $database->exec_query($query);
        return $result;
    }


}

?>