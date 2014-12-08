<?php
include 'db.php';
$sql = "DELETE FROM 
produtos	WHERE 
		prod_id = ".(int)$_GET['id'];

$resultado = mysql_query($sql)
or die ("Erro ao remover notícia.");

?>

<h1>A notícia foi excluída com êxito!</h1>

<script language= "JavaScript">
setTimeout("document.location = 'DeletarProduto.php'",2000);
</script>

