<?php

// Cloud
$host ??= "deic-docencia.uab.cat";
$user ??= "tidw-j7";
$database ??= "tidw-j7";
$password ??= "tq6fSALU";
$port = 5432;

// Docker Compose
// $host = "postgres";
// $user = "myuser";
// $database = "mydb";
// $password = "mypassword";
// $port = 5432;

$conn = pg_connect("host=$host user=$user password=$password dbname=$database port=$port");
unset($host, $user, $database, $password, $port);
if (!$conn) throw new Exception("Failed to connect to database");

function getConnection(): PgSql\Connection
{
    global $conn;
    return $conn;
}
