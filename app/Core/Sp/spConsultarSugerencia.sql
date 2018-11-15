CREATE DEFINER=`root`@`localhost` PROCEDURE `spConsultarSugerencia`( in _nombre varchar(20) 
)
begin
<<<<<<< HEAD
	select *from sugerencias where estado = 1 and nombre like concat('%',_nombre,'%'); 
    
end
=======
select u.name,s.sugerencia from sugerencia s
    join user u on u.name = s.usuario; 

end
>>>>>>> e200c3fca7e7aaa14e42a4d7b748c10b91803a3a
