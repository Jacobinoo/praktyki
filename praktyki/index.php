<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Inteligentny Dom</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="stylesheet.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
    </head>
    <body>
        <div class="container">
        <input type="number" class="input" id="port" placeholder="Wpisz numer portu"><br>
        <div class="buttonParent">
            <button id="on" class="button">On</button>
            <button id="off" class="button">Off</button>
        </div>
        </div>

    <!--Skrypty poniżej-->
    <script defer>
        $(document).ready(function () {
            $("#on").click(function () {
                $.ajax({
                    type: "POST",
                    url: "control.php",
                    dataType: "json",
                    data: {port: $("#port").val(),
                            action: "on"
                    }
                });
            });
            $("#off").click(function () {
                $.ajax({
                    type: "POST",
                    url: "control.php",
                    dataType: "json",
                    data: {port: $("#port").val(),
                            action: "off"
                    }
                });
            });
        });
    </script>
    </body>
</html>