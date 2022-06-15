<?php
$users = "pages/users.txt";
function register($name, $pass, $email)
{
    //Валидация данных
    $name = trim(htmlspecialchars($name));
    $pass = trim(htmlspecialchars($pass));
    $email = trim(htmlspecialchars($email));

    if ($name == '' || $pass == '' || $email == '') {
        echo "<h3><span style='color: red;'>Fill All Required Fields</span></h3>";
        return false;
    }
    if (strlen($name) < 3 || strlen($name) > 30 || strlen($pass) < 3 || strlen($pass) > 30) {
        echo "<h3><span style='color: red;'>Values length must be between 3 and 30!</span></h3>";
        return false;
    }

    //Проверка логина на уникальность
    global $users;
    $file = fopen($users, 'a+');
    while ($line = fgets($file, 128)) {
        $readname = substr($line, 0, strpos($line, ':'));
        if ($readname == $name) {
            echo "<h3><span style='color: red;'>Such login is already used!</span></h3>";
            return false;
        }
    }
    //Запись данных о пользователе
    $line = $name . ':' . md5($pass) . ':' . $email . "\r\n";
    fputs($file, $line);
    fclose($file);
    return true;
}
