$(document).ready(function() {

    autoLogout(10); 
    
    $('.datepicker').datetimepicker({
        timepicker: false,
        format: 'd-M-Y'
    });

    $('.all_tables').DataTable();

    $('#data_table').DataTable();

	// //clientsInit();
    $('.ui.selection.dropdown').dropdown();

   
    function autoLogout(time){
         var idleTime = 0;
        
        //Increment the idle time counter every minute.
        var idleInterval = setInterval(timerIncrement, 60000); // 1 minute

        //Zero the idle timer on mouse movement.
        $(this).mousemove(function (e) {
            idleTime = 0;
        });
        $(this).keypress(function (e) {
            idleTime = 0;
        });
        console.log("Auto Logout Called"); 

        function deleteAllCookies() {
            var cookies = document.cookie.split(";");

            for (var i = 0; i < cookies.length; i++) {
                var cookie = cookies[i];
                var eqPos = cookie.indexOf("=");
                var name = eqPos > -1 ? cookie.substr(0, eqPos) : cookie;
                document.cookie = name + "=;expires=Thu, 01 Jan 1970 00:00:00 GMT";
            }
            
            console.log("All Cookies Deleted");
        }

        function timerIncrement() {
            idleTime = idleTime + 1;
            if (idleTime >time) { //
                //window.location.reload();
                deleteAllCookies();
                window.location.href = "logout.php";
            }
            console.log("Time Incremented");
        }
    }

   
});


