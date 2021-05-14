$(function() {
  $("#company_id").on("change", onselectcompany);
});
function onselectcompany() {
  var companyid = $(this).val();
  // console.log(companyid);

  $.get("http://localhost/helpdesk/public/cecocompany/" + companyid, function(
    data
  ) {
    var select = '<option value="">selecione</option>';
    for (var i = 0; i < data.length; ++i) {
      select +=
        '<option value="' + data[i].id + '">' + data[i].number + "</option>";
    }
    var html_select =
      '<select class="form-control show-tick" id="ceco_id" name="ceco_id" required data-live-search="true">' +
      select +
      "</select>";

    $("#ceco").html(html_select);
    onselectceco();
  });
}

$(function() {
  $("#ceco").on("change", onselectceco);
});
function onselectceco() {
  var cecoid = $("#ceco")
    .find(":selected")
    .val();
  console.log(cecoid);
  $.get("http://localhost/helpdesk/public/ceco/" + cecoid, function(data) {
    // var select = '<option value="">selecione</option>';
    var select;
    for (var i = 0; i < data.length; ++i) {
      select +=
        '<option value="' + data[i].id + '">' + data[i].name + "</option>";
    }
    var html_select =
      '<select class="form-control show-tick" id="depart" name="department" required>' +
      select +
      "</select>";

    $("#depart").html(html_select);
    onselectdepar();
  });
}

// $(document).on("change", "#departamento", onselectdepar);
// Does some stuff and logs the event to the console
// $(function() {
//   $("#department").on("change", onselectdepar);
// });
// $(function() {
//   $("#depart").on("change", onselectdepar);
// });
// function onselectdepar(event) {
//   var depaid = $("#depart")
//     .find(":selected")
//     .val();
//   $.get("http://192.168.0.152/helpdesk/public/user_dep/" + depaid, function(
//     data
//   ) {
//     var select = '<option value="">selecione</option>';
//     for (var i = 0; i < data.length; ++i) {
//       select += `<option value='${data[i].id}'>
//       ${data[i].first_name} ${data[i].last_name}
//       </option>`;
//     }
//     var html_select =
//       '<select class="form-control show-tick" id="user" name="user" required>' +
//       select +
//       "</select>";

//     $("#user").html(html_select);
//   });
// }
