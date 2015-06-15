$(document).ready(function() {
    var addUser = $('#add-user');
    addUser.on('click', function() {
        $('#add-user-modal').modal('show');
    });

    $('.selection.dropdown').dropdown();

    $('#datepicker').datetimepicker({
        timepicker: false,
        format: 'd-m-Y'
    });
    
});