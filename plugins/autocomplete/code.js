jQuery.fn.autocomplete = function(array) {
  this.each(function(index, el) {
    var elem = $(this);
    var string = '<div id="autocompleteAppendDiv"></div>';
    var showIt = false;
    elem.parent().append(string);
    appendDiv = elem.parent().find('#autocompleteAppendDiv');
    elem.keyup(function(event) {
      if(elem.val().length > 1) {
        appendDiv.empty();
        $.each(array, function(index, el) {
          if(el.substr(0, elem.val().length).toUpperCase() == elem.val().toUpperCase()) {
            appendDiv.append('<p class="autocompleteOption">'+el+'</p>');
            showIt = true;
          }
        });
        if(showIt)
          appendDiv.show();
      }
    });
    elem.blur(function(event) {
      appendDiv.hide();
    });
    $('.autocompleteOption').click(function(event) {
      alert('hola');
      elem.val($(this).html());
    });
  });
}
