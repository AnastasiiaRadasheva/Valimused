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
        WHERE avalik = 1 or avalik = 0
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
//uue presidenti lisamine INSERT
function lisapresident($president, $pilt, $punktid){
    global $connect;
    $paring = $connect->prepare("
INSERT INTO valimused (president, pilt, punktid, lisamisaeg) VALUES (?, ?,?,  NOW())");
    $paring->bind_param('ssi', $president, $pilt, $punktid );
    $paring->close();

}

function deletepresident($president, $pilt, $punktid){
    global $connect;
    $paring = $connect->prepare("DELETE FROM valimused WHERE id=?");
    $paring->bind_param('i', $_REQUEST['delete']);
    $paring->execute();
    header("Location:" . $_SERVER['PHP_SELF']);
    $connect->close();
}
