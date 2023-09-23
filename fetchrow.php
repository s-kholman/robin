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

$query = 'SELECT * FROM classics';
$result = $pdo->query($query);

while ($row = $result->fetch(PDO::FETCH_BOTH))
{
    echo 'Author:   '   . htmlspecialchars($row['author'])      . "<br>";
    echo 'Title:   '    . htmlspecialchars($row['title'])       . "<br>";
    echo 'Category:   ' . htmlspecialchars($row['category'])    . "<br>";
    echo 'Year:   '   . htmlspecialchars($row['year'])      . "<br>";
    echo 'ISBN:   '     . htmlspecialchars($row['isbn'])        . "<br><br>";
}