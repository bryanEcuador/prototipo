delimiter //
CREATE DEFINER=`root`@`localhost` PROCEDURE `spConsultarProveedor`(in id_proveedor int)
begin
	select p.id , p.codigo_externo, p.tipo_empresa, p.ruc , p.razon_social , p.representante_legal , p.direccion , 
    p.banco , p.cuenta_bancaria, p.estado , p.gerente_general , p.telefono_representante , p.telefono_gerente ,
    p.user_id , u.name , u.password , u.email
    from tb_proveedores p
    join users u on u.id = p.user_id
	where p.id = id_proveedor;

end
// delimiter //