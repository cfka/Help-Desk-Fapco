$(function(){

    $('#planning_at').hide();
    $('#failure_id').on('change',onselectfailure)
});
function onselectfailure() {
    var failure = $(this).val();
    if ( failure === '4'){
        $('#planning_at').show();
    } else {
        if ( failure === '5'){
            $('#planning_at').show();
        }else {
            $('#planning_at').hide();
        }
    }
}