jQuery.fn.onehundredforty = function() {
  this.each(function(index, el) {
    var elem = $(this);
    var string = '<p class="ohf-p"><span class="ohf-span">0</span>/140</p>';

    elem.after(string);

    elem.keyup(function(event) {
      elem.parent().find('.ohf-span').html(elem.val().length);
      if(elem.val().length > 140) {
        $('button[type="submit"]').prop('disabled', true);
        elem.addClass('ohf-limit');
      }
      else {
        $('button[type="submit"]').prop('disabled', false);
        elem.removeClass('ohf-limit');
      }
    });
  });
}
