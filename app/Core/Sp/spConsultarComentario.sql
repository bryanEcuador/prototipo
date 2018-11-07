delimiter //
create procedure spConsultarComentario(in id_producto int)
begin
select *from comments where producto = id_producto;
end
// delimiter //