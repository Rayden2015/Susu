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

    if(isset($_GET['loadUsers'])){
        $result = $users->loadUsers();
        global $database;
        while ($rows = $database->fetchArray($result)){
            $status= "";
            if($rows[8] == 0){
                $status = "Activate";
                $color  =  "blue";
            }else {
                $status = "Deactivate";
                $color  = "red";
            }

            echo '
                    <div class="column userGrid" id="">
                    <div class="ui card fluid">
                        <div class="image">
                            <img src="img/steve.jpg" alt="">
                            <div class="circular flt ui icon button blue" title="Edit">
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
                            <div class="ui vertical animated button activate '.$color.'" id="activate">
                                <a href="php/action.php?id='.$rows[0].'&status='.$rows[8].'">
                                    <div class="visible content">'.$status.'</div>
                                    <div class="hidden content">
                                        <i class="trash icon"></i>
                                    </div>
                                </a>
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

    if(isset($_GET['id']) && isset($_GET['status'])){
       echo $users->activate($_GET['id'], $_GET['status']);
    }

    if(isset($_GET['createClient'])){
        echo $clients->createClient($_POST['name'],$_POST['contact'], $_POST['email'], $_POST['location'],'');
    }

    if(isset($_GET['loadClients'])){
        $result = $clients->loadClients();
        global $database;
        while($rows = $database->fetchArray($result)){
            $status = "";
            $color  = "";
            $account = str_pad($rows[0], 4, "0", STR_PAD_LEFT);
            if($rows[8] == 0){
                $status = "Activate";
                $color = "blue";
            }else{
                $status = "Deactivate";
                $color = "red";
            }
            echo '
                <div class="column clientGrid">
                    <div class="ui card fluid">
                        <div class="image">
                            
                            <div class="circular flt ui icon button blue" title="Edit">
                                <i class="write icon"></i>
                            </div>
                        </div>
                        <div class="content">
                            <h2 class="ui header">'.$rows[1].'</h2>
                            <span class="meta">'.$rows[6].$account.'</span>
                            <div class="description">
                                <div><strong>Balance: </strong> GHc '.$rows[7].'</div>
                                <div><strong>Email: </strong> '.$rows[3].'</div>
                                <div><strong>Location: </strong>'.$rows[4].'</div>
                                <div><strong>Contact: </strong> '.$rows[2].'</div>
                            </div>
                        </div>
                        <div class="extra content">
                            <div class="ui vertical animated button '.$color.'">
                                <a href="">
                                    <div class="visible content">'.$status.'</div>
                                    <div class="hidden content">
                                        <i class="entypo-lock icon"></i>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            ';
        }
    }

    if(isset($_GET['createTrans'])){
         echo $trans->createTransaction($_POST['type'],$_POST['date'],$_POST['client'],$_POST['amount']);
    }

    if(isset($_GET['loadTrans'])){
        $result = $trans->loadTrans();
        while($rows = $database->fetchArray($result)){
            echo '
                <tr>
                    <td>'.$rows[2].'</td>
                    <td>'.$rows[3].'</td>
                    <td>'.$rows[1].'</td>
                    <td>'.$rows[4].'</td>
                    <td>'.$rows[5].'</td>
                    <td>'.$rows[6].'</td>
                    <td>
                        <div class="fluid ui icon button blue" title="Edit">
                            <i class="write icon"></i> Edit
                        </div>
                    </td>
                </tr>
            ';
        }
    }

    if(isset($_GET['loadOneTrans'])){
        $result = $trans->loadOneTrans();
        while($rows = $database->fetchArray($result)){
            echo '
                 <tr>
                    <td>'.$rows[2].'</td>
                    <td class="name">'.$rows[3].'</td>
                    <td>'.$rows[1].'</td>
                    <td>'.$rows[4].'</td>
                    <td>'.$rows[5].'</td>
                    <td>'.$rows[6].'</td>
                    <td>
                        <div class="fluid ui icon button blue" title="Edit">
                            <i class="write icon"></i> Edit
                        </div>
                    </td>
                </tr>
                ';
        }
    }



?>