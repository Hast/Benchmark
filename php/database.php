<?php

$start = microtime(true);

$connection = new PDO('mysql:host=localhost;dbname=benchmark', 'root', 'password');
$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$createTableQuery = 'CREATE TABLE `test` (`id` int(11) NOT NULL, `value` int(11) NOT NULL, PRIMARY KEY (`id`)) ENGINE=InnoDB';
$connection->exec($createTableQuery);

$statement = $connection->prepare('INSERT INTO `test` (`id`, `value`) VALUES (:id, :value)');
for ($i = 1; $i <= 100; $i++) {
    $statement->execute([':id' => $i, ':value' => $i * 100]);
}

$statement = $connection->prepare('SELECT * FROM `test` WHERE `id` = :id');
for ($j = 1; $j <= 10; $j++) {
    for ($i = 1; $i <= 100; $i++) {
        $statement->execute([':id' => $i]);
        $result = $statement->fetch();
    }
}

$statement = $connection->prepare('UPDATE `test` set `value`= :value WHERE `id` = :id');
for ($i = 1; $i <= 100; $i++) {
    $statement->execute([':id' => $i, ':value' => $i * 100 + 1]);
}

$statement = $connection->prepare('DELETE FROM `test` WHERE `id` = :id');
for ($j = 1; $j <= 10; $j++) {
    for ($i = 1; $i <= 100; $i++) {
        $statement->execute([':id' => $i]);
    }
}

$dropTableQuery = 'DROP TABLE `test`;';
$connection->exec($dropTableQuery);

$end = microtime(true);
printf('%f sec.', $end - $start);