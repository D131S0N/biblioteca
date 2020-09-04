<?php
include 'conecta.php';

function getAll($sql)
{
    $db = conecta();
    return $db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
}
