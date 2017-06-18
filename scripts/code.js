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

function jsInsert(action_user_type, data) {
  switch (action_user_type) {
    case 1:
      $('.tipo2').remove();
      break;
    case 2:
      $('.tipo1').remove();
      break;
  }
  $.get(data, function(response) {
    var ajaxResponse = JSON.parse(response);
    $('p.select-bed').choosebed(ajaxResponse);
  });
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

  jsShowForm();

  $.get(url + '/' + $room + '/' + $bed, function(response) {
    $('#patient').html(response);
    $('.modal-record').medical_record(patient + '/' + $room + '/' + $bed);
  });
}

function jsModify(url, data) {
  var array = [$('select[name="habitacion"]').val(), $('select[name="numero_cama"]').val()];

  jsFillData(array, url);

  $.get(data, function(response) {
    var ajaxResponse = JSON.parse(response);
    $('p.select-bed').choosebed(ajaxResponse);
  });

  jsShowForm();
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

function jsLoadCharts(li, url) {
  $('.nav-tabs li').removeClass('active');
  li.className = 'active';

  url += li.getAttribute('data-id');

  $.get(url, function(response) {
    var ajaxResponse = JSON.parse(response);
    $('iframe').remove();
    $('canvas').remove();
    $('.nav-tabs').after('<canvas id="chart"></canvas>');
    var canvas = $('#chart');
    if(li.getAttribute('data-id') == 2) {
      var myChart = new Chart(canvas, {
        type: ajaxResponse['type'],
        data: {
          labels: ajaxResponse['labels'],
          datasets: [
            {
              label: ajaxResponse['legend']['dia'],
              data: ajaxResponse['data']['dia'],
              backgroundColor: 'rgba(46, 97, 255, 1)'
            }, {
              label: ajaxResponse['legend']['sis'],
              data: ajaxResponse['data']['sis'],
              backgroundColor: 'rgba(255, 59, 36, 1)'
            }
          ]
        },
        options: {
          title: {
            display: true,
            text: ajaxResponse['title']
          },
          scales: {
            yAxes: [{
              ticks: {
                suggestedMin: ajaxResponse['min'],
                suggestedMax: ajaxResponse['max']
              }
            }]
          }
        }
      });
    }
    else {
      var myChart = new Chart(canvas, {
        type: ajaxResponse['type'],
        data: {
          labels: ajaxResponse['labels'],
          datasets: [{
            label: ajaxResponse['legend'],
            data: ajaxResponse['data'],
            backgroundColor: [
              'rgba(255, 99, 132, 0.2)',
              'rgba(54, 162, 235, 0.2)',
              'rgba(255, 206, 86, 0.2)',
              'rgba(75, 192, 192, 0.2)',
              'rgba(153, 102, 255, 0.2)',
              'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
              'rgba(255,99,132,1)',
              'rgba(54, 162, 235, 1)',
              'rgba(255, 206, 86, 1)',
              'rgba(75, 192, 192, 1)',
              'rgba(153, 102, 255, 1)',
              'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
          }]
        },
        options: {
          title: {
            display: true,
            text: ajaxResponse['title']
          },
          scales: {
            yAxes: [{
              ticks: {
                suggestedMin: ajaxResponse['min'],
                suggestedMax: ajaxResponse['max']
              }
            }]
          }
        }
      });
    }
  });
}

function jsShowForm() {
  $('.my-form-hidden').removeClass('my-form-hidden');
}

$(document).ready(function() {
  $('[name="action_user_type"]').click(function(event) {
    ($(this).val() == 2)? $('button[value="3"]').prop('disabled', true) : $('button[value="3"]').prop('disabled', false);
  });
  $('textarea.ohf').onehundredforty();
});
