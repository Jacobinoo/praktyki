<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Logowanie</title>
        
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="stylesheet.css">
    </head>
    <body>
        <form method="post" action="login.php">
            <label for="login">Login:</label>
            <input type="text" id="login" name="username"/><br /><br />
            <label for="haslo">Hasło:</label>
            <input type="password" name="password" id="haslo"/><br /><br />
            <input type="submit"/>
            
        </form>
    </body>
</html>