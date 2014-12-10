var animals;

function drawAnimal(){
    
}

$(document).ready(function () {
    $("#startGame").click(function () {

        var xhr = new XMLHttpRequest();
        var url = $(this).attr('data-url');
        var params = "next=";
        alert(url);
        xhr.open("POST", url, true);
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        //xhr.setRequestHeader("Content-length", params.length);
        //xhr.setRequestHeader("Connection", "close");
        xhr.send(params);
        xhr.onreadystatechange = function (event) {
            if (xhr.readyState === 4) {
                alert("done")
                animals = JSON.parse(event.target.responseText);
                console.log(animals);
                
            }
        };
    });
});