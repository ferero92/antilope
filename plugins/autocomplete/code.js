jQuery.fn.autocomplete = function(url) {
  this.each(function(index, el) {
    var elem = $(this);
    var string = '<div id="autocompleteAppendDiv"></div>';
    var showIt = false;
    elem.parent().append(string);
    appendDiv = elem.parent().find('#autocompleteAppendDiv');
    elem.keyup(function(event) {
      if(elem.val().length > 2) {
        appendDiv.empty();
        $.get(url + '/' + elem.val(), function(response) {
          appendDiv.append(response);
          appendDiv.show();
        });
      }
      else appendDiv.hide();
    });
  });
}

function optionAutocomplete(p, fn, url) {
  var elem = $('#autocomplete');
  elem.val(p.innerHTML);
  $('#autocompleteAppendDiv').hide();

  var array = [p.getAttribute('data-id')];

  $('.my-form-hidden').removeClass('my-form-hidden');

  fn(array, url);
}
