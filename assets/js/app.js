(function() {
  'use strict';

  $(document).ready(function() {
    $("#input-bar").keyup(function()
    {
      $.ajax( 
          {
            dataType: "json",
            type: "POST",
            url: "api/suggestions.php",
            data: { 
              "object" :  $("#input-bar").val()
            },
            success: function(data){
                var products = [];
                for(var key in data) {
                    var value = data[key].product_name;
                    products.push(value);
                }
                console.log(products);
              $("#input-bar").autocomplete({

                /* Max 10 items will be displayed */
                source : function(request, response) {
                  var results = $.ui.autocomplete.filter(products, request.term);
                  response(results.slice(0, 10));
                }
              });
            }
      });
    });
    $('.search-bar').on('submit', function(e) {
      e.preventDefault();
      if($("#input-bar").val() !== "")
      {
        $.getJSON('/api/result.php', $(this).serialize()).then(function(data) {
          $('section').hide();
          $('#response-page')
            .attr('class', '')
            .addClass('response-page');

          if (data.found) {
            $('#found-bin').text(data.binName);
            $('#found-img')
              .attr('alt', 'Ricicla come ' + data.binName)
              .attr('src', '/assets/images/bin-' + data.bin + '.png');
            $('#section-found').show();
            $('#response-page')
              .addClass('bin-'+data.bin);
          } else {
            $('#product-searched').text(data.product_searched);
            $('#product-name').val(data.product_searched);
            $('#section-not-found').show();
          }
        });
      }
    });
  });

})();
