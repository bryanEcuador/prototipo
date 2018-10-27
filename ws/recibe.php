<?php
include('../database/dbconection.php');
srs= mysql_query($conn,"select* from tb_proveedores");
$objproveedores= new stdClass();
$listaProveedores=[];
while ( $row= mysqli_fetch_array($rs,mysql_assoc))
{

        $proveedor =new stdClass();
        $proveedor->id=$row['id'];
        $proveedor->codigo_externo=$row['codigo_externo'];
        $proveedor->tipo_empresa=$row['tipo_empresa'];
        $proveedor->ruc=$row['ruc'];
        $proveedor->razon_social=$row['razon_social'];
        $proveedor->representante_legal=$row['representante_legal'];
        $proveedor->direccion=$row['direccion'];
        $proveedor->banco=$row['banco'];
        $proveedor->cuenta_bancaria=$row['cuenta_bancaria'];
        $proveedor->estado=$row['estado'];
        $proveedor->gerente_general=$row['gerente_general'];
        $proveedor->telefono_representante=$row['telefono_representante'];
         $proveedor->telefono_gerente=$row['telefono_gerente'];
         $proveedor->usuario=$row['usuario'];
         $proveedor->contraseña=$row['contraseña'];
         $listaProveedores []=$proveedor;
}
$objproveedores->listaProveedores=$listaProveedores;
mysqli_close($conn);
echo json_encode($objproveedores);