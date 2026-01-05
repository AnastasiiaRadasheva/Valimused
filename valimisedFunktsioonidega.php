<?php
require ('funk.php');
if(isset($_REQUEST['lisa1punktid'])) {
    lisa1punktid($_REQUEST['lisa1punktid']);
    header("Location:" . $_SERVER['PHP_SELF']);//aadresiriba puhasta päring ja jääb failinimi
    exit();
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
</body>
</html>
