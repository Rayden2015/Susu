/**
 * Created by ME on 6/14/15.
 */
loadUsers();

$("#createUser").click(function(){
    data = new FormData();
    data.append("username", $("#username").val());
    data.append("password", $("#password").val());
    data.append("name", $("#name").val());
    data.append("email", $("#email").val());
    data.append("contact", $("#contact").val());
    data.append("location", $("#location").val());
    data.append("position", $("#postion").val());

    var ajax = new XMLHttpRequest();
    ajax.addEventListener("load", completeHandler, false);
    ajax.addEventListener("error", errorHandler, false);
    ajax.open("POST", "php/action.php?createUser=''");
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
    var ajax = new XMLHttpRequest();
    ajax.addEventListener("load",completeHandler, false);
    ajax.addEventListener("error", errorHandler, false);
    ajax.open("POST", "php/action.php?loadUsers=''");
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
        $('.column').hide();
        $('.column').each(function () {
            var product = $(this).find("h2"),
                Regex = new RegExp(q, 'i');

            if (product.text().match(Regex)) {
                //                    var link_id = link.parent('li').attr('data-link-id');
                product.parent('div.column').addClass('FOUND_LINKS_MATCH');
            } else {
                product.parent('div.column').removeClass('FOUND_LINKS_MATCH');
            }
        });
        search.results[q] = $('.FOUND_LINKS_MATCH');
        if (search.results[q].length === 0) {
            $('.column').fadeOut();
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