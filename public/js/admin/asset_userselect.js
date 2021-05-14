$(function(){
    $("#user_select").on('change', function (e) {
        console.log(e);
        var user_id=e.target.value;
        $.get('http://localhost/helpdesk/public/userasset/'+ user_id,function (data) {
           // console.log(data);
            if(!data){
                options = options + '<option value="'+ assetObj.id+'">'+ assetObj.description +'</option>';
            }
            $('#asset_select').empty();
            $('#asset_select').append('<option>-- Seleccione Activo Fijo --</option>');
            var options;
            options = options + '<option value="">-- Seleccione Activo Fijo --</option>';
            $.each(data,function (index,assetObj) {
               options = options + '<option value="'+ assetObj.id+'">'+ assetObj.number +'</option>';
            });

            var selecthtml = '<select class="form-control show-tick" name="asset_id">'+ options +'</select>';
            $("#container").html(selecthtml);
        });

    });
});


