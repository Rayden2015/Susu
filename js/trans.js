/**
 * Created by ME on 6/14/15.
 */

loadTrans();


$("#addTransBtn").click(function(){
    $('#add-trans-modal').modal('show');
});

$("#createTrans").click(function(){
    $(".overlay").show();
    data = new FormData();
    data.append("client", $("#client option:selected").val());
    data.append("amount", $("#amount").val());
    //data.append("password", $("#con_pass").val());
    data.append("date", $("#date").val());
    data.append("type", $("#type option:selected").val());
    data.append("sales", $("#sales option:selected").val());

    var ajax = new XMLHttpRequest();
    ajax.addEventListener("load", completeHandler, false);
    ajax.addEventListener("error", errorHandler, false);
    ajax.open("POST", "php/action.php?createTrans=''");
    ajax.send(data);

    function completeHandler(event){
        $(".overlay").hide();
        alert(event.target.responseText);
        console.log(event.target.responseText);
        loadOneTrans();
        $("#amount").val('');
        $("#datepicker").val('');
     }

    function errorHandler(event){
        $(".overlay").hide();
        alert("Error : "+event.target.responseText);
        console.log(event.target.responseText);
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
    console.log("Search by ");
    sum();
});


//Search by Client
$('[name=c]').keyup(function () {
    search($(this).val(),'td:nth-child(2)');
    console.log("Search by Client");
    sum();
});

$('[name=s]').keyup(function () {
    search($(this).val(),'td:nth-child(7)');
    console.log("Search by Salesperson");
    sum();
});

//Search by Transaction Type
$('[name=t]').change(function (){
    console.log("Search by Transaction Type");
    if($(this).val() == 'All'){
        $('#gridBox tr ').each(function () {
            $(this).show();
        });
    }else{
        $('#gridBox tr').hide();
        search($(this).val(),'td:nth-child(3)');
    }

    sum();
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
            var operand = $(this).find("td:nth-child(4)").filter(":visible").html();
            operand = parseInt(operand);
            withdrawals = withdrawals + operand;
        }else{
            var operand = $(this).find("td:nth-child(4)").filter(":visible").html();
            operand = parseInt(operand);
            deposits = deposits + operand;
        }
        console.log("Summation Executed");
    });

    balance = deposits - withdrawals;
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
        
       if($("#end").val() == ''){
           $("#time").html(' : '+$("#start").val());
       }else{
           $("#time").html('From '+$("#start").val()+' To '+$("#end").val());
       }
       sum();
    }

    function errorHandler(event){
        $(".overlay").hide();
        alert("Error : "+event.target.responseText);
    }
}



//Populating Clients on Selecting Salesperson
function getClientsPerSalesPerson(){
    data = new FormData();
    data.append("salesPerson", $("#sales option:selected").val());

    var ajax = new XMLHttpRequest();
    ajax.addEventListener("load",completeHandler, false);
    ajax.addEventListener("error", errorHandler, false);
    ajax.open("POST", "php/action.php?clients_per_salesPerson=''");
    ajax.send(data);

    function completeHandler(event){
        //alert(event.target.responseText);
        $("#salesPersonContainer").html(event.target.responseText);
        console.log("Called getClientsPerSalesPerson successfully ");
    }

    function errorHandler(event){
        alert("Error : "+event.target.responseText);
         console.log("getClientsPerSalesPerson Failed ");
    }
}


$("#sales").change(function(){
    getClientsPerSalesPerson();
});
