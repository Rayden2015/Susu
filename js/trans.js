/**
 * Created by ME on 6/14/15.
 */

loadTrans();

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
    data.append("date", $(".datepicker_time").val());
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
        sum();
        $("#time").html(': Today')
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
        sum();
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
    var deposits    = 0;
    var withdrawals = 0;
    var balance     = 0;

    $("#gridBox tr ").each(function(){
        if($(this).find("td:nth-child(3)").html() == 'Withdrawal' ){
            var operand = $(this).find("td:nth-child(4)").html();
            operand = parseInt(operand);
            withdrawals = withdrawals + operand;
        }else{
            var operand = $(this).find("td:nth-child(4)").html();
            operand = parseInt(operand);
            deposits = deposits + operand;
        }

    });

    balance = deposits - withdrawals;
    //alert("Withdrawals : "+withdrawals);
    //alert("Deposits : "+deposits);
    //alert("Balance : "+balance);
    $("#depo").html(deposits);
    $("#with").html(withdrawals);
    $("#bal").html(balance);

}

$("#loadData").click(loadTransWithin);

function loadTransWithin(start, end){
    $(".overlay").show();
    data = new FormData();
    data.append("start", $("#start").val());
    data.append("end", $("#end").val());

    var ajax = new XMLHttpRequest();
    ajax.addEventListener("load",completeHandler, false);
    ajax.addEventListener("error", errorHandler, false);
    ajax.open("POST", "php/action.php?loadTransWithin=''");
    ajax.send(data);

    function completeHandler(event){
        $(".overlay").hide();
        //alert(event.target.responseText);
        $("#gridBox").html(event.target.responseText);
        sum();
       if($("#end").val() == ''){
           $("#time").html(' : '+$("#start").val());
       }else{
           $("#time").html('From '+$("#start").val()+' To '+$("#end").val());
       }
    }

    function errorHandler(event){
        $(".overlay").hide();
        alert("Error : "+event.target.responseText);
    }
}

