<?php
require_once 'eitanois.php';

$db = DatabaseConnection::getInstance();
$db->connect();
$result = $db->query("SELECT * FROM usuarios");

foreach ($result as $row) {
    echo $row["nome"] . "\n";
}
  