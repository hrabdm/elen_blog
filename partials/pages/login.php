<?php
if (isset($_POST["submit"])) {
    $sql =
        'SELECT * 
    FROM users 
    WHERE username="' . $_POST['login'] . '
    " AND pass="' . $_POST['password'] . '"';

    $result = $conn->query($sql);
    $user = $result->fetch_assoc();
    setcookie("user", $user['id'], time() + 3600 * 24, "/");
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