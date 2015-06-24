/**
 * Created by ME on 6/14/15.
 */
loadTrans();

var editTrans = $('.editTrans');
$(document).on('click', editTrans, function(event) {
    var $target = event.target,
        data = $target.closest('tr'),
        dataId = data.dataset['id'],
        dataType = data.dataset['type'],
        dataDate = data.dataset['date'],
        dataClient = data.dataset['client'],
        dataAmount = data.dataset['amount'];
        $("#date").val(dataDate);
        $("#amount").val(dataAmount);
        $("#id").val(dataId);
        $('#add-user-modal').modal('show');
        // console.log(dataAmount);
});

$('.datepicker').datetimepicker({
    timepicker: false,
    format: 'd-M-Y h:i a'
});

$("#createTrans").click(function(){
    $(".overlay").show();
    data = new FormData();
    data.append("client", $("#client option:selected").val());
    data.append("amount", $("#amount").val());
    //data.append("password", $("#con_pass").val());
    data.append("date", $("#datepicker").val());
    data.append("type", $("#type option:selected").val());

    var ajax = new XMLHttpRequest();
    ajax.addEventListener("load", completeHandler, false);
    ajax.addEventListener("error", errorHandler, false);
    ajax.open("POST", "php/action.php?createTrans=''");
    ajax.send(data);

    function completeHandler(event){
        $(".overlay").hide();
        alert(event.target.responseText);
        loadOneTrans();
        $("#amount").val('');
        $("#datepicker").val('');
     }

    function errorHandler(event){
        $(".overlay").hide();
        alert("Error : "+event.target.responseText);
    }

});

function loadTrans(){
    $(".overlay").show();
    var ajax = new XMLHttpRequest();
    ajax.addEventListener("load",completeHandler, false);
    ajax.addEventListener("error", errorHandler, false);
    ajax.open("POST", "php/action.php?loadTrans=''");
    ajax.send("");

    function completeHandler(event){
        $(".overlay").hide();
        //alert(event.target.responseText);
        $("#gridBox").html(event.target.responseText);
    }

    function errorHandler(event){
        $(".overlay").hide();
        alert("Error : "+event.target.responseText);
    }


}

function loadOneTrans(){
    $(".overlay").show();
    var ajax = new XMLHttpRequest();
    ajax.addEventListener("load",completeHandler, false);
    ajax.addEventListener("error", errorHandler, false);
    ajax.open("POST", "php/action.php?loadOneTrans=''");
    ajax.send("");

    function completeHandler(event){
        $(".overlay").hide();
        //alert(event.target.responseText);
        $("#gridBox").prepend(event.target.responseText);
    }

    function errorHandler(event){
        $(".overlay").hide();
        alert("Error : "+event.target.responseText);
    }
}

function search(q, against) {
    if (!search.results) search.results = {};
    if (search.results[q] != null) {
        search.results[q].show()
    } else {
        $('#gridBox tr').hide();
        $('#gridBox tr ').each(function () {
              product = $(this).find(against),
                Regex = new RegExp(q, 'i');

            if (product.html().match(Regex)) {
                //var link_id = link.parent('li').attr('data-link-id');
                product.parents('tr').addClass('FOUND_LINKS_MATCH');
            } else {
                product.parents('tr').removeClass('FOUND_LINKS_MATCH');
            }
        });
        search.results[q] = $('.FOUND_LINKS_MATCH');
        if (search.results[q].length === 0) {
            $('#gridBox tr').hide();
            $('.void-content-message').show();
        } else {
            search.results[q].show();
            $('.void-content-message').hide();
        }
    }
}

$('[name=d]').keyup(function () {
    search($(this).val(),'td:nth-child(1)');
});

$('[name=c]').keyup(function () {
    search($(this).val(),'td:nth-child(2)');
});

$('[name=t]').change(function (){
    if($(this).val() == 'All'){
        $('#gridBox tr ').each(function () {
            $(this).show();
        });
    }else{
        $('#gridBox tr').hide();
        search($(this).val(),'td:nth-child(3)');
    }
});


//activating and deactivating users

$(".activate").click(function(e){
    e.preventDefault();
    alert("Activate was clicked");
});

function sum(){
    var add = 0;
    $("#gridBox td:nth-child(5)").each(function(){
        var operand = $(this).html();
        operand  = parseInt(operand);
            add = add + operand;
    });
    alert(add);
}

function loadTransWithin(start, end){
    $(".overlay").show();
    var ajax = new XMLHttpRequest();
    ajax.addEventListener("load",completeHandler, false);
    ajax.addEventListener("error", errorHandler, false);
    ajax.open("POST", "php/action.php?loadTrans=''");
    ajax.send("");

    function completeHandler(event){
        $(".overlay").hide();
        //alert(event.target.responseText);
        $("#gridBox").html(event.target.responseText);
    }

    function errorHandler(event){
        $(".overlay").hide();
        alert("Error : "+event.target.responseText);
    }
}

