<?php
$sql = array();

$sql[] = 'CREATE TABLE IF NO EXISTS `' ._DB_PREFIX_ . 'quotes` (
	`id` int(11) auto_increment NOT NULL,
	PRIMARY KEY (`id`)
) ENGINE=' . _MYSQL_ENGINE_ . ' DEFAULT CHARSET=utf8mb4;';