function jsChangePassword(array) {
  $('#autocomplete').autocomplete(["hola", "holaa", "holla"]);
}

function jsModalRecord() {
  $('.modal-record').medical_record();
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

function jsConstants(url, patient, constants) {
  $room = $('select[name="habitacion"]').val();
  $bed = $('select[name="numero_cama"]').val();

  jsPatient(url, patient);

  $.get(constants + '/' + $room + '/' + $bed, function(response) {
    $('#showConstants tbody').html(response);
  });
}
