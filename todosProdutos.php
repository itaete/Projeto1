





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
     
<?php require_once('../bar/barcode.inc.php');?>         <!-- end navbar side -->

<? include 'db.php'; ?>

       <table>
<tr>
        <th scope="col">Cod</th>
        <th scope="col">Produto descrição</th>
        <th scope="col">Em Estoque</th>
        <th scope="col">Preço Compra</th>
        <th scope="col">Preço Venda</th>
        <th scope="col">Total compra</th>
        <th scope="col">Total venda</th>
        <th scope="col">Lucro</th>
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
$code_number = 		$res['codigo'];		
new barCodeGenrator($code_number,1,'../imgbar/'.$code_number.'.gif', 130, 75, true);	
				?>
                
         
<tr>
        <td><?=$res['prod_id']?></td>
          <td><a href="AlteraProduto.php?id=<?=$res['prod_id']?>"><?=$res['nome']?></a></td>
        <td><?=$res['qtde']?></td>
        <td><?=$res['pcocompra'] = number_format( $res['pcocompra']  , 2, ',', '.');?></td>
        <td><?=$res['pcovenda'] = number_format( $res['pcovenda']  , 2, ',', '.');?></td>
        <td><?=$res['totalcompra'] = number_format( $res['totalcompra']  , 2, ',', '.');?></td>
        <td><?=$res['totalvenda'] = number_format( $res['totalvenda']  , 2, ',', '.');?></td>
        <td style="color:#090; font-weight:bold"><?=$res['lucro'] = number_format( $res['lucro']  , 2, ',', '.')?></td>
         <td style="color:#090; font-weight:bold"><?=$res['codigo'] ?></td>
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
<td><strong>Total</strong></td>
<td></td>
<td style="color:#00F; font-weight:bold;"><?="". $row['qtde'].'';?></td>
<td></td>
<td></td>

<td style="color:#00F; font-weight:bold;"><?=$rowtotalcompra['totalcompra'] = number_format( $rowtotalcompra['totalcompra']  , 2, ',', '.')?></td>
<td style="color:#00F; font-weight:bold;"><?=$rowtotalvenda['totalvenda'] = number_format( $rowtotalvenda['totalvenda']  , 2, ',', '.')?></td>
<td style="color:#00F; font-weight:bold;"><?=$rowlucro['lucro'] = number_format( $rowlucro['lucro']  , 2, ',', '.')?></td>
</table>

<!--- CONTEUDO FIM --->


      </div>
    
    
    
    
    
    
    
    
    
    
    
    
    </div>
</div>
<!-- Index Content -->



<?php include 'nfooter.php'?>
</body>
</html>

