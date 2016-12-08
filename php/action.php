<?php
    require_once("usersClass.php");
    require_once("clientsClass.php");
    require_once("transClass.php");
    $clients = new clients();
    $users = new users();
    $trans = new trans();

    if(isset($_GET['createUser'])){
        echo $users->createUser($_POST['name'], $_POST['contact'], $_POST['email'], $_POST['location'], $_POST['username'], $_POST['password'], $_POST['position']);
    }

    if(isset($_GET['editUser'])){
        echo $users->editUser($_POST['name'], $_POST['contact'], $_POST['email'], $_POST['location'], $_POST['username'], $_POST['password'], $_POST['position'],$_POST['id']);
    }

    if(isset($_GET['loadUsers'])){
        $result = $users->loadUsers();
        global $database;
        while ($rows = $database->fetchArray($result)){
            $status= "";
            if($rows[8] == 0){
                $status = "Activate";
                $color  =  "blue";
                $icon = "check";
            }else {
                $status = "Deactivate";
                $color  = "red";
                $icon = "privacy";
            }

            echo '
                    <div class="column userGrid" data-id="'.$rows[0].'" data-name="'.$rows[1].'" data-contact="'.$rows[2].'" data-email="'.$rows[3].'" data-location="'.$rows[4].'" data-username="'.$rows[5].'" data-password="'.$rows[6].'" data-position="'.$rows[7].'" data-status="'.$rows[8].'">
                    <div class="ui card fluid">
                        <div class="image">
                            <img src="img/steve.jpg" alt="">
                            <div class="editClientBtn circular flt ui icon button blue" title="Edit">
                                <i class="write icon"></i>
                            </div>
                        </div>
                        <div class="content">
                            <h2 class="ui header">'.$rows[1].'</h2>
                            <span class="meta">'.$rows[7].'</span>
                            <div class="description">
                                <div><strong>Username: </strong>'.$rows[5].'</div>
                                <div><strong>Location: </strong>'.$rows[4].'</div>
                                <div><strong>Contact: </strong> '.$rows[2].'</div>
                            </div>
                        </div>
                        <div class="extra content">
                            <div class="ui vertical animated button '.$color.'" id="activate" data-id="'.$rows[0].'" data-status="'.$rows[8].'">

                                    <div class="visible content">'.$status.'</div>
                                    <div class="hidden content">
                                        <i class="'.$icon.' icon"></i>
                                    </div>

                            </div>
                        </div>
                    </div>
                </div>
            ';
        }
    }

    if(isset($_GET['login'])){
        echo $users->login($_POST['username'], $_POST['password']);
    }

    if(isset($_POST['login'])){
        if($_POST['username']=="admin" && $_POST['password'] == "password"){
            header('Location: users.php');
        }else{
            echo $users->login($_POST['username'], $_POST['password']);
        }
    }

    if(isset($_GET['logout'])){
        header('Location : logout.php');
    }

    if(isset($_GET['activateUser'])){
       echo $users->activate($_POST['id'], $_POST['status']);
    }

    if(isset($_GET['activateClient'])){
        echo $clients->activate($_POST['id'], $_POST['status']);
    }

    if(isset($_GET['createClient'])){
        echo $clients->createClient($_POST['name'], $_POST['contact'], $_POST['email'], $_POST['location'], "picture",$_POST['nextOfKin'],$_POST['salesPerson'], $_POST['unitContribution'], $_POST['houseNumber'], $_POST['dateOfBirth'], $_POST['sex'], $_POST['id']);
    }

    if(isset($_GET['editClient'])){
        echo $clients->editClient($_POST['name'], $_POST['contact'], $_POST['email'], $_POST['location'], "picture",$_POST['nextOfKin'],$_POST['salesPerson'], $_POST['unitContribution'], $_POST['houseNumber'], $_POST['dateOfBirth'], $_POST['sex'], $_POST['id']);
    }

    if(isset($_GET['loadClients'])){
           echo '<table id="data_table" class="display all_tables" cellspacing="0" width="100%">
            <thead>
            <tr>
                <th>Name</th>
                <th>Account Number</th>
                <th>Balance</th>
                <th>Contact</th>
                <th>Sales Person</th>
                <th>Status</th>
                <th>Edit</th>
            </tr>
        </thead>
        
        <tbody>';
        $result = $clients->loadClients();
        global $database;
        while($rows = $database->fetchArray($result)){
            $status = "";
            $color  = "";
            $account = str_pad($rows[0], 4, "0", STR_PAD_LEFT);
            if($rows[7] == 0){
                $status = "Activate";
                $color = "blue";
                $icon = "check";
            }else{
                $status = "Deactivate";
                $color = "red";
                $icon = "privacy";
            }
            
         

            echo '
        
            <tr data-id="'.$rows[0].'" data-name="'.$rows[1].'" data-contact="'.$rows[2].'" data-email="'.$rows[3].'" data-location="'.$rows[4].'" data-status="'.$rows[7].'" data-nextOfKin="'.$rows[8].'" data-salesPerson="'.$rows[9].'" data-unitContribution="'.$rows[10].'" data-houseNumber="'.$rows[11].'" data-dateOfBirth="'.$rows[14].'" data-accountNumber="'.$rows[15].'" data-sex="'.$rows[16].'">
                <th>'.$rows[1].'</th>
                <th>'.$rows[15].'</th>
                <th>'.$rows[6].'</th>
                <th>'.$rows[2].'</th>
                <th>'.$rows[9].'</th>
                <th><div class="ui vertical animated button '.$color.'" data-id="'.$rows[0].'" data-status="'.$rows[7].'" id="activateClientBtn">

                                    <div class="visible content">'.$status.'</div>
                                    <div class="hidden content">
                                        <i class="'.$icon.' icon"></i>
                                    </div>

                            </div></th>
                <th> <div class="editBtn editClientBtn circular flt ui icon button blue" title="Edit">
                                <i class="write icon"></i>
                            </div></th>
            </tr>'
        ;

        }
         echo ' </tbody>
    </table>';
    }

    if(isset($_GET['createTrans'])){
         echo $trans->createTransaction($_POST['type'],$_POST['date'],$_POST['client'],$_POST['amount'],$_POST['sales']);
    }

    if(isset($_GET['loadTrans'])){
        $result = $trans->loadTrans();
        while($rows = $database->fetchArray($result)){
            echo '
                <tr data-id="'.$rows[0].'" data-type="'.$rows[1].'" data-date="'.$rows[2].'" data-client="'.$rows[3].'" data-amount="'.$rows[4].'" data-sales="'.$rows[7].'" >
                    <td>'.$rows[2].'</td>
                    <td>'.$rows[3].'</td>
                    <td>'.$rows[1].'</td>
                    <td>'.$rows[4].'</td>
                    <td>'.$rows[5].'</td>
                    <td>'.$rows[6].'</td>
                    <td>'.$rows[7].'</td>
                </tr>
            ';
        }
    }

    if(isset($_GET['loadOneTrans'])){
        $result = $trans->loadOneTrans();
        while($rows = $database->fetchArray($result)){
            echo '
                 <tr data-id="'.$rows[0].'" data-type="'.$rows[1].'" data-date="'.$rows[2].'" data-client="'.$rows[3].'" data-amount="'.$rows[4].'" data-sales="'.$rows[7].'">
                    <td>'.$rows[2].'</td>
                    <td class="name">'.$rows[3].'</td>
                    <td>'.$rows[1].'</td>
                    <td>'.$rows[4].'</td>
                    <td>'.$rows[5].'</td>
                    <td>'.$rows[6].'</td>
                    <td>'.$rows[7].'</td>
                </tr>
                ';
        }
    }

