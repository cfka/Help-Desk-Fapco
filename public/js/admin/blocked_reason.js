$(function(){

    $('#solution').hide();
    $('#card1').hide();
    $('#statuschange').on('change',onselectstatuschange)
});
function onselectstatuschange() {
    var typestatus = $(this).val();

    if ( typestatus === 'BLOCKED') {
        $('#solution').hide();
        $('#card1').show("200");
    }
    else
        if(typestatus === 'SOLVED'){
            $('#card1').hide();
            $('#solution').show("200");
    }
    else {
        $('#card1').hide();
        $('#solution').hide();
    }

}