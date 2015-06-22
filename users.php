<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="Nurudin Lartey, Infinixel, Microfinance">
    <title>Users | Daily Susu</title>
    <link rel="stylesheet" href="css/semantic.css">
    <link rel="stylesheet" href="css/entypo/css/entypo.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" href="img/fav.jpg">
</head>
<body>

<!-- Sidebar -->
<div class="sidebar">
    <div class="brand">
        <div class="logo">
            <img src="img/logo.png" alt="">
        </div>
    </div>
    <nav>
        <ul>
            <li><a href="users.php"><i class="entypo-users"></i> Users</a></li>
            <li><a href="logout.php"><i class="entypo-logout"></i> Sign Out</a></li>
        </ul>
    </nav>
</div>
<!-- End of Sidebar -->

<section class="wrapper">
    <div class="toolbar">
        <h2 class="header ui">Users</h2>
    </div>
    <div class="main">
        <h2 class="header ui">All Users</h2>
        <div class="ui input action">
            <input type="text" placeholder="Search Users" name="q">
            <button class="ui icon button">
                <i class="icon search"></i>
            </button>
            </div>
            <div class="floated right">
                <div class="ui button blue" id="add-user">
                    <i class="entypo-user-add"></i> Add User
                </div>
            </div>
            <div class="ui divider"></div>

            <div class="ui three column grid" id="gridBox">
             </div>

            <!-- Add New User Modal -->
            <div class="ui modal small" id="add-user-modal">
                <i class="close icon"></i>
                <div class="header">
                    Add New User
                </div>
                <div class="content">
                    <form action="" class="ui form">
                        <div class="field">
                            <label for="full_name">Full Name</label>
                            <input type="text" id="name">
                        </div>
                        <div class="field">
                            <label for="position">Position</label>
                            <div class="ui selection dropdown">
                                <input type="hidden" id="position">
                                <div class="default text">Position</div>
                                <i class="dropdown icon"></i>
                                <div class="menu">
                                    <div class="item" data-value="ceo">C.E.O</div>
                                    <div class="item" data-value="cashier">Cashier</div>
                                    <div class="item" data-value="accountant">Accountant</div>
                                </div>
                            </div>
                        </div>
                        <div class="field">
                            <label for="username">Username</label>
                            <input type="text" id="username">
                        </div>
                        <div class="field">
                            <label for="password">Password</label>
                            <input type="password" id="password">
                        </div>
                        <div class="field">
                            <label for="location">Location</label>
                            <input type="text" id="location">
                        </div>
                        <div class="field">
                            <label for="contact">Contact</label>
                            <input type="text" id="contact">
                        </div>
                    </form>
                </div>
                <div class="actions">
                    <div class="ui black button">
                        Nope
                    </div>
                    <div class="ui positive right labeled icon button" id="createUser">
                        Add
                        <i class="plus icon"></i>
                    </div>
                </div>
            </div>
            <!-- End of modal -->
        </div>
</section>

<script src="js/jquery-2.1.3.min.js"></script>
<script src="js/semantic.js"></script>
<script src="js/script.js"></script>
<script src="js/users.js"></script>
</body>
</html>