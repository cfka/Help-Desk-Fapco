$(function(){

    $('#card22').hide();
    $('#user_type').on('change',onselectusertype)
});
function onselectusertype() {
    var typeuser = $(this).val();

    if ( typeuser === 'ADMIN') {
        $('#save').hide();
        $('#card22').show("200");

    }
    else {
        $('#save').show();
        $('#card22').hide();
    }

}