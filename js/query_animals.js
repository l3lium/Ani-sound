$( document ).ready(function(){
    
    $("#showmore").click(function(){
        var xhr = new XMLHttpRequest();
        var params = "next=";
        var url = 'includes/structure/content_animals.php';
        
        xhr.open("POST", url, true);
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.setRequestHeader("Content-length", params.length);
        console.debug(params.length);
        //xhr.setRequestHeader("Connection", "close");
        console.debug('dsadsa');
        xhr.send(params);
        xhr.onreadystatechange = function(event){
            if (xhr.readyState === 4){
                $("#animal-container").append(event.target.responseText);
                console.debug('dsadssadsadsadsaa');
            }  
        };
    });
});