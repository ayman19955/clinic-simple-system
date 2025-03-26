$(document).ready(function() {
    $('#searchInput').on('input', function() {
        let query = $(this).val();

        $.ajax({
            url: url ,
            type: "GET",
            data: {
                search: query
            },
            success: function(response) {

                $('#tableBody').html(response);
            }
        });
    });
});
