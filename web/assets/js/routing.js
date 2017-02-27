function go(page, data) {
  getView(page).then(function(view) {
    $('main').html(view);
    init($('#page-' + page), data);
    initComponents();
  });
}
