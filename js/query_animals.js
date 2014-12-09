$(document).ready(function() {

    $("#showmore").click(function() {
        var xhr = new XMLHttpRequest();
        var params = "next=";
        var url = $(this).attr('data-url');

        xhr.open("POST", url, true);
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        //xhr.setRequestHeader("Content-length", params.length);
        //xhr.setRequestHeader("Connection", "close");
        xhr.send(params);
        xhr.onreadystatechange = function(event) {
            if (xhr.readyState === 4) {
                $("#animal-container").append(event.target.responseText);
                AddClickEvent();
            }
        };
    });

    /*$("input[name='soundUpload']").change(function() {
        console.debug('dada');
        var xhr = new XMLHttpRequest();

        var fd = new FormData();
        var url = 'uploadSound.php';
        xhr.open("POST", url, true);
        xhr.setRequestHeader("Content-Type", "multipart/form-data");
        console.debug($(this).attr("name"), $(this).prop('files')[0], $(this).val());
        var myfiles = $(this).val();
        console.debug(myfiles);
        for (i = 0; i < myfiles.length; i++) {
            fd.append($(this).attr("name"), myfiles[i]);
        }
        console.debug(myfiles[0]);
        //fd.append($(this).attr("name"), $(this).prop('files')[0], $(this).val());
        xhr.send(fd);

        xhr.onreadystatechange = function(event) {
            if (xhr.readyState === 4) {
                console.debug(event.target.responseText);
            }
        };

    });*/
});