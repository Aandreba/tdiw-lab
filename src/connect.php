<?php

// Cloud
// $host = "deic-docencia.uab.cat";
$host = "localhost";
$user = "tdiw-j7";
$database = "tdiw-j7";
$password = "tq6fSALU";
$port = 5432;

// Docker Compose
// $host = "postgres";
// $user = "myuser";
// $database = "mydb";
// $password = "mypassword";
// $port = 5432;

$conn = pg_connect("host=$host user=$user password=$password dbname=$database port=$port connect_timeout=5");
unset($host, $user, $database, $password, $port);

function getConnection(): PgSql\Connection {
    global $conn;
    return $conn;
}
