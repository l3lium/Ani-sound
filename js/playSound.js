$(document).ready(function() {
    $('.img-animal').click(function(){
        $(this).parent().children('audio').trigger("play");
    });       
});