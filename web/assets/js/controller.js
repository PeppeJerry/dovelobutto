function handleProduct(product) {
  if (product.bin) {
    go('found', {
      productName: product.name,
      binId: product.bin.id,
      binName: product.bin.name,
    });
  } else {
    go('not-found', {
      productName: product.name,
    });
  }
}

function init($page, data) {
  if (!data) data = {};

  $page.find('.js--bin-name').text(data.binName);
  $page.find('.js--product-name').text(data.productName);
  $page.find('.js--email').text(data.email);
  $page.find('.js--bin-image').attr('src', '/assets/images/bin-' + data.binId + '.png');
  $page.find('.js--bin-container')
    .attr('class', $page.find('.js--bin-container').data('class'))
    .addClass('bin--' + data.binId);

  $page.find('.js--go').off('click').on('click', function() {
    var route = $(this).data('route');
    var data = $(this).data('data') || '{}';
    go(route, JSON.parse(data));
  });

  $page.find('.js--search-form')
    .off('submit')
    .on('submit', function(e) {
      e.preventDefault();

      var productName = this.name.value;
      searchOne(productName).then(function(product) {
        handleProduct(product);
      });
    });

  $page.find('.js--email-form')
    .off('submit')
    .on('submit', function(e) {
      e.preventDefault();

      var name = data.productName;
      var email = this.email.value;
      saveProduct(name, email).then(function() {
        go('email', {
          email: email,
          productName: name,
        });
      });
    });

  $page.find('.js--autocomplete').autocomplete({
    source: function(request, response) {
      search(request.term).then(function(data) {
        for (var i = 0; i < data.length; i++) {
          data[i].label = data[i].name;
        }
        response(data);
      });
    },
    select: function(e, ui) {
      handleProduct(ui.item);
    },
  });
}
