function navbar() {
  getView('navbar').then(function(view) {
    var template = init(view);
    var navbars = $('ps-navbar');
    navbars = template.replaceAll(navbars);
  });
}

function initComponents() {
  navbar();
}
