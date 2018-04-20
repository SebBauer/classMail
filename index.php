<?php
    require 'config/config.inc.php';
?>


<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>JS</title>
</head>

<body>

    <?php

        if(isset($_POST['submit'])) {

            $mail = new Mail($_POST['subject'], $_POST['text'], $_POST['mail']);

            if($mail->getStatus()) {
                echo 'Wysłano mail';
            }

            else {
                echo 'Wystąpi błąd';
            }
        }

    ?>
  
    <form action="" method="post">

        <p>Adres e-mail<br>
        <input id="mail" type="text" name="mail" class="input_form">
        </p>

        <p>Temat<br>
        <input id="subject" type="text" name="subject" class="input_form">
        </p>

        <p>Wiadomość<br>
        <textarea name="text" id="text" cols="30" rows="8" class="textarea_form"></textarea></p>

        <input name="submit" type="submit" value="Wyślij" class="submit_form">


    </form>
    
</body>
</html>
