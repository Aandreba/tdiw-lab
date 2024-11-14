<?php

function getDatabaseConnection(): PgSql\Connection|null {
    $HOST = "deic-docencia.uab.cat";
    $USER = "tidw-j7";
    $DATABASE = "tidw-j7";
    $PASSWORD = $_ENV['POSTGRES_PASSWORD'];
    return pg_connect("host=$HOST user=$USER password=$PASSWORD dbname=$DATABASE") ?? null;
}

?>

