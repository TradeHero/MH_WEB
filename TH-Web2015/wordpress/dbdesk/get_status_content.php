<?php

sleep(10);

phpinfo();

// Server in diesem Format: <computer>\<instance name> oder
// <server>,<port>, falls nicht der Standardport verwendet wird
$server = 'thvm-dev1.cloudapp.net,888';

// Mit MSSQL verbinden
$verbindung = mssql_connect($server, 'tradehero_sa', 'sa90070104th');

if (!$verbindung) {
    die('Beim Aufbau der Verbindung mit MSSQL ging etwas schief');
}
?>