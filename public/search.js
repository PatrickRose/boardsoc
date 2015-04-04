$(document).ready(function()
{
    $('.search-form .submit').on('click', function() {
            var searchTerm = $('.search-form .search').val();
            var that = this;
            $(this).button('loading');
            jQuery.getJSON(
                $(this).data('url') + '/' + searchTerm,
                null,
                function(data)
                {
                    var string = '';

                    for(var i=0; i < data.length; i++)
                    {
                        var name = data[i].name,
                            id = data[i].id;

                        string +=
                            '<p>' +
                            '<span class="boardgame" data-id="' + id + '">'
                            + name +
                            '</span>' +
                            '</p>';
                    }

                    $('.search-form .results').html('<div class="search-results"><div class="alert alert-info">' +
                    'Click the game to copy the id' +
                    '</div>' + string + '</div>');
                    $(that).button('reset');

                    $('.search-form .results .boardgame').each(function()
                    {
                        $(this).click(function()
                        {
                            var id = $(this).data('id');

                            $('#board_game_geek_game_id').val(id);
                        });
                    });
                }
            );
        }
    )
});