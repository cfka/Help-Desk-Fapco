function onselectuser() {
  var userid = $("#user")
    .find(":selected")
    .val();
  console.log(userid);

  $.get("http://192.168.0.152/helpdesk/public/assetUser/" + userid, function(
    data
  ) {
    var select = '<option value="">selecione</option>';
    for (var i = 0; i < data.length; ++i) {
      select +=
        '<option value="' + data[i].id + '">' + data[i].model + "</option>";
    }
    var html_select =
      '<select class="form-control show-tick" id="asset" name="asset" required>' +
      select +
      "</select>";
    $("#asset").html(html_select);
  });
}
