<?php
require_once("clientsClass.php");
$clients = new clients();
$result = $clients->loadClients();
global $database;
echo '<div class="field">
                <label for="type">Clients Name</label>
                <select class="ui selection dropdown" id="client">
                    <div class="menu">';
while($rows = $database->fetchArray($result)){
    echo '<option value="'.$rows[0].'">'.$rows[1].'</option>';
}
echo    '</div>
                </select>
        </div>
        ';

?>