/**
 * Created by ME on 6/14/15.
 */

var editBtn = $('.editBtn');
$(document).on('click', editBtn, function(event) {
    var $target = event.target;
    if($target.className == 'editBtn circular flt ui icon button blue' || $target.className == 'write icon') {
        var data = $target.closest('.clientGrid'),
            dataId = data.dataset['id'],
            dataName = data.dataset['name'],
            dataContact = data.dataset['contact'],
            dataClient = data.dataset['client'],
            dataEmail = data.dataset['email'],
            dataLocation = data.dataset['location'],
            dataStatus = data.dataset['status'];
            $("#full_name").val(dataName);
            $("#email").val(dataEmail);
            $("#contact").val(dataContact);
            $("#location").val(dataLocation);
            $("#id").val(dataId);
            $('#add-user-modal').modal('show');
            // console.log(data);
    }
});

$("#createClient").click(function() {
    var url ="";
    if($("#id").val()== ''){
        url = "php/action.php?createClient=''";
    }else{
        url = "php/action.php?editClient=''";
    }
    $(".overlay").show();
    data = new FormData();
    data.append("name", $("#full_name").val());
    data.append("email", $("#email").val());
    data.append("contact", $("#contact").val());
    data.append("location", $("#location").val());
    data.append("position", $("#position option:selected").val());
    data.append("id", $("#id").val());


    var ajax = new XMLHttpRequest();
    ajax.addEventListener("load", completeHandler, false);
    ajax.addEventListener("error", errorHandler, false);
    ajax.open("POST", url);
    ajax.send(data);


    function completeHandler(event) {
        $(".overlay").hide();
        alert(event.target.responseText);
        loadClients();
    }

    function errorHandler(event) {
        $(".overlay").hide();
        alert("Error : " + event.target.responseText);
    }

});

function loadClients() {
    $(".overlay").show();
    var ajax = new XMLHttpRequest();
    ajax.addEventListener("load", completeHandler, false);
    ajax.addEventListener("error", errorHandler, false);
    ajax.open("POST", "php/action.php?loadClients=''");
    ajax.send("");

    function completeHandler(event) {
        $(".overlay").hide();
        //alert(event.target.responseText);
        $("#gridBox").html(event.target.responseText);
    }

    function errorHandler(event) {
        $(".overlay").hide();
        alert("Error : " + event.target.responseText);
    }
}

$('[name=q]').keyup(function() {
    search($(this).val());
});

function search(q) {
    if (!search.results) search.results = {};
    if (search.results[q] != null) {
        search.results[q].show()
    } else {
        $('.clientGrid').hide();
        $('.clientGrid').each(function() {
            var product = $(this).find("h2"),
                Regex = new RegExp(q, 'i');

            if (product.html().match(Regex) || $(this).find(".meta").html().match(Regex)) {
                //var link_id = link.parent('li').attr('data-link-id');
                product.parents('.clientGrid').addClass('FOUND_LINKS_MATCH');
            } else {
                product.parents('.clientGrid').removeClass('FOUND_LINKS_MATCH');
            }
        });
        search.results[q] = $('.FOUND_LINKS_MATCH');
        if (search.results[q].length === 0) {
            $('.clientGrid').fadeOut();
            $('.void-content-message').show();
        } else {
            search.results[q].show();
            $('.void-content-message').hide();
        }
    }
}


var actButton = $('#activateClient');
$(document).on('click', actButton, function(event) {
    $('#add-user-modal').modal('hide');
    $(".overlay").show();
    alert("hala0");
    var $target     = event.target;
    var values        = $target.closest('#activateClient');

    data = new FormData();
    data.append("id", values.dataset['id']);
    data.append("status", values.dataset['status']);

    var ajax = new XMLHttpRequest();
    ajax.addEventListener("load",completeHandler, false);
    ajax.addEventListener("error", errorHandler, false);
    ajax.open("POST", "php/action.php?activateClient=''");
    ajax.send(data);
    alert("hala1");
    function completeHandler(event){
        alert("hala2");
        $(".overlay").hide();
        alert(event.target.responseText);
        loadUsers();
    }

    function errorHandler(event){
        alert("hala3");
        $(".overlay").hide();
        alert("Error : "+event.target.responseText);
    }
});


