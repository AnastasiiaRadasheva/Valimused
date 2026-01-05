<?php
require ('conf.php');
function lisa1punktid($id)
{
    global $connect;
    $paring = $connect->prepare("update valimused set punktid=punktid+1 where id=?");
    $paring->bind_param('i', $id);
    $paring->execute();
    $paring->close();
}

function naitatabel(){
    global $connect;

    $paring = $connect->prepare("
        SELECT id, president, pilt, punktid, lisamisaeg
        FROM valimused
        WHERE avalik = 1
    ");
    $paring->execute();
    $paring->bind_result($id, $president, $pilt, $punktid, $lisamisaeg);
    while ($paring->fetch()) {
        echo "<tr>";
        echo "<td>{$president}</td>";
        echo "<td>{$punktid}</td>";
        echo "<td><a href='?lisa1punktid={$id}'>+1 punkt</a></td>";
        echo "</tr>";
    }

    $paring->close();
}
