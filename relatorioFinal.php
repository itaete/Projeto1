
<!DOCTYPE html>

<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<link rel="shortcut icon" type="image/ico" href="http://www.datatables.net/favicon.ico">
	<meta name="viewport" content="initial-scale=1.0, maximum-scale=2.0">

	<title>Relatorio Estoque <? echo date('d_m');?></title>
	<link rel="stylesheet" type="text/css" href="../media/css/jquery.dataTables.css">
	<link rel="stylesheet" type="text/css" href="../extensions/TableTools/css/dataTables.tableTools.css">
<link rel="stylesheet" type="text/css" href="http://localhost/v/examples/resources/syntax/shCore.css">
	<!--link rel="stylesheet" type="text/css" href="../../../examples/resources/demo.css"-->
	<style type="text/css" class="init">
/* ==========================================================================
   Estilos para impressÃ£o
   ========================================================================== */

@media print {

    * { 
        background: transparent !important; 
        color: #000 !important; 
        text-shadow: none !important; 
        filter:none !important; 
        -ms-filter: none !important; 
		font-size:10px;
    } 

    body {
      /*  margin:0; 
        padding:0;
        line-height: 1.4em;
        font: 9pt Verdana, Geneva, sans-serif;
        color: #000;*/
		
	background: #fff;
    color: #666;
    font-family: "lucida grande",tahoma,verdana,arial,sans-serif;
    font-size: 11px;
    line-height: 15px;
    unicode-bidi: embed;
		
    }

    @page {
        margin: 1.5cm;
		
		
		
    }
	
	
	
	 @page body {
  size: landscape;
  font-size:10px;
}
 #landscape {
  page: body;
}




    .wrap { 
        width: 100%; 
        margin: 0; 
        float: none !important; 
    }

    .no-print, nav, footer, video, audio, object, embed { 
        display:none; 
    }

    .print {
        display: block;
    }

    img {
        max-width: 100%;
    }

    aside {
        display:block;
        page-break-before: always;
    }

    h1 {
        font-size: 24pt;
    }

    h2 {
        font-size: 18pt;
    }

    h3 {
        font-size: 14pt;
    }
    
    p {
        font-size: 12pt;
        widows: 3;
        orphans: 3;
    }

    a, a:visited {
        text-decoration: underline;
    }

    
    

    p a {
        word-wrap: break-word;
    }

    q:after {
        content: " (" attr(cite) ")"
    }

   

    .page-break { 
        page-break-before: always; 
    }
    
    /*Estilos da Demo*/
    .header.print h1{
        width: 100%;
        margin-bottom: 0.5cm;
        font-size: 18pt;
    }

    .header.print:after {
        content: "Relatorio de vendas.";
    }

    .artigo {
        margin-top: 0;
        border-top: 1px solid #000;
        padding-top: 1cm;
    }

    h1 a:link:after, h1 a:visited:after { 
        content: ""; 
    }
}
	</style>
	<script type="text/javascript" language="javascript" src="../media/js/jquery.js"></script>
	<script type="text/javascript" language="javascript" src="../media/js/jquery.dataTables.js"></script>
	<script type="text/javascript" language="javascript" src="../extensions/TableTools/js/dataTables.tableTools.js"></script>
	<script type="text/javascript" language="javascript" src="../media/js/shCore.js"></script>
	<script type="text/javascript" language="javascript" src="../media/js/demo.js"></script>
	<script type="text/javascript" language="javascript" class="init">




$(document).ready(function() {
	$('#example').DataTable( {
		dom: 'T<"clear">lfrtip',
		tableTools: {
			"sSwfPath": "../extensions/TableTools/swf/copy_csv_xls_pdf.swf",
			"sSwfPath": "../extensions/TableTools/swf/copy_csv_xls_pdf.swf"

		}
	} );
} );


	</script>
</head>



<body class="dt-example">
	
	<div class="geral" style="margin-top:100px; border-top:#000 dashed 2px; padding-top:20px; border-bottom:#000 dashed 2px; padding-top:20px;">




<?php require_once('../bar/barcode.inc.php');?>  

			<table id="example" class="display" cellspacing="0" width="100%">
    <thead>
        <tr>
           <th>ID</th>
            <th>Produto</th>
            <th>Qtde</th>
            <th>Pço Compra</th>
            <th>Pço Venda</th>
            <th>Total compra</th>
            <th>Total venda</th>
            <th>Lucro</th>
            <th>Codigo</th>
        </tr>
    </thead>
 
    <tfoot>
        <tr>
            <th>ID</th>
            <th>Produto</th>
            <th>Qtde</th>
            <th>Pço Compra</th>
            <th>Pço Venda</th>
            <th>Total compra</th>
            <th>Total venda</th>
            <th>Lucro</th>
            <th>Codigo</th>
        </tr>
    </tfoot>
 
    <tbody>
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    <? 
include 'db.php';
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
        <td><?=$res['lucro'] = number_format( $res['lucro']  , 2, ',', '.')?></td>
        <td><?=$res['codigo'] ?></td>
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
<!---td><strong>Total</strong></td>
<td></td>
<td style="color:#00F; font-weight:bold;"><?="". $row['qtde'].'';?></td>
<td></td>
<td></td>

<td style="color:#00F; font-weight:bold;"><?=$rowtotalcompra['totalcompra'] = number_format( $rowtotalcompra['totalcompra']  , 2, ',', '.')?></td>
<td style="color:#00F; font-weight:bold;"><?=$rowtotalvenda['totalvenda'] = number_format( $rowtotalvenda['totalvenda']  , 2, ',', '.')?></td>
<td style="color:#00F; font-weight:bold;"><?=$rowlucro['lucro'] = number_format( $rowlucro['lucro']  , 2, ',', '.')?></td--->









       
    </tbody>
</table>

	</div>		
</body>
</html>