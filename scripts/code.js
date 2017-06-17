function jsAutocomplete(url) {
  $('#autocomplete').autocomplete(url);
}

function jsModalRecord() {
  $('.modal-record').medical_record();
}

function jsFillData(array, url) {
  $.post(url, {data: array}, function(response) {
    ajaxResponse = JSON.parse(response);
    $.each(ajaxResponse['data'], function(index, el) {
      if(index == 'ayuda_wc' && el == 1) {
        $('[name="ayuda_wc"]').prop('checked', true);
      }
      else $('[name="'+index+'"]').val(el);
    });
    $.each(ajaxResponse['select'], function(index, el) {
      $('[name="'+index+'"]').html(el);
    });
    if($('[name="tipo"]').val() == 1 || $('[name="tipo"]').val() == 6) $('[name="planta"]').prop('disabled', true);
  });
}

function jsInsert(action_user_type) {
  switch (action_user_type) {
    case 1:
      $('.tipo2').remove();
      break;
    case 2:
      $('.tipo1').remove();
      break;
  }
}

function jsStaffFloor(url) {
  if($('select[name="planta"]').val() != 0){
    $('select[name="planta"]').parent().hide();
    jsChangeFloor(url);
  }
}

function jsChangeFloor(url) {
  $floor = $('select[name="planta"]').val();
  $.get(url + '/' + $floor, function(response) {
    $('select[name="habitacion"]').html(response);
  });
}

function jsComboBeds(url) {
  $room = $('select[name="habitacion"]').val();
  $.get(url + '/' + $room, function(response) {
    $('select[name="numero_cama"]').html(response);
  });
}

function jsPatient(url, patient) {
  $room = $('select[name="habitacion"]').val();
  $bed = $('select[name="numero_cama"]').val();
  $.get(url + '/' + $room + '/' + $bed, function(response) {
    $('#patient').html(response);
    $('.modal-record').medical_record(patient + '/' + $room + '/' + $bed);
  });
}

function jsModify(url) {
  var array = [$('select[name="habitacion"]').val(), $('select[name="numero_cama"]').val()];

  jsFillData(array, url);
}

function jsConstants(url, patient, constants) {
  $room = $('select[name="habitacion"]').val();
  $bed = $('select[name="numero_cama"]').val();

  jsPatient(url, patient);

  $.get(constants + '/' + $room + '/' + $bed, function(response) {
    $('#showConstants tbody').html(response);
  });
}

function jsFloor() {
  if($('[name="tipo"]').val() == 1) {
    $('[name="planta"]').prop('required', false);
    $('[name="planta"] option:first').prop('selected', true);
    $('[name="planta"]').prop('disabled', true);
  }
  else {
    $('[name="planta"]').prop('required', true);
    $('[name="planta"]').prop('disabled', false)
  }
}

function jsChangePassword() {
  if($('[name="newpassword"]').val() == $('[name="password"]').val()) $('button').prop('disabled', false);
}

$(document).ready(function() {
  $('[name="action_user_type"]').click(function(event) {
    ($(this).val() == 2)? $('button[value="3"]').prop('disabled', true) : $('button[value="3"]').prop('disabled', false);
  });
  $('textarea.ohf').onehundredforty();
});
