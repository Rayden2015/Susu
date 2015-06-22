
<div class="sidebar">
    <div class="brand">
        <div class="logo">
            <h1>MR. K BUSINESS CENTRE</h1>
<!--            <img src="img/logo.png" alt="">-->
           <?php

           if(isset($_COOKIE['username'])){
               echo "Hello, ".$_COOKIE['username'];
           }else{
               header('Location: index.php');
           }
           ?>
        </div>
    </div>
    <nav>
        <ul>
            <li><a href="trans.php"><i class="entypo-switch"></i> Transactions</a></li>
            <li><a href="clients.php"><i class="entypo-suitcase"></i> Clients</a></li>
            <li><a href="logout.php"><i class="entypo-logout"></i> Sign Out</a></li>
        </ul>
    </nav>
</div>
<div class="overlay">
</div>
