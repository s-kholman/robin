<?php
require_once 'login.php';
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

/*$query = "CREATE TABLE cats (
    id SMALLINT NOT NULL AUTO_INCREMENT,
    family VARCHAR(32) NOT NULL ,
    name VARCHAR(32) NOT NULL,
    age INTEGER NOT NULL,
    PRIMARY KEY(id)
)";*/
$query = "INSERT INTO cats VALUE (NULL, 'Lynx', 'Stumpy', 5)";
$result = $pdo->query($query);
echo "ID = " . $pdo->lastInsertId();
