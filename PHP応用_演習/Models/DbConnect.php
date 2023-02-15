<?php
require_once(ROOT_PATH."database.php");

function dbConnect()
{
    try {
        $dbh = new PDO(
            'mysql:host='.DB_HOST.
            ';dbname='.DB_NAME.";charset=utf8",
            DB_USER,
            DB_PASSWD,
            [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,]
        );
    } catch (PDOException $e) {
        echo "データベース接続エラー：".$e->getMessage();
        exit();
    };
    return $dbh;
}