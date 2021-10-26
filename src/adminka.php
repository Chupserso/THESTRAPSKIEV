<!DOCTYPE html>
<html lang="en-ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="entrance.css">
    <title>THESTRAPSKIEV</title>
</head>
<body>
    <h1>Ввойдите</h1>
    <form action="secretPanel.php" onsubmit="return entranceBtn(this)">
        <input type="password" name="password" id="password" placeholder="Пароль:">
        <input type="submit" value="Войти" id="send">
    </form>
    <h2 id="error">Не правильный пароль</h2>
    <script>
        "use strict";
        $(function(){
            $("#error").hide();
        });
        function entranceBtn(form) {
            let password = form.password.value;
            if (password != "brenda2000") {
                $(function(){
                    $("#error").show();
                });
                return false;
            }
        }
    </script>
</body>
</html>