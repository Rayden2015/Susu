function loadSales(){
    $(".overlay").show();
    var ajax = new XMLHttpRequest();
    ajax.addEventListener("load",completeHandler, false);
    ajax.addEventListener("error", errorHandler, false);
    ajax.open("POST", "php/action.php?loadSales=''");
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

loadSales();