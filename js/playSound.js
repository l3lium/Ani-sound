$(document).ready(function() {
    AddClickEvent()      
});

function AddClickEvent(){
    $('.img-animal').click(function(){
        $(this).parent().children('audio').trigger("play");
    });    
}