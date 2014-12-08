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

<link rel="stylesheet" href="../table.css"/>
<?php
include'db.php';
include'bar.php';

$sql = "SELECT 		* 	FROM 		produtos 	WHERE 
		prod_id = ".(int)$_GET['id'];
$resultado = mysql_query($sql)
or die ("Não foi possível realizar a consulta.");

$linha = mysql_fetch_array($resultado, MYSQL_ASSOC);

?>



<form action="Altera.php?id=<?php echo $_GET['id'] ?>" method="post">

<table width="900" border="0">
  <tr>
  
  </tr>
  <tr>
    <th scope="col">Nome:</th>
    <td><input name="nome" type="text" value="<?php echo $linha['nome'] ?>" size="80"/></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
   <th scope="col">Quantidade</th>
    <td> <input name="qtde" type="text" value="<?php echo $linha['qtde'] ?>" size="80"/></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
   <th scope="col">Preço compra</th>
    <td><input name="pcocompra" type="text" value="<?php echo $linha['pcocompra'] ?>" size="80"/></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <th scope="col">Preço venda</th>
    <td><input name="pcovenda" type="text" value="<?php echo $linha['pcovenda'] ?>" size="80"/></td>
    <td>&nbsp;</td>
  </tr>
  
  
   <tr>
    <th scope="col">Total compra</th>
    <td><input name="totalcompra" type="text" value="<?php echo $linha['qtde'] * $linha['pcocompra'] ?>" size="80"/></td>
    <td>&nbsp;</td>
  </tr>
  
   <tr>
    <th scope="col">Total venda</th>
    <td><input name="totalvenda" type="text" value="<?php echo $linha['qtde'] * $linha['pcovenda'] ?>" size="80"/></td>
    <td>&nbsp;</td>
  </tr>
  
   <tr>
    <th scope="col">Lucro</th>
    <td><input name="lucro" type="text" value="<?php $luc = $linha['pcovenda'] - $linha['pcocompra']; echo $luc * $linha['qtde']  ?>" size="80"/></td>
    <td>&nbsp;</td>
  </tr>
  
  
  
    <tr>
    <th scope="col">Codigo</th>
    <td><input name="codigo" type="text" value="<?php echo $linha['codigo'];?>" size="12" maxlength="12"/><?=$bar?></td>
    <td>&nbsp;</td>
  </tr>
  
  
  
  
   <tr>
    <th scope="col">Ativo</th>
    <td><label for="mostra">Ativo? </label>
	<input name="ativo" id="ver" type="checkbox" value="1" 
	<?php if ($linha['ativo'] == 's') { ?>checked="checked"<?php } ?>/></td>
    <td>&nbsp;</td>
  </tr>
  
  
  
   <tr>
    <td> </td>
    <td><input type="submit" value="Alterar" style="width:350px; height:50px;"/></td>
    <td>&nbsp;</td>
  </tr>
</table>
</form>


<!--- CONTEUDO FIM --->



      </div>
    
    
    
    
    
    
    
    
    
    
    
    
    </div>
</div>
<!-- Index Content -->



<?php include 'nfooter.php'?>
</body>
</html>