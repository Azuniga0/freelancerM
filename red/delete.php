<?php
include('db.php');
if($_POST['id'])
{
$id=mysql_real_escape_string($_POST['padre_delete']);
$delete = "DELETE FROM `nodos` WHERE id_nodo='$id'";
mysql_query( $delete);
}
?>