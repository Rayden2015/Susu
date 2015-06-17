/**
 * Created by ME on 6/15/15.
 */
$("#login").on( "submit",function(e){
    //alert("Login submit");
    e.preventDefault();
    var data = new FormData;
    data.append("username",$("[name=username]").val());
    data.append("password",$("[name=password]").val());

    var ajax = new XMLHttpRequest();
    ajax.addEventListener("load", completeHandler, false);
    ajax.addEventListener("error", errorHandler, false);
    ajax.open("POST", "php/action.php?login=''");
    ajax.send(data);

    function completeHandler(event){
        alert("Success : "+event.target.responseText);
        if(event.target.responseText == 'success'){
            var hostname = window.location.hostname;
            window.location.href= "trans.php";
        }else{
            $("[name=username]").val('');
            $("[name=password]").val('');
        }
    }

    function errorHandler(event){
        alert("Error : "+event.target.responseText);
    }

});





