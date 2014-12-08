
<?php include 'nheaderini.php'?>
<?php include 'nheader.php'?>
        
    
<div class="init">Bem vindo <h1 style="display:inline;"><strong>Everaldo Neves</strong></h1></div>





<!-- Index Content -->
<div class="subHeaderWrapper">
    <div class="subHeader">
    
    
    
    
<div class="colesq">
    
    
<?php include 'nmenu.php'?>
    
    
</div>
    
    
    
    
    
    
      <div class="coldir">

<!-- CONTEUDO--->



<?
include 'bar.php';
include 'db.php'?>

<form action="" method="post" name="cadastre">

<table border="0" width="100%" align="center">
  <tr>
    <td width="150">Nome do produto: </td>
    <td width="620"><input name="NomeProd" type="text" size="60"></td>
    </tr>
  <tr>
    <td>Codigo</td>
    <td><input name="CodProd" type="text" size="60" value="<?=$bar?>"></td>
    </tr>
  <tr>
    <td>Descrição: </td>
    <td><input name="DescProd" type="text" size="60"></td>
    </tr>
  <tr>
    <td>Quantidade: </td>
    <td><input name="QtdeProd" type="text" size="60"></td>
    </tr>
    
    
    
    <tr>
    <td>Preço Compra: </td>
    <td><input name="pcocompra" type="text" size="60"></td>
    </tr>
    
    
    
    <tr>
    <td>Preço Venda: </td>
    <td><input name="pcovenda" type="text" size="60"></td>
    </tr>
    
    
    
    <tr>
    <td>&nbsp;</td>
    <td ><input type="submit" name="cadastre" value="Cadastrar"></td>
    </tr>
</table>

 
  <p>
    
  </p>
</form>



<?php

  if(isset($_POST['cadastre'])){
	$codigo = $_POST['CodProd'];
    $NomeProd = $_POST["NomeProd"];
	$DescProd = $_POST["DescProd"];
	$QtdeProd = $_POST["QtdeProd"];
	$timestamp = time();
	$data = date('d/m/Y H:i:s', $timestamp);
	$autor = "Everaldo";
	$ativo = "s";
	$PcoCompra = $_POST['pcocompra'];
	$PcoVenda = $_POST['pcovenda'];
	$lucro =  $PcoVenda - $PcoCompra;
	$totalcompra = $QtdeProd * $PcoCompra;
	$totalvenda = $QtdeProd * $PcoVenda;
	
	
	
	function retira_acentos($texto) 
{ 
$array1 = array(":",";","º","\"","\"","'","'","$",",","."," ", "á", "à", "â", "ã", "ä", "é", "è", "ê", "ë", "í", "ì", "î", "ï", "ó", "ò", "ô", "õ", "ö", "ú", "ù", "û", "ü", "ç" 
, "Á", "À", "Â", "Ã", "Ä", "É", "È", "Ê", "Ë", "Í", "Ì", "Î", "Ï", "Ó", "Ò", "Ô", "Õ", "Ö", "Ú", "Ù", "Û", "Ü", "Ç" ); 
$array2 = array("-","-","-","-","-","-","-","-","-","-","-", "a", "a", "a", "a", "a", "e", "e", "e", "e", "i", "i", "i", "i", "o", "o", "o", "o", "o", "u", "u", "u", "u", "c" 
, "A", "A", "A", "A", "A", "E", "E", "E", "E", "I", "I", "I", "I", "O", "O", "O", "O", "O", "U", "U", "U", "U", "C" ); 
return str_replace( $array1, $array2, $texto); 
} 


$url = retira_acentos($NomeProd);

	
	echo 'Nome: '.$NomeProd.'<br>Codigo: '.$bar.'<br>Decrição: '.$DescProd.'<br> Quantidade: '.$QtdeProd.'<br> Data: '.
	$data.'<br> Autor: '.$autor.'<br> Ativo: '.$ativo.'<br>';
	
?>
<?php include 'db.php';

require_once('../bar/barcode.inc.php');
new barCodeGenrator($codigo,1,'../imgbar/'.$codigo.'.gif', 300, 100, true);

$sql = "INSERT INTO `produtos`(`prod_id`, `nome`, `album`, `qtde`, `data`, `codigo`, `ativo`, `img`, `descricao`, `pcocompra`, `pcovenda`,`totalcompra`,`totalvenda`,`lucro`,`url`) VALUES ('','$NomeProd','$NomeProd','$QtdeProd','$data','$codigo','$ativo','','$DescProd','$PcoCompra','$PcoVenda','$totalcompra','$totalvenda','$lucro','$url')";


?>


<?

$sql = mysql_query($sql)
or die ("Houve erro na gravação dos dados.");


  }


?>






<!--- CONTEUDO FIM --->


 </div>
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
        
        <!--div class="indexPage inline">
            
            <!-- Index Left Panel --
            <div class="indexLeftPanel">
                <div style="margin-bottom: 40px;">
                
                   
                   
                </div>
                
                
              
              
                
                
                
            </div>
            <!--// Index Esquerda Panel -->
            
            
            
            
            
            
            
            <!-- Comeco direita Panel --
            <div class="indexRightPanel">
            
                <p class="mb10 pb10" style="border-bottom: 1px solid #ccc;"><h1>Painel</h1></p>
            
               
               
               </div>
            <!-- Index Right Panel --
            
            
            <h1>Painel direita</h1>
            
        </div-->
        
    </div>
</div>
<!-- Index Content -->



<?php include 'nfooter.php'?>
</body>
</html>

