<?php
include('../database/');

$rs=mysql_query($conn,"select *	from usuario ");

$objrecibido=new stdclass();
$lista = [];
while ($row=mysqli_fetch_array($rs,MYSQL_ASSOC));
{

	$recibido=new stdclass();

}
mysql_close($conn);
