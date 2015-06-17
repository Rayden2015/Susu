<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="Nurudin Lartey, Emmanuel Asaber, Infinixel">
    <title>Transactions | Daily Susu</title>
    <link rel="stylesheet" href="css/semantic.css">
    <link rel="stylesheet" href="css/jquery.datetimepicker.css">
    <link rel="stylesheet" href="css/entypo/css/entypo.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" href="img/fav.jpg">
</head>
<body>

    <!-- Sidebar -->
    <?php include('includes/sidebar.php'); ?>
    <!-- End of Sidebar -->

    <section class="wrapper">
        <div class="toolbar">
            <h2 class="ui header">Transactions</h2>
        </div>
        <div class="main">
            <h2 class="ui header">All Transactions</h2>
            
            <div class="floated right trans">
                <div class="ui button blue" id="add-user">
                    <i class="entypo-switch"></i> New Transaction
                </div>
            </div>
            <div class="ui divider"></div>
            
            <div class="ui text menu">
                <div class="header item">Sort By:</div>
                <div class="item active" data-target="all">All</div>
                <div class="item" data-target="today">Today</div>
                <div class="item" data-target="yesterday">Yesterday</div>
            </div>
            <div class="ui input icon" style="margin-left: 30px">
                <input type="text" placeholder="Search Client Account">
                <i class="icon search"></i>
            </div>



            <div class="ui segment">
                <table class="ui celled striped table">
                    <thead>
                        <tr>
                            <th>Type</th>
                            <th>Date</th>
                            <th>Client</th>
                            <th>Amount</th>
                            <th>Balance</th>
                            <th>User</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Withdrawal</td>
                            <td>26th May 2015</td>
                            <td>Steve Wood</td>
                            <td>GHc 500.00</td>
                            <td>GHc 1500.00</td>
                            <td>Adwoa Mercy</td>
                            <td>
                                <div class="fluid ui icon button blue" title="Edit">
                                    <i class="write icon"></i> Edit
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Deposite</td>
                            <td>12th May 2015</td>
                            <td>Joe Tapoli</td>
                            <td>GHc 50.00</td>
                            <td>GHc 250.00</td>
                            <td>Kwesi Mansa</td>
                            <td>
                                <div class="fluid ui icon button blue" title="Edit">
                                    <i class="write icon"></i> Edit
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        
        <!-- Add New Transaction Modal -->
            <div class="ui modal small" id="add-user-modal">
                <i class="close icon"></i>
                <div class="header">
                    New Transaction
                </div>
                <div class="content">
                    <form action="" class="ui form">
                        <div class="field">
                            <label for="type">Transaction Type</label>
                            <div class="ui selection dropdown">
                                <input type="hidden">
                                <div class="default text">Transaction Type</div>
                                <i class="dropdown icon"></i>
                                <div class="menu">
                                    <div class="item" data-value="Deposite">Deposite</div>
                                    <div class="item" data-value="Redrawal">Withdrawal</div>
                                </div>
                            </div>
                        </div>
                        <div class="field">
                            <label for="type">Client's Name</label>
                            <div class="ui selection dropdown">
                                <input type="hidden">
                                <div class="default text">Client's Name</div>
                                <i class="dropdown icon"></i>
                                <div class="menu">
                                    <div class="item" data-value="Steve Wood">Steve Wood</div>
                                    <div class="item" data-value="Joe Tapoli">Joe Tapoli</div>
                                    <div class="item" data-value="Laura Anderson">Laura Anderson</div>
                                </div>
                            </div>
                        </div>
                        <div class="field">
                            <label for="amount">Amount</label>
                            <input type="text" id="amount">
                        </div>
                        <div class="field">
                            <label for="con_pass">Confirm Password</label>
                            <input type="password" id="con_pass">
                        </div>
                        <div class="field">
                            <label for="date">Date</label>
                            <input type="text" id="datepicker">
                        </div>
                    </form>
                </div>
                <div class="actions">
                    <div class="ui black button">
                        Nope
                    </div>
                    <div class="ui blue right labeled icon button">
                        Add
                    <i class="plus icon"></i>
                    </div>
                </div>
            </div>
            <!-- End of modal -->

    </section>

    <script src="js/jquery-2.1.3.min.js"></script>
    <script src="js/semantic.js"></script>
    <script src="js/jquery.datetimepicker.js"></script>
    <script src="js/script.js"></script>
</body>
</html>