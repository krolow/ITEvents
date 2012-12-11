$(document).ready(function () {

    $('.komplete').typeahead({
        source : function (query, process) {

            var multiple = $(this)[0].$element[0].dataset.multiple;

            if (multiple) {
                query = $.trim(query.split(',').pop());
            }

            $.getJSON(
                $(this)[0].$element[0].dataset.link, 
                {search : query},
                function (data) {
                    process(data.options);
                }
            );
        },
        updater : function (item) {
            var field = $($(this)[0].$element[0]);
            var previous_items = field.val();
            var terms = previous_items.split(',');
            terms.pop();
            terms.push(item);
            $.each(terms, function(idx, val) { terms[idx] = $.trim(val); });

            return terms.join(', ');            
        },
        matcher: function() { return true; },
        autoselect: false,

        highlighter : function (item) {
            var terms = this.query.split(',');
            var query = $.trim(terms.pop(-1))
            return item.replace(new RegExp('(' + query + ')', 'ig'), function ($1, match) {
                return '<strong>' + match + '</strong>'
            });
        }
    });

});