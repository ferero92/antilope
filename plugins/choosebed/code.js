jQuery.fn.choosebed = function(data) {
  this.each(function(index, el) {
    var elem = $(this);

    var string = '<span data-toggle="modal" data-target="#selectBed" class="glyphicon glyphicon-new-window sab-gly"></span>';
    elem.find('strong').html(string);

    var modal = '<div id="selectBed" class="modal fade" data-keyboard="false" data-backdrop="static">'+
                  '<div class="modal-dialog modal-lg">'+
                    '<div class="modal-content">'+
                      '<div class="modal-header">'+
                        '<button type="button" class="close" data-dismiss="modal">&times;</button>'+
                        '<div class="row">'+
                          '<label class="col-xs-2">Plantas:</label>'+
                          '<select id="modalSelect" class="form-control col-xs-6">'+
                            data['floors']+
                          '</select>'+
                        '</div>'+
                      '</div>'+
                      '<div class="modal-body">'+
                        data['table']+
                      '</div>'+
                      '<div class="modal-footer">'+
                        '<p>Habitación: <strong></strong> Nº Cama: <strong></strong></p>'+
                        '<button class="btn btn-success" data-dismiss="modal">Seleccionar</button>'
                      '</div>'+
                    '</div>'+
                  '</div>'+
                '</div>';
    $('body').append(modal);
    roomnbed();

    $('#modalSelect').change(function(event) {
      $('.sab-planta').addClass('hidden');
      $('.sab-planta[data-id="'+$('#modalSelect').val()+'"]').removeClass('hidden');
    });

    $('.sab-habitacion img.sab-img-a').click(function(event) {
      $('[name="habitacion"]').val($(this).parent().attr('data-id'));
      $('[name="numero_cama"]').val($(this).index());

      $('.sab-img-a').removeClass('sab-img-a-select');
      $(this).addClass('sab-img-a-select');

      roomnbed();
    });
  });
}

function roomnbed() {
  $('.modal-footer strong')[0].innerHTML = $('[name="habitacion"]').val();
  $('.modal-footer strong')[1].innerHTML = $('[name="numero_cama"]').val();
}
