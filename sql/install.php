<?php
$sql = array();

$sql[] = 'CREATE TABLE IF NOT EXISTS `' ._DB_PREFIX_ . 'quotes` (
	`id` int(11) AUTO_INCREMENT NOT NULL,
	PRIMARY KEY (`id`)
) ENGINE=' . _MYSQL_ENGINE_ . ' DEFAULT CHARSET=utf8mb4;';

foreach ($sql as $query) {
    if (Db::getInstance()->execute($query) == false) {
        return false;
    }
}