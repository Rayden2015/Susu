    <?php
        $page_title = "Clients";
        require_once('includes/sidebar.php');
     ?>
    

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
                <div class="ui button blue" id="addClientBtn">
                    <i class="entypo-suitcase"></i> Add Client
                </div>
            </div>
            <div class="ui divider"></div>
            <br><br>
            
            <div class="ui three column grid" id="gridBox">
            </div>
            
            <!-- Add New Client Modal -->
            <div class="ui modal small" id="add-client-modal">
                <i class="close icon"></i>
                <div class="header">
                    New Client
                </div>
                <div class="content">
                    <form action="" class="ui form">
                        <input type="hidden" id="id" name="id">
<!--                        <div class="field">-->
<!--                            <label for="picture">Picture</label>-->
<!--                            <input type="file" id="picture">-->
<!--                        </div>-->
                        <div class="ui two fields">
                            <div class="field">
                                <label for="picture">Picture</label>
                                <input type="file" name="picture" id="picture">
                            </div>
                            
                            <div class="field">
                                <label for="acc_type">Account Type</label>
                                <select name="acc_type" id="acc_type" class="selection ui dropdown">
                                    <div class="menu">
                                        <option class="item">Susu Account</option>
                                        <option class="item">Deposit Account</option>
                                    </div>
                                </select>
                            </div>
                        </div>
                        
                        
                        <div class="ui two fields">
                        <div class="field">
                            <label for="full_name">Full Name</label>
                            <input type="text" id="full_name">
                        </div>
                        <div class="field" id="uc">
                            <label for="unit">Unit Contribution</label>
                            <input type="text" id="unit">
                        </div>
                    </div>

                        <div class="ui two fields">
                            <div class="field">
                                <label for="dob">Date of Birth</label>
                                <input type="date" class="datepicker" id="dob">
                            </div>
                            <div class="field">
                                <label for="kin">Next of Kin</label>
                                <input type="text" id="kin">
                            </div>
                        </div>
                        
                        <div class="ui three fields">
                            <div class="field">
                                <label for="contact">Phone Number</label>
                                <input type="text" id="contact">
                            </div>
                            <div class="field">
                                <label for="location">Location</label>
                                <input type="text" id="location">
                            </div>
                            <div class="field">
                                <label for="h_number">House Number</label>
                                <input type="text" id="h_number">
                            </div>
                        </div>
                        
                        <div class="ui two fields">
                            <div class="field">
                                <label for="occupation">Occupation</label>
                                <input type="text" id="occupation">
                            </div>

                            <div class="field">
                                <?php include('php/salesList.php'); ?>
                            </div>
                        </div>
                        <div class="ui two fields">
                             <div class="field">
                                <label for="Sex">Sex</label>
                                <select class="ui selection dropdown" id="sex">
                                    <div class="menu">
                                        <option class="item">Male</option>
                                        <option class="item">Female</option>                                        
                                    </div>
                                </select>
                            </div>
                            <div class="field">
                                <label for="location">Email</label>
                                <input type="text" id="email">
                            </div>
                            
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
    <!-- <script src="js/datatables.min.js"></script> -->
    <script src="js/semantic.js"></script>    
    <script src="js/clients.js"></script>
    <script src="js/script.js"></script>
</body>
</html>