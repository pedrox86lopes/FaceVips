<?php

include('mysql.php');
include('function.php');
 
// Get random 2
$query="SELECT * FROM images ORDER BY RAND() LIMIT 0,2";
$result = @mysql_query($query);
while($row = mysql_fetch_object($result)) {
 $images[] = (object) $row;
}
 
// Get the top10
$result = mysql_query("SELECT *, ROUND(score/(1+(losses/wins))) AS performance FROM images ORDER BY ROUND(score/(1+(losses/wins))) DESC LIMIT 0,10");
while($row = mysql_fetch_object($result)) $top_ratings[] = (object) $row;
 
// Close the connection
mysql_close();
 
?>
<div style="padding: 0px; margin: 4px 0; position: relative; float: none; clear: both; border: 1px dashed #e5e09b;"><a style="display: block; position: absolute; right: 3px; top: 2px; font-weight: bold; text-decoration: none; line-height: 14px; color: #676767; font-family: arial,sans-serif; font-size: 19px;" href="#" onclick="this.parentNode.style.display = 'none'; return false;" title="Hide">&times;</a><div id="FormMessages_message" style="padding: 17px 20px; margin: 0; float: none; background: #FAFAD2; color: #000000; font-family: Arial; font-size: 13px; font-style: italic;"><a href="politica.php">Política de Privacidade</a></div></div>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <head>  
    <meta charset="utf-8">  
    <link href='http://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>  
  
    <style>  
    body {  
        background: #292929;  
        padding: 1em;  
    }  
      
    h1 {  
        position: relative;  
        font-size: 80px;  
        margin-top: 0;  
        font-family: 'Lobster', helvetica, arial;  
    }  
      
    h1 a {  
        text-decoration: none;  
        color: #666;  
        position: absolute;  
          
        -webkit-mask-image: -webkit-gradient(linear, left top, left bottom, from(rgba(0,0,0,1)), color-stop(50%, rgba(0,0,0,.5)), to(rgba(0,0,0,1)));  
    }  
      
    h1:after {  
        content : '';  
        color: #d6d6d6;  
        text-shadow: 0 1px 0 white;  
    }  
      
    </style>  

</head>  
<body>  
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>| FaceVips |</title>
<style type="text/css">


body, html {font-family:Century, Helvetica, sans-serif;width:100%;margin:0;padding:0;text-align:center;}
h1 {background-color:#0099FF;color:#FFEBCD;padding:20px 0;margin:0;}
a img {border:0;}
td {font-size:15px;}
.image {background-color:#fff ;border:1px solid #ddd;border-bottom:1px solid #bbb;padding:5px;}
body{
    background-color: #fff;
}

</style>
</head>
<body>

<h1> <font color="white">FaceVips</font> </h1>
<h3>Quem é a mais gata?</h3>
<h2>Vote e descubra!</h2>
<center>

<table>
 <tr>
  <td valign="top" class="image"><a href="rate.php?winner=<?=$images[0]->image_id?>&loser=<?=$images[1]->image_id?>"><img src="images/<?=$images[0]->filename?>" /></a></td>
  <td valign="top" class="image"><a href="rate.php?winner=<?=$images[1]->image_id?>&loser=<?=$images[0]->image_id?>"><img src="images/<?=$images[1]->filename?>" /></a></td>
 </tr>
 
 <tr>

  <td>Ganhou: <?=$images[0]->wins?>, Perdeu: <?=$images[0]->losses?></td>
  <td>Ganhou: <?=$images[1]->wins?>, Perdeu: <?=$images[1]->losses?></td>
 </tr>
 <tr>
  <td>Pontos: <?=$images[0]->score?></td>
  <td>Pontos: <?=$images[1]->score?></td>
 </tr>
 <tr>
  <td>Esperado: <?=round(expected($images[1]->score, $images[0]->score), 4)?></td>
  <td>Esperado: <?=round(expected($images[0]->score, $images[1]->score), 4)?></td>


 </tr>

</table>
</center>




 <? /* remova pra mostrar o placar
 <tr>
  <? foreach($top_ratings as $key => $image) : ?>
  <td valign="top">Score: <?=$image->score?></td>
  <? endforeach ?>
 </tr>
 <tr>
  <? foreach($top_ratings as $key => $image) : ?>
  <td valign="top">Performance: <?=$image->performance?></td>
  <? endforeach ?>
 </tr>
 <tr>
  <? foreach($top_ratings as $key => $image) : ?>
  <td valign="top">Won: <?=$image->wins?></td>
  <? endforeach ?>
 </tr>
 <tr>
  <? foreach($top_ratings as $key => $image) : ?>
  <td valign="top">Lost: <?=$image->losses?></td>
  <? endforeach ?>
 </tr>
 */ ?>

</table>
</center>
</body>
</html>