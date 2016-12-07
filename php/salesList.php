<?php
require_once("clientsClass.php");
$clients = new clients();
$result = $clients->loadSales();
global $database;
echo '<div class="field">
                <label for="type">Sales Person Name</label>
                <select class="ui selection dropdown" id="sales">
                    <div class="menu">';
while($rows = $database->fetchArray($result)){
    echo '<option value="'.$rows[1].'">'.$rows[1].'</option>';
}
echo    '</div>
                </select>
        </div>
        ';

?>
