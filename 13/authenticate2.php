<?php
require_once '../login.php';
/**
 * @var $attr
 * @var $root
 * @var $pass
 * @var $opts
 */
try {
    $pdo = new PDO($attr, $root, $pass, $opts);
}
catch (PDOException $e)
{
    throw new PDOException($e->getMessage(), (int)$e->getCode());
}

if(isset($_SERVER['PHP_AUTH_USER']) && isset($_SERVER['PHP_AUTH_PW'])) {
    $un_temp = sanitize($pdo, $_SERVER['PHP_AUTH_USER']);
    $pw_temp = sanitize($pdo, $_SERVER['PHP_AUTH_PW']);
    $query = "SELECT * from users WHERE username=$un_temp";
    $result = $pdo->query($query);
    if (!$result->rowCount()) {
        die("User not fount");
    }

    $row = $result->fetch();
    $fn = $row['forename'];
    $sn = $row['surname'];
    $un = $row['username'];
    $pw = $row['password'];

    if(password_verify(str_replace("'","",$pw_temp), $pw))
    {
        session_start();
        $_SESSION['forename'] = $fn;
        $_SESSION['surname'] = $sn;
        echo htmlspecialchars("$fn $sn : Hi $fn, you are now logged in as '$un'");
        die("<p><a href='continue.php'>Щелкните здесь для продолжения</a></p>");
    }

    else die("Неверная комбинация имя пользователя - пароль");
} else {
    header('WWW-Authenticate: Basic realm="Restricted Area"' );
    header('HTTP/1.0 401 Unauthorized');
    die("Пожалуйста, введите имя пользователя и пароль");
}

function sanitize($pdo, $var)
{
    $var = htmlentities($var);
    return $pdo->quote($var);
}