jQuery.fn.autocomplete = function(array) {
  this.each(function(index, el) {
    var elem = $(this);
    var string = '<div id="autocompleteAppendDiv"></div>';
    var shown = false;
    elem.parent().append(string);
    appendDiv = elem.parent().find('#autocompleteAppendDiv');
    elem.keyup(function(event) {
      if(elem.val().length > 1) {
        $.each(array, function(index, el) {
          // alert(el.substr(0, elem.val().length).toUpperCase()+' valor input => '+elem.val().toUpperCase());
          if(el.substr(0, elem.val().length).toUpperCase() == elem.val().toUpperCase()) {
            appendDiv.append('<p class="autocompleteOption">'+el+'</p>');
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
