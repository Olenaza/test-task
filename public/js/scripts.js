$( function() {
    $( "#datepicker" ).datepicker({ dateFormat: 'dd-mm-yy' });
} );

$( function() {
    $('#timepicker').timepicker({
        defaultTime: ''  // removes the highlighted time for when the input is empty.
    });
} );

<!-- Flash slide up -->
$('div.alert').delay(3000).slideUp(300);
