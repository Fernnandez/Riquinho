<?php
if (isset($_GET['id_transacao']) && $_GET['id_transacao'] != null && $_GET['id_transacao'] != "") {
  $id_update = $_GET['id_transacao'];
  header("Location: ../view/update.receita.php?id_transa=$id_update");
}
