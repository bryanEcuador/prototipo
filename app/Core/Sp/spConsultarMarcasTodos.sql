CREATE DEFINER=`root`@`localhost` PROCEDURE `spConsultarMarcasTodos`(
)
begin
	select *from tb_marca where estado = 1; 
    
end