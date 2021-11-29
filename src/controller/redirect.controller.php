<?php

if ($_POST['id_transacao'] != null || $_POST['id_transacao'] != "") {
    $id_update = $_POST['id_transacao'];
    error_log("valor do id_update no var global");
    error_log($id_update);
    header("Location: ../view/update.php?id_transa=$id_update");
}
