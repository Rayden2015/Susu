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
    
    <i class="fa fa-cog" id="overlay"></i>
    <!-- Sidebar -->
    <?php include('includes/sidebar.php'); ?>
    <!-- End of Sidebar -->

    <section class="wrapper">
        <div class="toolbar">
            <h2 class="header ui">Clients</h2>
        </div>
        <div class="main">
            <h2 class="header ui">All Clients</h2>
            <div class="ui input icon">
                <input type="text" placeholder="Search Client" name="q">
                <i class="icon search"></i>
            </div>
            <div class="floated right">
                <div class="ui button blue" id="add-user">
                    <i class="entypo-suitcase"></i> Add Client
                </div>
            </div>
            <div class="ui divider"></div>
            
            <div class="ui three column grid" id="gridBox">
            </div>
            
            <!-- Add New Client Modal -->
            <div class="ui modal small" id="add-user-modal">
                <i class="close icon"></i>
                <div class="header">
                    Update Client
                </div>
                <div class="content">
                    <form action="" class="ui form">
                        <input type="hidden" id="id" name="id">
<!--                        <div class="field">-->
<!--                            <label for="picture">Picture</label>-->
<!--                            <input type="file" id="picture">-->
<!--                        </div>-->
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
                    <div class="ui blue right labeled icon button" id="createClient">
                        Add
                    <i class="plus icon"></i>
                    </div>
                </div>
            </div>
            <!-- End of modal -->
        </div>
    </section>
    
    <script src="js/jquery-2.1.3.min.js"></script>
    <script src="js/jquery.datetimepicker.js"></script>
    <script src="js/semantic.js"></script>
    <script src="js/script.js"></script>
    <script src="js/clients.js"></script>
    <script>
        loadClients();
    </script>
</body>
</html>