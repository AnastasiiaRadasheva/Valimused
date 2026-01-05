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
if(isset($_REQUEST['naita'])) {
    naita($_REQUEST['naita']);
    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}
if(isset($_REQUEST['peida'])) {
    peida($_REQUEST['peida']);
    header("Location: " . $_SERVER['PHP_SELF']);
    exit;

}
if(isset($_REQUEST['punkt0'])) {
    punkt0($_REQUEST['peida']);
    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}
if (isset($_REQUEST['uus_kommentaar']) && isset($_REQUEST['uue_komment_id'])) {
    uuskommentaar($_REQUEST['uus_kommentaar'], $_REQUEST['uue_komment_id']);
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

<h1>Tabel valimised (funktsioonidega)</h1>


<table>
    <tr>
        <th>Nimi</th>
        <th>Punktid</th>
        <th>Pilt</th>
        <th>+1 punkt</th>
        <th>-1 punkt</th>
        <th>Kommentaarid</th>
        <th>Lisa kommentaar</th>
        <th>Kustuta president</th>
        <th>Punktid nulliks</th>
        <th>Haldus </th>
        <th>Staatus </th>
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

    <label for="avalik">Staatus:</label><br>
    <select name="avalik" id="avalik" required>
        <option value="1">Avalik</option>
        <option value="0">Peidetud</option></select>
    <br>
    <input type="submit" value="Lisa">

</form>


</body>
</html>
