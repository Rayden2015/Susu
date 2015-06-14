<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="Nurudin Lartey, Emmanuel Asaber, Infinixel">
    <title>Transactions | Daily Susu</title>
    <link rel="stylesheet" href="css/semantic.css">
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
            <div class="ui input action">
                <input type="text" placeholder="Search Client">
                <button class="ui icon button">
                    <i class="icon search"></i>
                </button>
            </div>
            <div class="floated right">
                <div class="ui button blue" id="add-user">
                    <i class="entypo-switch"></i> New Transaction
                </div>
            </div>
            <div class="ui divider"></div>

            
            <div class="ui two column grid">
                <div class="column">
                    <div class="ui large feed">
                        <div class="event">
                    <div class="label">
                        <img src="img/joe.jpg" alt="">
                    </div>
                    <div class="content">
                        <div class="date">
                            26th May 2015
                        </div>
                        <div class="summary">
                            <a href="" class="user blue ui">
                                Joe Tapoli
                            </a> deposited <strong>GHc 500</strong>
                        </div>
                        <div class="extra text">
                            <div class="meta">Balance: <strong>GHc 500</strong></div><br>
                            <div class="meta">Issued By: <strong>Kelvin</strong></div>
                        </div>
                    </div>
                </div>

                <div class="event">
                    <div class="label">
                        <img src="img/steve.jpg" alt="">
                    </div>
                    <div class="content">
                        <div class="date">
                            23th May 2015
                        </div>
                        <div class="summary">
                            <a href="" class="user blue ui">
                                Steve Wood
                            </a> redrew <strong>GHc 5</strong>
                        </div>
                        <div class="extra text">
                            <div class="meta">Balance: <strong>GHc 250</strong></div><br>
                            <div class="meta">Issued By: <strong>Mercy</strong></div>
                        </div>
                    </div>
                </div>

                <div class="event">
                    <div class="label">
                        <img src="img/laura.jpg" alt="">
                    </div>
                    <div class="content">
                        <div class="date">
                            12th May 2015
                        </div>
                        <div class="summary">
                            <a href="" class="user blue ui">
                                Laura Anderson
                            </a> deposited <strong>GHc 50</strong>
                        </div>
                        <div class="extra text">
                            <div class="meta">Balance: <strong>GHc 50</strong></div><br>
                            <div class="meta">Issued By: <strong>Kelvin</strong></div>
                        </div>
                    </div>
                </div>
                    </div>
                </div>

                <div class="column">
                    <div class="ui card">
                        <div class="image">
                            <img src="img/steve.jpg" alt="">
                        </div>
                        <div class="content">
                            <h2 class="ui header">Joe Tapoli</h2>
                            <span class="meta">20152414</span>
                            <div class="description">
                                <div><strong>Balance: </strong> GHc 15</div>
                                <div><strong>Email: </strong> tap@hotmail.com</div>
                                <div><strong>Location: </strong> Accra</div>
                                <div><strong>Contact: </strong> 0277110176</div>
                            </div>
                        </div>
                    </div>
                </div>
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
                                    <div class="item" data-value="Redrawal">Redrawal</div>
                                </div>
                            </div>
                        </div>
                        <div class="field">
                            <label for="client_name">Client Name</label>
                            <input type="text" id="full_name">
                        </div>
                        <div class="field">
                            <label for="amount">Amount</label>
                            <input type="text" id="amount">
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
    <script src="js/script.js"></script>
</body>
</html>