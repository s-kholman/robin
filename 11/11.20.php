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

$user = mysql_entities_fix_string($pdo, $_POST['user']);
$pass = mysql_entities_fix_string($pdo, $_POST['pass']);
$query = "SELECT * FROM users WHERE user='$user' AND pass='$pass'";

function mysql_entities_fix_string($pdo, $string)
{
    return htmlentities((mysql_fix_string($pdo, $string)));
}

    function mysql_fix_string ($pdo, $string)
    {
        if (get_magic_quotes_gpc())

        {
            $string = stripcslashes($string);
        }
        return $pdo->quote($string);
    }