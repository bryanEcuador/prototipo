CREATE DEFINER=`root`@`localhost` PROCEDURE `spConsultarSugerencia`(
)
begin
select u.name,s.sugerencia from sugerencia s
    join user u on u.name = s.usuario; 

end
