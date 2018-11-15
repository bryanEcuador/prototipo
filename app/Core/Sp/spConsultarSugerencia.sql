CREATE DEFINER=`root`@`localhost` PROCEDURE `spConsultarSugerencia`( in _nombre varchar(20) 
)
begin
	select *from sugerencias where estado = 1 and nombre like concat('%',_nombre,'%'); 
    
end