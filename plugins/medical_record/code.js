jQuery.fn.medical_record = function(url) {
  this.each(function(index, el) {
    var elem = $(this);
    var modal = '<div class="modal fade" id="medicalRecordModal" role="dialog">'+
                  '<div class="modal-dialog">'+
                    '<div class="modal-content">'+
                      '<div class="modal-header">'+
                        '<button type="button" class="close" data-dismiss="modal">&times;</button>'+
                        '<h4 class="modal-title"></h4>'+
                      '</div>'+
                      '<div class="modal-body"></div>'+
                    '</div>'+
                  '</div>'+
                '</div>';
    var openModal = '<span data-toggle="modal" data-target="#medicalRecordModal" class="glyphicon glyphicon-new-window"></span>';

    $('body').append(modal);
    elem.after(openModal);

    $.get(url, function(response) {
      $('#medicalRecordModal h4').html(elem.html());
      $('#medicalRecordModal .modal-body').html(response);
    })
  });
}
