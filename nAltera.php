<?php
include 'db.php';

	function retira_acentos($texto) 
{ 
$array1 = array(":",";","º","\"","\"","'","'","$",",","."," ", "á", "à", "â", "ã", "ä", "é", "è", "ê", "ë", "í", "ì", "î", "ï", "ó", "ò", "ô", "õ", "ö", "ú", "ù", "û", "ü", "ç" 
, "Á", "À", "Â", "Ã", "Ä", "É", "È", "Ê", "Ë", "Í", "Ì", "Î", "Ï", "Ó", "Ò", "Ô", "Õ", "Ö", "Ú", "Ù", "Û", "Ü", "Ç" ); 
$array2 = array("-","-","-","-","-","-","-","-","-","-","-", "a", "a", "a", "a", "a", "e", "e", "e", "e", "i", "i", "i", "i", "o", "o", "o", "o", "o", "u", "u", "u", "u", "c" 
, "A", "A", "A", "A", "A", "E", "E", "E", "E", "I", "I", "I", "I", "O", "O", "O", "O", "O", "U", "U", "U", "U", "C" ); 
return str_replace( $array1, $array2, $texto); 
} 
$url = 'RmodasBrasil/'.retira_acentos($_POST['nome']);




$sql = "UPDATE 
		produtos 
	SET 
		nome='".mysql_real_escape_string($_POST['nome'])."', 
		qtde='".mysql_real_escape_string($_POST['qtde'])."', 
		pcocompra='".mysql_real_escape_string($_POST['pcocompra'])."', 
		pcovenda='".mysql_real_escape_string($_POST['pcovenda'])."', 
		totalcompra='".mysql_real_escape_string($_POST['totalcompra'])."', 
		totalvenda='".mysql_real_escape_string($_POST['totalvenda'])."', 
		lucro='".mysql_real_escape_string($_POST['lucro'])."', 
		codigo='".mysql_real_escape_string($_POST['codigo'])."', 
		ativo='".(($_POST['ativo']) ? 's' : 's')."',
		url='".mysql_real_escape_string($url)."'
	WHERE 
		prod_id = ".(int)$_GET['id'];

$resultado = mysql_query($sql)
or die ("Erro ao alterar notícia.");

?>

<h1>Notícia alterada com sucesso!</h1>
<script language= "JavaScript">
location.href="javascript:history.back(1)";
</script>


