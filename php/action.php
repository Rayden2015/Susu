<?php
    require_once("usersClass.php");
    $users = new users();

    if(isset($_GET['createUser'])){
        echo $users->createUser($_POST['name'], $_POST['contact'], $_POST['email'], $_POST['location'], $_POST['username'], $_POST['password'], $_POST['position']);

    }

    if(isset($_GET['loadUsers'])){
        $result = $users->loadUsers();
        global $databse;
        while ($rows = $database->fetchArray($result)){
            $status= "";
            if($rows[8] == 0){
                $status = "Activate";
            }else $status = "Deactivate";
            echo '
                    <div class="column">
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
                            <div class="ui vertical animated button red">
                                <a href="">
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
?>