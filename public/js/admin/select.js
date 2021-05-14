$(function() {
  $("#type").on("change", onselectConsuType);
});

function onselectConsuType() {
  var typeid = $(this).val();
  $.get("http://localhost/helpdesk/public/consu/" + typeid, function(data) {
    var select = '<option value="">selecione</option>';
    for (var i = 0; i < data.length; ++i) {
      select +=
        '<option value="' +
        data[i].id +
        '">' +
        data[i].description +
        "</option>";
    }
    var html_select =
      '<select class="form-control show-tick" name="asset_id">' +
      select +
      "</select>";
    console.log(html_select);
    $("#consumable").html(html_select);
  });
}

$(function() {
  $("#brand").on("change", onselectmodel);
});
function onselectmodel() {
  var brandid = $(this).val();
  $.get("http://localhost/helpdesk/public/model/" + brandid, function(data) {
    var select = '<option value="">selecione</option>';
    for (var i = 0; i < data.length; ++i) {
      select +=
        '<option value="' + data[i].id + '">' + data[i].name + "</option>";
    }
    var html_select =
      '<select class="form-control show-tick" name="model">' +
      select +
      "</select>";
    console.log(html_select);
    $("#model").html(html_select);
  });
}

$(function() {
  $("#company").on("change", onselectcompany);
});
function onselectcompany() {
  var companyid = $(this).val();
  $.get("http://localhost/helpdesk/public/cecocompany/" + companyid, function(
    data
  ) {
    var select = '<option value="">selecione</option>';
    for (var i = 0; i < data.length; ++i) {
      select +=
        '<option value="' + data[i].id + '">' + data[i].number + "</option>";
    }
    var html_select =
      '<select class="form-control show-tick" id="ceco_id" name="ceco_id" required>' +
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
  var cecoid = $("#ceco_id")
    .find(":selected")
    .val();
  $.get("http://localhost/helpdesk/public/ceco/" + cecoid, function(data) {
    // var select = '<option value="">selecione</option>';
    var select;
    for (var i = 0; i < data.length; ++i) {
      select +=
        '<option value=" ' +
        data[i].id +
        '">' +
        data[i].name +
        " - " +
        data[i].description +
        "</option>";
    }
    var html_select =
      '<select class="form-control show-tick" id="depart" name="department" required>' +
      select +
      "</select>";

    $("#department").html(html_select);
    onselectdepar();
  });
}

// $(document).on("change", "#departamento", onselectdepar);
// // Does some stuff and logs the event to the console
// // $(function() {
// //   $("#department").on("change", onselectdepar);
// // });
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
//       '<select class="form-control show-tick" id="user_id" name="user_id" required>' +
//       select +
//       "</select>";

//     $("#user_dep").html(html_select);
//   });
// }
