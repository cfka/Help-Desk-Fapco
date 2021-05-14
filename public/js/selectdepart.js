$(function() {
  $("#select_depart").on("change", onselectdepart);
});

function onselectdepart() {
  var $departid = $(this).val();
  $.get("http://localhost/helpdesk/public/companyuser/" + $departid, function(
    data
  ) {
    $("#company").val(data);
  });
}
