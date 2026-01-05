<?php
require ('conf.php');
//+1 punkt
global $connect;

if(isset($_REQUEST['presidentNimi']) && !empty($_REQUEST['presidentNimi'])) {
    $paring = $connect->prepare("
INSERT INTO valimused (president, pilt, avalik, lisamisaeg) VALUES (?, ?, ?, NOW())");
    $paring->bind_param('ssi', $_REQUEST['presidentNimi'], $_REQUEST['pilt'], $_REQUEST['avalik']);
    $paring->execute();
    header("Location:" . $_SERVER['PHP_SELF']);
    $connect->close();
}
if(isset($_REQUEST['naita'])) {
    $paring = $connect->prepare("update valimused set avalik=1 where id=?");
    $paring->bind_param('i', $_REQUEST['naita']);
    $paring->execute();
    header("Location:" . $_SERVER['PHP_SELF']);
    $connect->close();
}
if(isset($_REQUEST['peida'])) {
    $paring = $connect->prepare("update valimused set avalik=0 where id=?");
    $paring->bind_param('i', $_REQUEST['peida']);
    $paring->execute();
    header("Location:" . $_SERVER['PHP_SELF']);
    $connect->close();
}
if(isset($_REQUEST['delete'])) {
    $paring = $connect->prepare("DELETE FROM valimused WHERE id=?");
    $paring->bind_param('i', $_REQUEST['delete']);
    $paring->execute();
    header("Location:" . $_SERVER['PHP_SELF']);
    $connect->close();
}
if(isset($_REQUEST['punkt0'])) {
    $paring = $connect->prepare("update valimused set punktid=0 where id=?");
    $paring->bind_param('i', $_REQUEST['punkt0']);
    $paring->execute();
    header("Location:" . $_SERVER['PHP_SELF']);
    $connect->close();
}

/*ADMIN
1.delete presedenti ++++
2. punktid nulliks+++
3.ei saa +1/-1 punkt ++++
4. admin kohe saab lisada avalikuse staatus +++
 */
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Valimiste leht</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<h1>TARpv24 presidendi alimised</h1>
<nav>
    <ul>
        <li>
            <a href="valimused.php">Kasutaja leht</a>
        </li>
        <li>
            <a href="valimusedAdmin.php">Admin leht</a>
        </li>
    </ul>
</nav>
<table>
    <tr>
        <th>Nimi</th>
        <th>Pilt</th>
        <th>Punktid</th>
        <th>Lisamisaeg</th>
        <th>Kustuta</th>
        <th>Punktid nulliks</th>

        <th>Haldus </th>
        <th>Staatus </th>

        <?php
        global $connect;
        $paring=$connect->prepare("
Select id, president, pilt, punktid, lisamisaeg, avalik  from valimused ");
        $paring->bind_result($id, $president, $pilt, $punktid, $lisamisaeg, $avalik);
        $paring->execute();
        while($paring->fetch()){
            echo "<tr>";
            echo "<td>".$president."</td>";
            echo "<td><img src=\"$pilt\" alt=\"piltuu\"></td>";
            echo "<td>".$punktid."</td>";
            echo "<td>".$lisamisaeg."</td>";

            $tekst="näita";
            $seisund="naita";
            $tekstLehel="peidatud";
            if ($avalik==1) {
                $tekst = 'peida';
                $seisund = 'peida';
                $tekstLehel = 'näidatud';
            }
            echo "<td><a href='?punkt0=$id'>Punktid nulliks</a></td>";

            echo "<td><a href='?delete=$id'>Kustuta presidenti</a></td>";
            echo "<td><a href='?$seisund=$id'>$tekst</a></td>";
            echo "<td>$tekstLehel</td>";
            echo "</tr>";

        }
        ?>

    </tr>
</table>
<h2>Lisa oma presidendi</h2>
<form action="">
    <label for="presidentNimi">President nimi:</label>
    <input type="text" name="presidentNimi" id="presidentNimi">
    <br>
    <label for="pilt">Pilt:</label>
    <textarea name="pilt" id="pilt" ></textarea>
    <br>



    <label for="avalik">Staatus:</label><br>
    <select name="avalik" id="avalik" required>
        <option value="1">Avalik</option>
        <option value="0">Peidetud</option></select>
    <br>
    <input type="submit" value="Lisa">
</form>
</body>
</html>