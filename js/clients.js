loadClients();
/**
 * Created by ME on 6/14/15.
 */
// $(document).ready(function() {
//     $('#data_tale').DataTable();
// });

 $('#addClientBtn').click(function(){
     $("#add-client-modal").find('input').val("");
     $('#add-client-modal').modal('show');
 });

 $('#acc_type').on('change', function() {
    if($(this).val() == 'Deposit Account') {
        $('#uc').hide();
    } else {
        $('#uc').show();
    }
});


$(".editClientBtn").bind("click");

$(".editClientBtn").click(function() {
    var data = $(this).parents("tr");
     $("#full_name").val(data.attr("data-name") );
        $("#email").val(data.attr("data-email"));
        $("#contact").val( data.attr("data-contact") );
        $("#unit").val(data.attr("data-unitContribution"));
        $("#location").val( data.attr("data-location") );
        $("#dob").val(data.attr("data-dateOfBirth"));
        $("#kin").val( data.attr("data-nextOfKin") );
        $("#h_number").val( data.attr("data-houseNumber") );
        $("#occupation").val( );
        $("#position option:selected").val( data.attr("data-houseNumber") );
        $("#sales option:selected").val(data.attr("data-salesPerson")  );
        $("#sex option:selected").val(data.attr("data-sex"));
        $("#id").val(data.attr("data-id"));
        $("#nok").val( data.attr("data-nextOfKin"));
        $("#acc").val( data.attr("data-accountNumber") );
        $('#acc_type').val( data.attr("data-accountType")  );

        $('#add-client-modal').modal('show');
        //console.log(data);
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
    data.append("picture", $("#picture")[0].files[0]);
    data.append("name", $("#full_name").val());
    data.append("email", $("#email").val());
    data.append("contact", $("#contact").val());
    data.append("unitContribution", $("#unit").val());
    data.append("location", $("#location").val());
    data.append("dateOfBirth", $("#dob").val());
    data.append("nextOfKin", $("#kin").val());
    data.append("houseNumber", $("#h_number").val());
    data.append("occupation", $("#occupation").val());
    data.append("position", $("#position option:selected").val());
    data.append("salesPerson", $("#sales option:selected").val());
    data.append("sex", $("#sex option:selected").val() );
    data.append("id", $("#id").val());
    data.append("nok", $("#nok").val());
    data.append("acc", $("#acc").val());
    data.append("accountType", $('#acc_type').val());


    var ajax = new XMLHttpRequest();
    ajax.addEventListener("load", completeHandler, false);
    ajax.addEventListener("error", errorHandler, false);
    ajax.open("POST", url);
    ajax.send(data);


    function completeHandler(event) {
        $(".overlay").hide();
        alert(event.target.responseText);
        console.log(event.target.responseText);
        loadClients();
    }

    function errorHandler(event) {
        $(".overlay").hide();
        alert("Error : " + event.target.responseText);
        console.log(event.target.responseText);
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


$("#activateClientBtn").bind("click");

$('#activateClientBtn').click(function() {

   $(".overlay").show();
    var values = $(this).parents("tr");
    data = new FormData();
    data.append("id", values.attr("data-id") );
    data.append("status", values.attr("data-status") );

    var ajax = new XMLHttpRequest();
    ajax.addEventListener("load",completeHandler, false);
    ajax.addEventListener("error", errorHandler, false);
    ajax.open("POST", "php/action.php?activateClient=''");
    ajax.send(data);

    function completeHandler(event){
        $(".overlay").hide();
        alert(event.target.responseText);
        console.log(event.target.responseText);
        loadClients();
    }

    function errorHandler(event){
        $(".overlay").hide();
        alert("Error : "+event.target.responseText);
        console.log(event.target.responseText);
    }
});

