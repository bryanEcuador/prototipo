CREATE DEFINER=`root`@`localhost` PROCEDURE `spConsultarSubCategoriaTodos`()
begin
	select sc.id , sc.categoria_id , c.nombre as categoria , sc.nombre , sc.estado from tb_sub_categoria sc
    join tb_categoria c on c.id = sc.categoria_id
    where sc.estado = 1; 
    
end