ALTER TABLE `pregunta` CHANGE `fecha` `fecha` DATETIME NOT NULL;

ALTER TABLE `respuesta` ADD `fecha_respuesta` DATETIME NULL DEFAULT NULL AFTER `pregunta_id_pregunta`;