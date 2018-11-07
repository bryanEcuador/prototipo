CREATE DEFINER=`root`@`localhost` PROCEDURE `spConsultarMarcas`( in _nombre varchar(20) 
)
begin
	select *from tb_marca where estado = 1 and nombre like concat('%',_nombre,'%'); 
    
end