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
  });

})();
