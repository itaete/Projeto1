
 
 <? include 'db.php'; ?>
                <?php
				
		
		
				$sql="SELECT * FROM produtos WHERE prod_id = ".(int)$_GET['id']; //consulta no BD
				$resultados = mysql_query($sql) //Executando consulta
				or die (mysql_error()); //Se ocorrer erro mostre-o
				if (@mysql_num_rows($resultados) == 0) //Se não retornar nada
				echo("Nenhum cadastro encontrado");
				
				
				$res=mysql_fetch_array($resultados);
				
				
				$id_produto = $res['prod_id'];
				
				
								
				
				

error_reporting(0);
//session_start();


$album_id='1'; //$session id
define ("MAX_SIZE","9000"); 
function getExtension($str)
{
         $i = strrpos($str,".");
         if (!$i) { return ""; }
         $l = strlen($str) - $i;
         $ext = substr($str,$i+1,$l);
         return $ext;
}


$valid_formats = array("jpg", "png", "gif", "bmp","jpeg");
if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST") 
{
	
    $uploaddir = "../uploads/"; //a directory inside
    foreach ($_FILES['photos']['name'] as $name => $value)
    {
	
        $filename = stripslashes($_FILES['photos']['name'][$name]);
        $size=filesize($_FILES['photos']['tmp_name'][$name]);
        //get the extension of the file in a lower case format
          $ext = getExtension($filename);
          $ext = strtolower($ext);
     	
         if(in_array($ext,$valid_formats))
         {
	       if ($size < (MAX_SIZE*1024))
	       {
		   $image_name=time().$filename;
		   echo "<img src='".$uploaddir.$image_name."' class='imgList'>";
		   $newname=$uploaddir.$image_name;
           
           if (move_uploaded_file($_FILES['photos']['tmp_name'][$name], $newname)) 
           {
	       $time=time();
		   
		   
		   $result = mysql_query("SELECT * FROM album
WHERE id='$album_id'");

while($row = mysqli_fetch_array($result)) {
  echo $row['album_id'] . " " . $row['LastName'];
  echo "<br>";
}


$img = $uploaddir.$image_name;

$sql = "UPDATE 
		produtos 
	SET 
		img='".mysql_real_escape_string($img)."', 
		
	WHERE 
		id = ".(int)$_GET['id'];



  mysql_query("INSERT INTO user_uploads(image_name,album_id,created, id_produto) VALUES('$image_name','$album_id','$time','$id_produto')");
  
  
  
  
  $sql9 = "UPDATE produtos	SET 	capa='$image_name'	WHERE 	prod_id = ".(int)$_GET['id'];

$resultado = mysql_query($sql9)
or die ("Erro ao update notícia.");
	       }
	       else
	       {
	        echo '<span class="imgList">You have exceeded the size limit! so moving unsuccessful! </span>';
            }

	       }
		   else
		   {
			echo '<span class="imgList">You have exceeded the size limit!</span>';
          
	       }
       
          }
          else
         { 
	     	echo '<span class="imgList">Unknown extension!</span>';
           
	     }
           
     }
}

?>