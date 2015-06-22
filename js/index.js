/** * Created by ME on 6/15/15.*/
$("#logins").on("submit", function(e){
    e.preventDefault();
    //alert("form submitted");
    if( ($("[name=username]").val()=='admin') && ($("[name=password]").val() == 'password' )){
        //alert("admin");
        //window.location.href= "users.php";
    }else{
        //alert("Else");
        //login();
        $("#login").submit();
    }
});

function login(){
    var data = new FormData;
    data.append("username",$("[name=username]").val());
    data.append("password",$("[name=password]").val());

    var ajax = new XMLHttpRequest();
    ajax.addEventListener("load", completeHandler, false);
    ajax.addEventListener("error", errorHandler, false);
    ajax.open("POST", "php/action.php?login=''");
    ajax.send(data);
    function completeHandler(event){
        //alert("Success : "+event.target.responseText);
        if(event.target.responseText == 'success'){
            //alert("User found");
            window.location.href= "trans.php";
        }else{
            //alert("Incorrect username password");
            $("[name=username]").val('');
            $("[name=password]").val('');
            alert(event.target.responseText);
        }
    }

    function errorHandler(event){
        alert("Error : "+event.target.responseText);
    }
}



