
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

<? include 'db.php'; ?>

       <table width="100%">
<tr>
        <th scope="col">Cod</th>
        <th scope="col">Produto descrição</th>
        <th scope="col">Codigo</th>
                <th scope="col">Codigo</th>
     
</tr>
				
<? 

$sql="SELECT * FROM produtos"; 


$resultado = mysql_query($sql) //Executando consulta
				or die (mysql_error()); //Se ocorrer erro mostre-o
				if (@mysql_num_rows($resultado) == 0) //Se não retornar nada
				echo("Nenhum cadastro encontrado");
				

				while($res=mysql_fetch_array($resultado)){
$lucro = $res['pcovenda']-$res['pcocompra'];					
				?>
                
         
<tr>
        <td><?=$res['prod_id']?></td>
          <td><a href="AlteraProduto.php?id=<?=$res['prod_id']?>"><?=$res['nome']?></a></td>
        <td style="color:#090; font-weight:bold"><?=$res['codigo'] ?></td>
        
        
         <td style="color:#090; font-weight:bold">
		<a href="excluir.php?id=<?=$res['prod_id']?>">Excluir</a></td>
</tr>


				
                <?

				
				}
				
				
				
				


?>


<?php

$row = mysql_fetch_array(mysql_query(" SELECT SUM(qtde) as qtde FROM produtos"));
$row1 = mysql_fetch_array(mysql_query(" SELECT SUM(pcocompra) as pcocompra FROM produtos"));
$rowlucro = mysql_fetch_array(mysql_query(" SELECT SUM(lucro) as lucro FROM produtos"));
$rowtotalvenda = mysql_fetch_array(mysql_query(" SELECT SUM(totalvenda) as totalvenda FROM produtos"));
$rowtotalcompra = mysql_fetch_array(mysql_query(" SELECT SUM(totalcompra) as totalcompra FROM produtos"));

//$row2 = mysql_fetch_array(mysql_query(" SELECT pcocompra,pcovenda,qtde * FROM produtos"));





	
	

?>


</table>



<!--- CONTEUDO FIM --->


 </div>
    
    
    
    
    
    
    
    
    
    
    
    
    </div>
</div>
<!-- Index Content -->



<?php include 'nfooter.php'?>
</body>
</html>