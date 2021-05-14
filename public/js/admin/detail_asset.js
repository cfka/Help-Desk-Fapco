$(function(){

    $('#esp_technical').hide();
    $('#asset_type').on('change',onselectassettype)
});
function onselectassettype() {
    var typeasset = $(this).val();


    if ( typeasset === '4'){
        $('#save').hide();
        $('#esp_technical').show("200");

    } else {
        if ( typeasset === '6'){
            $('#save').hide();
            $('#esp_technical').show("200");

        }else {
        $('#save').show();
        $('#esp_technical').hide();
    }
    }

}