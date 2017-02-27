function navbar() {
  var template = $('.js--templates .js--navbar');
  var navbars = $('ps-navbar');
  navbars = template.replaceAll(navbars);
  init(navbars);
}

function initComponents() {
  navbar();
}
