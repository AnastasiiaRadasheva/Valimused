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
function kustuta1punktid($id)
{
    global $connect;
    $paring = $connect->prepare("update valimused set punktid=punktid-1 where id=?");
    $paring->bind_param('i', $id);
    $paring->execute();
    $paring->close();
}

function naitatabel(){
    global $connect;

    $paring = $connect->prepare("
        SELECT id, president, pilt, punktid, lisamisaeg, avalik
        FROM valimused
        WHERE avalik = 1 or avalik = 0
    ");
    $paring->execute();
    $paring->bind_result($id, $president, $pilt, $punktid, $lisamisaeg, $avalik);
    while ($paring->fetch()) {
        echo "<tr>";
        echo "<td>{$president}</td>";
        echo "<td>{$punktid}</td>";
        echo "<td>{$pilt}</td>";
        echo "<td><a href='?lisa1punktid={$id}'>+1 punkt</a></td>";
        echo "<td><a href='?kustuta1punktid={$id}'>-1 punkt</a></td>";
        echo "<td><a href='?kusututaPresident={$id}'>Kustuta president</a></td>";

        $tekst="näita";
        $seisund="naita";
        $tekstLehel="peidatud";
        if ($avalik==1) {
            $tekst = 'peida';
            $seisund = 'peida';
            $tekstLehel = 'näidatud';
        }
        echo "<td><a href='?$seisund=$id'>$tekst</a></td>";
        echo "<td>$tekstLehel</td>";
        echo "</tr>";
    }

    $paring->close();
}
//uue presidenti lisamine INSERT
function lisaPresident($presidentNimi, $pilt)
{
    global $connect;
    $paring = $connect->prepare(
        "INSERT INTO valimused (president, pilt, punktid, lisamisaeg) VALUES (?, ?, 0, NOW())"
    );
    $paring->bind_param("ss", $presidentNimi, $pilt);
    $paring->execute();
}

function kusututaPresident($id)
{
    global $connect;
    $paring = $connect->prepare(
        "Delete from valimused where id=?"
    );
    $paring->bind_param("i", $id);
    $paring->execute();
}

function naita($id)
{
    global $connect;
    $paring = $connect->prepare("update valimused set avalik=1 where id=?");
    $paring->bind_param('i', $_REQUEST['naita']);
    $paring->execute();
}
function peida($id)
{
    global $connect;
    $paring = $connect->prepare("update valimused set avalik=0 where id=?");
    $paring->bind_param('i', $_REQUEST['peida']);
    $paring->execute();
}



