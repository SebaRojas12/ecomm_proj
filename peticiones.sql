SELECT 
    id_usuario, 
    mail,
     U.id_nivel, 
     N.nivel
FROM usuarios U
JOIN niveles N
ON N.id_nivel = U.id_nivel
WHERE U.mail = 'test.mail@gmail.com' AND U.clave = 'esteesuntest'
LIMIT 1;