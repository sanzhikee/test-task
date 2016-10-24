/**
 * Created by sanzhar on 24.10.16.
 */
$(document).ready(function(){
    $('#main_button').on('click', function(){
        $.ajax({
            url: full_url,
            method: "POST",
            data: { full_url : full_url },
        }).success(function(data) {
            $('.result').html('<p><a href="'+data.res+'" target="_blank">'+data.res+'</a></p>');
        });
    });
});