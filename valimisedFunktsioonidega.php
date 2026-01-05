<?php
require ('funk.php');
if(isset($_REQUEST['lisa1punktid'])) {
    lisa1punktid($_REQUEST['lisa1punktid']);

    header("Location:" . $_SERVER['PHP_SELF']);//aadresiriba puhasta päring ja jääb failinimi
    exit();
}
if(isset($_REQUEST['kustuta1punktid'])) {
    kustuta1punktid($_REQUEST['kustuta1punktid']);
    header("Location:" . $_SERVER['PHP_SELF']);//aadresiriba puhasta päring ja jääb failinimi
    exit(); 
}
if (isset($_REQUEST['presidentNimi'])) {
    lisaPresident($_REQUEST['presidentNimi'], $_REQUEST['pilt']);
    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}

if (isset($_REQUEST['kusututaPresident'])) {
    kusututaPresident($_REQUEST['kusututaPresident']);
    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
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

<h1>Tabel valimised (funktsioonidega)</h1>


<table>
    <tr>
        <th>Nimi</th>
        <th>Punktid</th>
        <th>+1 punkt</th>
        <th>-1 punkt</th>
        <th>Kustuta president</th>
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
