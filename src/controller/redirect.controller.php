<?php

if ($_POST['id_transacao'] != null || $_POST['id_transacao'] != "") {
    $id_update = $_POST['id_transacao'];
    header("Location: ../view/update.php?id_transa=$id_update");
}
