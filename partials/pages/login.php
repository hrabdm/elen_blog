<?php
/*
1, при реєстрації шифруємо пароль
2, при логіні пароль який ввів користувач потрібно перевірити

1. Отримати пароль користувача
2. Отримати  користувача по логіну
3. перевірити чи паролі співпадають
*/


if (isset($_POST["submit"])) {
    $login = $_POST['login'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE `username` = '$login'";

    $result = $conn->query($sql);

    $user = $result->fetch_assoc();

    if (password_verify($password, $user['pass'])) {
        setcookie("user", $user['id'], time() + 3600 * 24, "/");
    } else {
        echo "Дані введено не вірно";
    }
}
?>
<form action="" method="post">
    <p> Login: <br>
        <input type="text" name="login" id="">
    </p>
    <p> Password: <br>
        <input type="password" name="password" id="">
    </p>
    <p>
        <input type="submit" name="submit" value="Login" id="">
    </p>
</form>