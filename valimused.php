<?php if(isset($_GET['code'])) {die(highlight_file(__FILE__, 1));}?>
<?php
require ('conf.php');
//+1 punkt
global $connect;
if(isset($_REQUEST['lisa1punktid'])) {
    $paring = $connect->prepare("update valimused set punktid=punktid+1 where id=?");
    $paring->bind_param('i', $_REQUEST['lisa1punktid']);
    $paring->execute();
    header("Location:" . $_SERVER['PHP_SELF']);//aadresiriba puhasta päring ja jääb failinimi
}
if(isset($_REQUEST['kustuta1punktid'])) {
    $paring = $connect->prepare("update valimused set punktid=punktid-1 where id=?");
    $paring->bind_param('i', $_REQUEST['kustuta1punktid']);
    $paring->execute();
    header("Location:" . $_SERVER['PHP_SELF']);
}

if(isset($_REQUEST['presidentNimi']) && !empty($_REQUEST['presidentNimi'])) {
    $paring = $connect->prepare("
INSERT INTO valimused (president, pilt, lisamisaeg) VALUES (?, ?, NOW())");
    $paring->bind_param('ss', $_REQUEST['presidentNimi'], $_REQUEST['pilt']);
    $paring->execute();
    header("Location:" . $_SERVER['PHP_SELF']);
    $connect->close();
}

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
        <th>+1 punkt</th>
        <th>-1 punkt</th>
        <?php
        global $connect;
        $paring=$connect->prepare("
Select id, president, pilt, punktid, lisamisaeg  from valimused where avalik=1");
        $paring->bind_result($id, $president, $pilt, $punktid, $lisamisaeg);
        $paring->execute();
        while($paring->fetch()){
            echo "<tr>";
            echo "<td>".$president."</td>";
            echo "<td><img src=\"$pilt\" alt=\"piltuu\"></td>";
            echo "<td>".$punktid."</td>";
            echo "<td>".$lisamisaeg."</td>";
            echo "<td><a href='?lisa1punktid=$id'> +1 punkt</a></td>";
            echo "<td><a href='?kustuta1punktid=$id'> -1 punkt</a></td>";
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
    <input type="submit" value="Lisa">
</form>
</body>
</html>