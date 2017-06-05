jQuery.fn.autocomplete = function(array) {
  this.each(function(index, el) {
    var elem = $(this);
    var string = '<div id="autocompleteAppendDiv"></div>';
    var shown = false;
    elem.parent().append(string);
    appendDiv = elem.parent().find('#autocompleteAppendDiv');
    elem.keypress(function(event) {
      if(elem.val().length > 0) {
        array.each(function(index, el) {
          if(el.substr(0, elem.val()).toUpperCase() === elem.val().toUpperCase()) {
            appendDiv.append('<p class="autocompleteOption">'+elem+'</p>');
            shown = true;
          }
        });
        if(shown)
          appendDiv.show();
      }
    });
    elem.blur(function(event) {
      appendDiv.hide();
    });
    $('.autocompleteOption').click(function(event) {
      elem.val($(this).html());
    });
  });
}
