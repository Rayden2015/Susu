<?php
echo date('d-M-Y');

?>
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
    <link rel="icon"       href="img/fav.jpg">
    <link rel="stylesheet" href="css/bootstrap.css">
</head>
<body>
    <!-- Sidebar -->
    <?php include('includes/sidebar.php'); ?>
    <!-- End of Sidebar -->

    <section class="wrapper">
        <div class="toolbar">
            <h2 class="ui header">Transactions <span id="time"></span></h2>
        </div>
        <div class="main">
            <h2 class="ui header">Deposits : GH₵<span id="depo" ></span></h2>
            <h2 class="ui header">Withdrawals : GH₵<span id="with" ></span></h2>
            <h2 class="ui header">Balance : GH₵<span id="bal"></span></h2>
            
            <div class="floated right trans">
                <div class="ui button blue" id="add-user">
                    <i class="entypo-switch"></i> New Transaction
                </div>
            </div>

            <div class="ui divider"></div>

            <div class="ui input icon" style="margin-left: 0px">
                <input type="text" class="datepicker" placeholder="Start Date" id="start">
            </div>
            <div class="ui input icon" style="margin-left: 0px">
                <input type="text" class="datepicker" placeholder="End Date" id="end">
            </div>
            <div class="ui blue button" id="loadData">
                Load
            </div>
            <div class="ui input icon" style="margin-left: 0px">
                <input type="text" placeholder="Search by Client" name="c">
                <i class="icon search"></i>
            </div>

            <select class="ui selection dropdown" name="t" id="transtype">
                <div class="menu">
                    <option class="item">All</option>
                    <option class="item">Deposit</option>
                    <option class="item">Withdrawal</option>
                </div>
            </select>

            <div class="ui segment">
                <table class="ui celled striped table">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Client</th>
                            <th>Type</th>
                            <th>Amount (GH₵)</th>
                            <th>Balance (GH₵)</th>
                            <th>Cashier</th>
                        </tr>
                    </thead>
                    <tbody id="gridBox">
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
                            <select class="ui selection dropdown" id="type">
                                <div class="menu">
                                    <option class="item">Deposit</option>
                                    <option class="item">Withdrawal</option>
                                </div>
                            </select>
                        </div>

                       <?php require_once("php/clientsList.php");?>
                        <div class="field">
                            <label for="amount">Amount</label>
                            <input type="text" id="amount">
                        </div>
<!--                        <div class="field">-->
<!--                            <label for="con_pass">Confirm Password</label>-->
<!--                            <input type="password" id="con_pass">-->
<!--                        </div>-->
                        <div class="field">
                            <label for="date">Date</label>
                            <input type="text" class="datepicker_time">
                        </div>
                    </form>
                </div>
                <div class="actions">
                    <div class="ui black button">
                        Nope
                    </div>
                    <div class="ui blue right labeled icon button" id="createTrans">
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
    <script src="js/trans.js"></script>
</body>
</html>