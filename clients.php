<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="Nurudin Lartey, Emmanuel Asaber, Infinixel">
    <title>Clients | Daily Susu</title>
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
            <h2 class="header ui">Clients</h2>
        </div>
        <div class="main">
            <h2 class="header ui">All Clients</h2>
            <div class="ui input action">
                <input type="text" placeholder="Search Client">
                <button class="ui icon button">
                    <i class="icon search"></i>
                </button>
            </div>
            <div class="floated right">
                <div class="ui button blue" id="add-user">
                    <i class="entypo-suitcase"></i> Add Client
                </div>
            </div>
            <div class="ui divider"></div>
            
            <div class="ui three column grid">
                <div class="column">
                    <div class="ui card fluid">
                        <div class="image">
                            <img src="img/steve.jpg" alt="">
                            <div class="circular flt ui icon button blue" title="Edit">
                                <i class="write icon"></i>
                            </div>
                        </div>
                        <div class="content">
                            <h2 class="ui header">Steve Wood</h2>
                            <span class="meta">20145210</span>
                            <div class="description">
                                <div><strong>Balance: </strong> GHc 8000</div>
                                <div><strong>Email: </strong> steve@gmail.com</div>
                                <div><strong>Location: </strong> Accra</div>
                                <div><strong>Contact: </strong> 0277110176</div>
                            </div>
                        </div>
                        <div class="extra content">
                            <div class="ui vertical animated button red">
                                <a href="">
                                    <div class="visible content">Deactivate</div>
                                    <div class="hidden content">
                                        <i class="lock icon"></i>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="column">
                    <div class="ui card fluid">
                        <div class="image">
                            <img src="img/laura.jpg" alt="">
                            <div class="circular flt ui icon button blue" title="Edit">
                                <i class="write icon"></i>
                            </div>
                        </div>
                        <div class="content">
                            <h2 class="ui header">Laura Anderson</h2>
                            <span class="meta">20145210</span>
                            <div class="description">
                                <div><strong>Balance: </strong> GHc 58</div>
                                <div><strong>Email: </strong> laura@mail.com</div>
                                <div><strong>Location: </strong> Accra</div>
                                <div><strong>Contact: </strong> 0277110176</div>
                            </div>
                        </div>
                        <div class="extra content">
                            <div class="ui vertical animated button red">
                                <a href="">
                                    <div class="visible content">Deactivate</div>
                                    <div class="hidden content">
                                        <i class="lock icon"></i>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="column">
                    <div class="ui card fluid">
                        <div class="image">
                            <img src="img/joe.jpg" alt="">
                            <div class="circular flt ui icon button blue" title="Edit">
                                <i class="write icon"></i>
                            </div>
                        </div>
                        <div class="content">
                            <h2 class="ui header">Joe Tapoli</h2>
                            <span class="meta">20145210</span>
                            <div class="description">
                                <div><strong>Balance: </strong> GHc 15</div>
                                <div><strong>Email: </strong> tap@hotmail.com</div>
                                <div><strong>Location: </strong> Accra</div>
                                <div><strong>Contact: </strong> 0277110176</div>
                            </div>
                        </div>
                        <div class="extra content">
                            <div class="ui vertical animated button red">
                                <a href="">
                                    <div class="visible content">Deactivate</div>
                                    <div class="hidden content">
                                        <i class="lock icon"></i>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Add New Client Modal -->
            <div class="ui modal small" id="add-user-modal">
                <i class="close icon"></i>
                <div class="header">
                    Add New Client
                </div>
                <div class="content">
                    <form action="" class="ui form">
                        <div class="field">
                            <label for="picture">Picture</label>
                            <input type="file" id="picture">
                        </div>
                        <div class="field">
                            <label for="full_name">Full Name</label>
                            <input type="text" id="full_name">
                        </div>
                        <div class="field">
                            <label for="email">Email</label>
                            <input type="email" id="email">
                        </div>
                        <div class="field">
                            <label for="contact">Phone Number</label>
                            <input type="text" id="contact">
                        </div>
                        <div class="field">
                            <label for="location">Location</label>
                            <input type="text" id="location">
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
        </div>
    </section>
    
    <script src="js/jquery-2.1.3.min.js"></script>
    <script src="js/semantic.js"></script>
    <script src="js/script.js"></script>
</body>
</html>