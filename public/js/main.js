
$(document).ready(function () {
  $('#datetimepicker').datepicker({
    format: 'dd-mm-yyyy',
    startDate: '-1d',
    autoclose: true
  });
});

$('.typebtn').click(function(  ) {
  var val = $(this).data('value');
  $('#listType').val(val);
  $('#newList').modal('hide');
  $('.modal-backdrop').remove();
  $('#createNew').modal('show');
});