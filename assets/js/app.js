(function() {
  'use strict';

  // Control for empty input in the search bar.
  var searchBar = document.querySelector(".search-bar");
  var input = document.querySelector(".search-bar input[type='text']");

  searchBar.addEventListener("submit", function (e) {
    if (input.value === "") {
      e.preventDefault();
      input.className = "warning";
    }
  });

  // Remove the effect when user types into the search bar
  input.addEventListener("input", function() {
    if (input.className == "warning") {
      input.className = "";
    }
  });

  $(document).ready(function() {
    $.getJSON('/api/suggestions.php').then(function(data) {
      $(input).autocomplete({
        source: Object.keys(data)
      });
    });

    $('.search-bar').on('submit', function(e) {
      e.preventDefault();
      $.getJSON('/api/result.php', $(this).serialize()).then(function(data) {
        $('section').hide();

        if (data.found) {
          $('#found-bin').text(data.binName);
          $('#found-img')
            .attr('alt', 'Ricicla come ' + data.binName)
            .attr('src', '/assets/images/bin-' + data.bin + '.png');
          $('#section-found').show();
          $('#response-page')
            .attr('class', '')
            .addClass('response-page')
            .addClass(data.bin);
        } else {
          $('#section-not-found').show();
        }
      });
    });
  });

})();
