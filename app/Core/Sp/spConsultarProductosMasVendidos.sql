delimiter //

CREATE DEFINER=`root`@`localhost` PROCEDURE `spConsultarProductosMasVendidos`(
)
begin
	select p.id, p.nombre as prooducto , p.precio , c.nombre as categoria , sc.nombre as subCategoria , m.nombre as marca , 
			(select imagen1 from tb_imagenes where producto_id = p.id limit 1)  as imagen
    from tb_producto p 
    join tb_categoria c on c.id = p.id_categoria
    join tb_sub_categoria sc on sc.id = p.id_sub_categoria
    join tb_marca m on m.id = p.id_marca limit 5;
end


// delimiter 