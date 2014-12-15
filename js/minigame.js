var animals;

function drawAnimal(arrayAnimal) {
    arrayOutput = new Array;

    for (i = 0; i < 3; i++) {
        arrayOutput[i] = arrayAnimal[Math.round(Math.random(arrayAnimal.length))];
    }
    return arrayOutput;
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
}
);