<?php
$sql = array();

$sql[] = 'CREATE TABLE IF NOT EXISTS `' ._DB_PREFIX_ . 'simplequotations_cart` (
	`id` int(11) unsigned NOT NULL AUTO_INCREMENT,
	`id_shop_group` int(11) unsigned NOT NULL DEFAULT 1,
	`id_shop` int(11) unsigned NOT NULL DEFAULT 1,
	`id_carrier` int(10) unsigned NOT NULL,
	`delivery_option` text NOT NULL,
	`id_lang` int(10) unsigned NOT NULL,
	`id_address_delivery` int(10) unsigned NOT NULL,
	`id_address_invoice` int(10) unsigned NOT NULL,
	`id_currency` int(10) unsigned NOT NULL,
	`id_customer` int(10) unsigned NOT NULL,
	`id_guest` int(10) unsigned NOT NULL,
	`secure_key` varchar(32) NOT NULL DEFAULT,
	`recyclable` tinyint(3) unsigned NOT NULL DEFAULT 1,
	`allow_seperated_package` tinyint(3) unsigned NOT NULL DEFAULT 0,
	`date_add` datetime NOT NULL,
	`date_upd` datetime NOT NULL,
	PRIMARY KEY (`id`)
) ENGINE=' . _MYSQL_ENGINE_ . ' DEFAULT CHARSET=utf8mb4;';

foreach ($sql as $query) {
    if (Db::getInstance()->execute($query) == false) {
        return false;
    }
}