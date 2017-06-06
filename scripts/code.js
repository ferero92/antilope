function jsPasswordChange(array) {
  $('#autocomplete').autocomplete(["hola", "holaa", "holla"]);
}

function jsInsert(action_user_type) {
  switch (action_user_type) {
    case '1':
      $('.tipo2').remove();
      break;
    case '2':
      $('.tipo1').remove();
      break;
  }
}
