<?php
        $page_title = "Sales Persons";
        require_once('includes/sidebar.php');
     ?>

    <section class="wrapper">
        <div class="toolbar">
            <h2 class="header ui">Sales Persons</h2>
        </div>
        <div class="main">
            <h2 class="header ui">All Sales Persons</h2>
            <div class="ui input icon">
                <input type="text" placeholder="Search Sales Persons" name="q">
                <i class="icon search"></i>
            </div>
            <div class="floated right">
                <div class="ui button blue" id="add-user">
                    <i class="entypo-user"></i> Add Sales Person
                </div>
            </div>
            <div class="ui divider"></div>
            <br><br>
            
            <div class="ui three column grid" id="gridBox">
            </div>
            
            <!-- Add New Sales Persons Modal -->
            <div class="ui modal small" id="add-user-modal">
                <i class="close icon"></i>
                <div class="header">
                    New Sales Persons
                </div>
                <div class="content">
                    <form action="" class="ui form">
                        <input type="hidden" id="id" name="id">
                        <div class="field">
                            <label for="picture">Picture</label>
                            <input type="file" id="picture">
                        </div>
                        <div class="field">
                            <label for="full_name">Full Name</label>
                            <input type="text" id="full_name">
                        </div>
                        <div class="ui two fields">
                            <div class="field">
                                <label for="contact">Phone Number</label>
                                <input type="text" id="contact">
                            </div>
                            <div class="field">
                                <label for="h_number">House Number</label>
                                <input type="text" id="h_number">
                            </div>
                        </div>
                        <div class="ui two fields">
                            <div class="field">
                                <label for="location">Location</label>
                                <input type="text" id="location">
                            </div>
                            <div class="field">
                                <label for="gender">Gender</label>
                                <select class="ui selection dropdown" id="gender">
                                    <div class="menu">
                                        <option class="item">Male</option>
                                        <option class="item">Female</option>
                                        <option class="item">Transgender</option>
                                    </div>
                                </select>
                            </div>
                        </div>
                        


                    
                    </form>
                </div>
                <div class="actions">
                    <div class="ui black button">
                        Nope
                    </div>
                    <div class="ui blue right labeled icon button" id="createSales Persons">
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
    <script src="js/Sales Persons.js"></script>
    <script>
        loadSales Persons();
    </script>
</body>
</html>