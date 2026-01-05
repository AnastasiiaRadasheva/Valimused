<?php
function lisapunkt($id)
{
    global $connect;
    $paring = $connect->prepare("update valimused set punktid=punktid+1 where id=?");
    $paring->bind_param('i', $_REQUEST['lisa1punktid']);
    $paring->execute();
    header("Location:" . $_SERVER['PHP_SELF']);//aadresiriba puhasta päring ja jääb failinimi
}