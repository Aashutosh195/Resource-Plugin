jQuery(document).ready(function($) {
    $('#filter').submit(function(e) {
        e.preventDefault();

        var filter = $('#filter');
        
        $.ajax({
            url: filter.attr('action'),
            data: filter.serialize(), 
            type: filter.attr('method'),
            beforeSend: function(xhr) {
                filter.find('button').text('Processing...'); 
            },
            success: function(data) {
                filter.find('button').text('Apply filter'); 
                $('#response').html(data);
            }
        });
    });
});
