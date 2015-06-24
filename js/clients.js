/**
 * Created by ME on 6/14/15.
 */

$(document).on('click', '.editBtn', function() {
    $('#add-user-modal').modal('show');
});

$("#createClient").click(function(){
    data = new FormData();
    data.append("name", $("#full_name").val());
    data.append("email", $("#email").val());
    data.append("contact", $("#contact").val());
    data.append("location", $("#location").val());


    var ajax = new XMLHttpRequest();
    ajax.addEventListener("load", completeHandler, false);
    ajax.addEventListener("error", errorHandler, false);
    ajax.open("POST", "php/action.php?createClient=''");
    ajax.send(data);


    function completeHandler(event){
        $(".overlay").hide();
        alert(event.target.responseText);
        loadClients();
     }

    function errorHandler(event){
        $(".overlay").hide();
        alert("Error : "+event.target.responseText);
    }

});

function loadClients(){
    var ajax = new XMLHttpRequest();
    ajax.addEventListener("load",completeHandler, false);
    ajax.addEventListener("error", errorHandler, false);
    ajax.open("POST", "php/action.php?loadClients=''");
    ajax.send("");

    function completeHandler(event){
        $(".overlay").hide();
        //alert(event.target.responseText);
        alert("Loading");
        $("#gridBox").html(event.target.responseText);
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

function search(q) {
    if (!search.results) search.results = {};
    if (search.results[q] != null) {
        search.results[q].show()
    } else {
        $('.clientGrid').hide();
        $('.clientGrid').each(function () {
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



$('[name=q]').keyup(function () {
    search($(this).val());
});