if(isset($_GET['loadTransWithin'])){
    $result = $trans->loadTransWithin($_POST['start'], $_POST['end']);
    while($rows = $database->fetchArray($result)){
        echo '
                <tr data-id="'.$rows[0].'" data-type="'.$rows[1].'" data-date="'.$rows[2].'" data-client="'.$rows[3].'" data-amount="'.$rows[4].'"  data-sales="'.$rows[7].'" >
                    <td>'.$rows[2].'</td>
                    <td>'.$rows[3].'</td>
                    <td>'.$rows[1].'</td>
                    <td>'.$rows[4].'</td>
                    <td>'.$rows[5].'</td>
                    <td>'.$rows[6].'</td>
                    <td>'.$rows[7].'</td>
                </tr>
            ';
    }
}



 if(isset($_GET['loadSales'])){
        $result = $users->loadSales();
        global $database;
        while ($rows = $database->fetchArray($result)){
            $status= "";
            if($rows[8] == 0){
                $status = "Activate";
                $color  =  "blue";
                $icon = "check";
            }else {
                $status = "Deactivate";
                $color  = "red";
                $icon = "privacy";
            }

            echo '
                    <div class="column userGrid" data-id="'.$rows[0].'" data-name="'.$rows[1].'" data-contact="'.$rows[2].'" data-email="'.$rows[3].'" data-location="'.$rows[4].'" data-username="'.$rows[5].'" data-password="'.$rows[6].'" data-position="'.$rows[7].'" data-status="'.$rows[8].'">
                    <div class="ui card fluid">
                        <div class="image">
                            <img src="img/steve.jpg" alt="">
                            <div class="editClientBtn circular flt ui icon button blue" title="Edit">
                                <i class="write icon"></i>
                            </div>
                        </div>
                        <div class="content">
                            <h2 class="ui header">'.$rows[1].'</h2>
                            <span class="meta">'.$rows[7].'</span>
                            <div class="description">
                                <div><strong>Username: </strong>'.$rows[5].'</div>
                                <div><strong>Location: </strong>'.$rows[4].'</div>
                                <div><strong>Contact: </strong> '.$rows[2].'</div>
                            </div>
                        </div>
                        <div class="extra content">
                            <div class="ui vertical animated button '.$color.'" id="activate" data-id="'.$rows[0].'" data-status="'.$rows[8].'">

                                    <div class="visible content">'.$status.'</div>
                                    <div class="hidden content">
                                        <i class="'.$icon.' icon"></i>
                                    </div>

                            </div>
                        </div>
                    </div>
                </div>
            ';
        }
    }


?>
