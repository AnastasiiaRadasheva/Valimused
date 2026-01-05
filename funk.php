<?php
function lisapunkt($id)
{
    global $connect;
    $paring = $connect->prepare("update valimused set punktid=punktid+1 where id=?");
    $paring->bind_param('i', $_REQUEST['lisa1punktid']);
    $paring->execute();
    header("Location:" . $_SERVER['PHP_SELF']);//aadresiriba puhasta päring ja jääb failinimi
}
function naitatabel($id){

    global $connect;
    $paring=$connect->prepare("
Select id, president, pilt, punktid, lisamisaeg  from valimused where avalik=1");
    $paring->bind_result($id, $president, $pilt, $punktid, $lisamisaeg);
    $paring->execute();
    while($paring->fetch()){
        echo "<tr>";
        echo "<td>{$president}</td>";
        echo "<td>{$punktid}</td>";
        echo "<td><a href='?lisa1punktid={$id}'> +1 punkt</a></td>";
        echo "<td><a href='?kustuta1punktid=$id'> -1 punkt</a></td>";
        echo "</tr>";
}