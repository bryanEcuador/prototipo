delimiter //
create procedure promedioProductos(in id_producto int)
begin
select avg(calificacion) as promedio, count(id) as total,
(select count(id) from comments where producto = 10 and calificacion = 1) as primero ,

(select count(id) from comments where producto = 10 and calificacion = 2) as segundo, 
(select count(id) from comments where producto = 10 and calificacion = 3) as tercero ,
(select count(id) from comments where producto  = 10 and calificacion = 4) as cuarto ,
(select count(id) from comments where producto = 10 and calificacion = 5) as quinto 
from comments where producto = id_producto;
end
// delimiter //
