$(document).ready(function () {
    $("#light1").click(function () {
        if($(this).attr("data-status") == "off") {
            $.ajax({
                type: "POST",
                url: "control.php",
                dataType: "json",
                data: {port: "17",
                        action: "on"
                }
            });
        }
        if($(this).attr("data-status") == "on") {
            $.ajax({
                type: "POST",
                url: "control.php",
                dataType: "json",
                data: {port: "17",
                        action: "off"
                }
            });
        }
        if($(this).attr("data-status") == "off") {
            $("#light1").attr("data-status", "on");
            $('#light1 #status').text("Wł.");
            $('#light1 #icon').css("color", "rgb(235, 181, 3)")
        } else {
            $("#light1").attr("data-status", "off");
            $('#light1 #status').text("Wył.");
            $('#light1 #icon').css("color", "rgb(170, 170, 170)")
        }
    });
    $("#light2").click(function () {
        if($(this).attr("data-status") == "off") {
            $.ajax({
                type: "POST",
                url: "control.php",
                dataType: "json",
                data: {port: "14",
                        action: "on"
                }
            });
        }
        if($(this).attr("data-status") == "on") {
            $.ajax({
                type: "POST",
                url: "control.php",
                dataType: "json",
                data: {port: "14",
                        action: "off"
                }
            });
        }
        if($(this).attr("data-status") == "off") {
            $("#light2").attr("data-status", "on");
            $('#light2 #status').text("Wł.");
            $('#light2 #icon').css("color", "rgb(235, 181, 3)")
        } else {
            $("#light2").attr("data-status", "off");
            $('#light2 #status').text("Wył.");
            $('#light2 #icon').css("color", "rgb(170, 170, 170)")
        }
    });
    $("#cam1").click(function () {
        if($(this).attr("data-status") == "off") {
            $("#cam1").attr("data-status", "on");
            $("#cam1 #status, #cam1 #icon, #cam1 #status, #cam1 #name").hide();
            $("#cam1").toggleClass("animate");
            $("#cam1").append(`
            <img id='cam1_video' src='http://192.168.111.5:5000/video_feed'>`);
        } else {
            $("#cam1").attr("data-status", "off");
            $("#cam1").removeClass("animate");
            $('#cam1_video').fadeOut().remove();
            $("#cam1 #status, #cam1 #icon, #cam1 #status, #cam1 #name").show();
        }
    });
});