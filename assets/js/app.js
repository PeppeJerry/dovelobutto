(function() {
    'use strict';

    $(document).ready(function() {
        $("#input-bar").autocomplete({
            minLength: 2,
            source: function(request, response) {
                var cache = [],
                    term = request.term;

                if (term in cache) {
                    response(cache[term]);
                    return;
                }

                $.getJSON('api/suggestions.php', request, function(data) {
                    cache[term] = data;
                    response(data);
                });
            },
            response: function(event, ui) {
                $('section').hide();
                $('#response-page')
                    .attr('class', '')
                    .addClass('response-page');

                if (ui.content.length === 0) {
                    $('#product-searched').text($("#input-bar").val());
                    $('#product-name').val($("#input-bar").val());
                    $('#section-not-found').show();
                }
            },
            select: function(event, ui) {
                history.pushState('', '', '/?object='+ ui.item.label);
                $('section').hide();
                $('#response-page')
                    .attr('class', '')
                    .addClass('response-page');

                $('#found-bin').text(ui.item.bin_name);
                $('#found-img')
                    .attr('alt', 'Ricicla come ' + ui.item.bin_name)
                    .attr('src', '/assets/images/bin-' + ui.item.bin_id + '.png');

                $('#section-found').show();
                $('#response-page').addClass('bin-'+ui.item.bin_id);
            }
        });

        $('.search-bar').on('submit', function(e) {
            e.preventDefault();
        });
    });
})();
