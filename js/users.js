loadUsers();

var editBtn = $('.editBtn');
$(document).on('click', editBtn, function(event) {
    var $target = event.target;
    if($target.className == 'editBtn circular flt ui icon button blue' || $target.className == 'write icon') {
        var data = $target.closest('.userGrid'),
            dataId = data.dataset['id'],
            dataName = data.dataset['name'],
            dataContact = data.dataset['contact'],
            dataClient = data.dataset['client'],
            dataEmail = data.dataset['email'],
            dataLocation = data.dataset['location'],
            dataUsername = data.dataset['username'],
            dataPassword = data.dataset['password'],
            dataPosition = data.dataset['postion'],
            dataStatus = data.dataset['username'];
            $("#full_name").val(dataName);
            $("#email").val(dataEmail);
            $("#contact").val(dataContact);
            $("#location").val(dataLocation);
            $("#username").val(dataUsername);
            $("#password").val(dataPassword);
            $("#position").val(dataPosition);
            $("#id").val(dataId);
            $('#add-user-modal').modal('show');
            console.log($target.className);
    }
});


$("#createUser").click(function(){
    var url = "";
    if($("#id").val() == ''){
        url = "php/action.php?createUser=''";
    }else{
        url = "php/action.php?editUser=''";
    }
    data = new FormData();
    data.append("id", $("#id").val());
    data.append("username", $("#username").val());
    data.append("password", $("#password").val());
    data.append("name", $("#full_name").val());
    data.append("email", $("#email").val());
    data.append("contact", $("#contact").val());
    data.append("location", $("#location").val());
    data.append("position", $("#position option:selected").val());

    var ajax = new XMLHttpRequest();
    ajax.addEventListener("load", completeHandler, false);
    ajax.addEventListener("error", errorHandler, false);
    ajax.open("POST", url);
    ajax.send(data);

    function completeHandler(event){
        $(".overlay").hide();
        alert(event.target.responseText);
        loadUsers();
     }

    function errorHandler(event){
        $(".overlay").hide();
        alert("Error : "+event.target.responseText);
    }
});

function loadUsers(){
    $(".overlay").show();
    var ajax = new XMLHttpRequest();
    ajax.addEventListener("load",completeHandler, false);
    ajax.addEventListener("error", errorHandler, false);
    ajax.open("POST", "php/action.php?loadUsers=''");
    ajax.send("");

    function completeHandler(event){
        $(".overlay").hide();
        //alert(event.target.responseText);
        $("#gridBox").html(event.target.responseText);
        $(".activate").bind("click");
    }

    function errorHandler(event){
        $(".overlay").hide();
        alert("Error : "+event.target.responseText);
    }
}

function search(q) {
    if (!search.results) search.results = {};
    if (search.results[q] != null) {
        search.results[q].show()
    } else {
        $('.userGrid').hide();
        $('.userGrid').each(function () {
            var product = $(this).find("h2"),
                Regex = new RegExp(q, 'i');

            if (product.html().match(Regex)) {
                //var link_id = link.parent('li').attr('data-link-id');
                product.parents('.userGrid').addClass('FOUND_LINKS_MATCH');
            } else {
                product.parents('.userGrid').removeClass('FOUND_LINKS_MATCH');
            }
        });
        search.results[q] = $('.FOUND_LINKS_MATCH');
        if (search.results[q].length === 0) {
            $('.userGrid').fadeOut();
            $('.void-content-message').show();
        } else {
            search.results[q].show();
            $('.void-content-message').hide();
        }
    }
}

$('[name=q]').keyup(function () {
    search($(this).val());
});


var actButton = $('#activate');
$(document).on('click', actButton, function(event) {
    //$('#add-user-modal').modal('hide');
   //$(".overlay").show();

    var $target     = event.target;
    var values        = $target.closest('#activate');

    data = new FormData();
    data.append("id", values.dataset['id']);
    data.append("status", values.dataset['status']);

    var ajax = new XMLHttpRequest();
    ajax.addEventListener("load",completeHandler, false);
    ajax.addEventListener("error", errorHandler, false);
    ajax.open("POST", "php/action.php?activateUser=''");
    ajax.send(data);

    function completeHandler(event){
        $(".overlay").hide();
        alert(event.target.responseText);
        loadUsers();
    }

    function errorHandler(event){
        $(".overlay").hide();
        alert("Error : "+event.target.responseText);
    }
});

