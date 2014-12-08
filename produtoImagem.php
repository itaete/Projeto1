<?php 
session_start();
$session_id='1'; //$session id
?>
<? include 'db.php'; ?>

<?php $sql = "SELECT 	* 	FROM 	produtos WHERE 	prod_id = ".(int)$_GET['id'];			
				
				$resultados = mysql_query($sql) //Executando consulta
				or die (mysql_error()); //Se ocorrer erro mostre-o
				if (@mysql_num_rows($resultados) == 0) //Se não retornar nada
				echo("Nenhum cadastro encontrado");				
				$res=mysql_fetch_array($resultados);//laço para listagem de itens				
				$nome = $res['nome'];
				$grupo = $res['nome'];
				$ida = $res['prod_id'];				
				
?>


    
<script src="../js/jquery.min.js"></script>
<script src="../js/jquery.wallform.js"></script>
<script>
 $(document).ready(function() { 
		
            $('#photoimg').die('click').live('change', function()			{ 
			           //$("#preview").html('');
			    
				$("#imageform").ajaxForm({target: '#preview', 
				     beforeSubmit:function(){ 
					
					console.log('ttest');
					$("#imageloadstatus").show();
					 $("#imageloadbutton").hide();
					 }, 
					success:function(){ 
				    console.log('test');
					 $("#imageloadstatus").hide();
					 $("#imageloadbutton").show();
					}, 
					error:function(){ 
					console.log('xtest');
					 $("#imageloadstatus").hide();
					$("#imageloadbutton").show();
					} }).submit();
					
		
			});
        }); 
</script>

<style>

body
{
font-family:arial;
}

#preview
{
color:#cc0000;
font-size:12px
}
.imgList 
{
max-height:150px;
margin-left:5px;
border:1px solid #dedede;
padding:4px;	
float:left;	
}

</style>




<!-- CONTEUDO--->



<div id='preview'>
</div>
	
<form id="imageform" method="post" enctype="multipart/form-data" action='ajaxImageUpload.php?id=<?=$ida?>' style="clear:both">
<div id='imageloadstatus' style='display:none'><img src="loader.gif" alt="Uploading...."/></div>
<div id='imageloadbutton'>
<input type="file" name="photos[]" id="photoimg" multiple />
</div>
</form>






<a href="ExibeGrupo.php?id=<?=$ida;?>"><h1><?=$nome;?></h1></a><br><br>


				
<? 

$sqla="SELECT * FROM user_uploads where id_produto=$ida";

$resultadosa = mysql_query($sqla) //Executando consulta
				or die (mysql_error()); //Se ocorrer erro mostre-o
				if (@mysql_num_rows($resultadosa) == 0) //Se não retornar nada
				echo("Sem Imagem cadastrada");
				
				
				while($ress=mysql_fetch_array($resultadosa)){
				?>
				<img src="../uploads/120.php?img=<?=$ress['image_name']?>"/>
                <?

				
				}
?>
				
      
      
<br>
<br>




  <?php include 'db.php';
  date_default_timezone_set("America/Sao_paulo"); 


  ?>


<?php



$sql = "SELECT 	* FROM bandeiras ORDER BY	id_bandeira ASC 	LIMIT 30";
$resultado = mysql_query($sql) 
or die ("Não foi possível realizar a consulta");
if (@mysql_num_rows($resultado) == 0)
   die('Nenhum registro encontrado');
   
while ($linha = mysql_fetch_array($resultado, MYSQL_ASSOC))
{

echo("<option value='".$linha['bandeira']."'>".$linha['bandeira']."</option>");
}

?>
</select>
    
    
    


<?php

  if(isset($_POST['cadastre'])){
	  
	$data = date('d/m/Y');
	$hora = date('H:i:s');    
	$valor = str_replace(",", ".", $_POST['valor']);
	$bandeira = $_POST["bandeira"];
	$obs = $_POST["obs"];
	$datacv = $_POST["datacv"];


	
?>
<?php include 'db.php';



$sql = "INSERT INTO `cv`(`id_cv`, `data`, `valor`, `bandeira`, `obs`, `datacv`, `hora`, `pago`, `grupo`,`id_grupo`) VALUES ('','$data','$valor','$bandeira','$obs','$datacv','$hora','','$grupo','$id_grupo')";







$sql = mysql_query($sql)
or die ("Houve erro na gravação dos dados.");



  
  if ($sql){
	  
	  
	  
	echo '<script type="text/javascript">
   alert("Cadastrado com sucesso ");
</script>';



	  
	  }
	  
}


?>







<!--- CONTEUDO FIM --->

