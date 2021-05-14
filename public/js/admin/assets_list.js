$(function(){
    $("#company_id").on('change', onselectcompany)

});

function onselectcompany(){
    var companyid = $(this).val();

    $.get('http://localhost/helpdesk/public/assetsplanning/'+companyid ,function(data) {
        var select ='<option value="">selecione</option>';
        var lista ='';
        for(var i=0; i< data.length; ++i){
            lista += "<tr>"+"<td>"+ data[i].id + "</td>"+"<td>"+ data[i].datasheet_id + "</td>"+"<td>"+ data[i].number + "</td>"+"<td>"+ data[i].location +"</td>"+"</tr>";

        }

           // combo+='<input type="checkbox" value="'+data[i].id+'" id="'+data[i].id+'" name="companies[]" class="filled-in chk-col-blue" />';


       console.log(lista);
        $('#lista').html(lista);
    });
};


