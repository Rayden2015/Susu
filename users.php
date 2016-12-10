<?php
    $page_title = "Users";
    require_once('includes/sidebar.php');
 ?>

<section class="wrapper">
    <div class="toolbar">
        <h2 class="header ui">Users</h2>
    </div>
    <div class="main">
        <h2 class="header ui">All Users</h2>
        <div class="ui input icon">
            <input type="text" placeholder="Search Client" name="q">
            <i class="icon search"></i>
        </div>
        <div class="floated right">
            <div class="ui button blue" id="addUserBtn">
                <i class="entypo-user-add"></i> Add User
            </div>
        </div>
        <div class="ui divider"></div>

        <div class="ui two column grid" id="gridBox">
         </div>

        
        
    </div>
    <!-- Add New User Modal -->
        <div class="ui modal small" id="add-user-modal">
            <i class="close icon"></i>
            <div class="header">
                Add New User
            </div>
            <div class="content">
                <form action="" class="ui form">
                    <input type="hidden" id="id" name="id">
                    <div class="field">
                        <label for="full_name">Full Name</label>
                        <input type="text" id="full_name">
                    </div>
                    <div class="field">
                        <label for="position">Position</label>
                        <select class="ui selection dropdown" id="position">
                            <div class="menu">
                                <option class="item">Manager</option>
                                <option class="item">Director</option>
                                <option class="item">Sales</option>
                            </div>
                        </select>
                    </div>
                    <div class="ui two fields" >
                        <div class="field">
                            <label for="username">Username</label>
                            <input type="text" id="username">
                        </div>
                        <div class="field varies">
                            <label for="password">Password</label>
                            <input type="password" id="password">
                        </div>
                    </div>
                    
                    <div class="ui two fields">
                        <div class="field">
                            <label for="location">Location</label>
                            <input type="text" id="location">
                        </div>
                        <div class="field">
                            <label for="contact">Contact</label>
                            <input type="text" id="contact">
                        </div>
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
</section>

<script src="js/jquery-2.1.3.min.js"></script>
<script src="js/jquery.datetimepicker.js"></script>
<script src="js/semantic.js"></script>
<script src="js/users.js"></script>
<script src="js/script.js"></script>
</body>
</html>