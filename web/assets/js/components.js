function navbar() {
  getView('navbar').then(function(view) {
    var template = $(view);
    var navbars = $('ps-navbar');
    navbars = template.replaceAll(navbars);
    init(navbars);
  });
}

function initComponents() {
  navbar();
}
