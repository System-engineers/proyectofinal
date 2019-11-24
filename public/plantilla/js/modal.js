$(document).ready(function() {

  $('#myModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget)
    var url = button.data('href')
    var modal = $(this)
    $.ajax({
      type: 'GET',
      url: url,
      success: function(data) {
        modal.find('.modal-body').html(data);	
      }
    });
  });

  $('#myModal').on('hide.bs.modal', function (e) {    
    $("#ytplayer").attr('src','')
  })

});