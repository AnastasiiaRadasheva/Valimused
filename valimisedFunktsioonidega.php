<?php
require ('funk.php');
if(isset($_REQUEST['lisa1punktid'])) {
    lisa1punktid($_REQUEST['lisa1punktid']);

    header("Location:" . $_SERVER['PHP_SELF']);//aadresiriba puhasta päring ja jääb failinimi
    exit();
}

if(!empty($_REQUEST['lisapresident'])) {
    lisapresident($_REQUEST['lisapresident'], $_REQUEST['pilt'], $_REQUEST['punktid']);
    header("Location:" . $_SERVER['PHP_SELF']);
    exit();
}
if(isset($_REQUEST['delete'])) {
    header("Location:" . $_SERVER['PHP_SELF']);
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Tabel Valimised Funktsioonidega</title>
</head>
<body>
<h1>
    tabel valimised kirjutatud funktsoonide abil
</h1>
<table>
    <tr>
        <th>Nimi</th>
        <th>Punktid</th>
        <th>+1 punkt</th>
    </tr>
    <?php
    //funktsioon is näitab tabeli asub funktsioonid.php failis
    naitatabel();
    ?>
</table>
<h2>Lisa oma presidendi</h2>
<form action="">
    <label for="presidentNimi">President nimi:</label>
    <input type="text" name="presidentNimi" id="presidentNimi">
    <br>
    <label for="pilt">Pilt:</label>
    <textarea name="pilt" id="pilt" ></textarea>
    <br>
    <label for="punktid">punktid:</label>
    <input type="text" name="punktid" id="punktid">
    <br>
    <input type="submit" value="Lisa">
</form>
</body>
</html>
