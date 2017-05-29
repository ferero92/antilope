jQuery.fn.autocomplete = function() {
  this.each(function(index, el) {
    var elem = $(this);
    var string = '<div id="autocompleteAppendDiv"><p>Holaa</p></div>';
    elem.parent().append(string);
    appendDiv = elem.parent().find('#autocompleteAppendDiv');
    elem.change(function(event) {
      alert(elem.val());
      if(elem.val().length > 2)
        appendDiv.show();
    });
    elem.blur(function(event) {
      appendDiv.hide();
    });
  });
}
