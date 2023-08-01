<?php
$sql = array();

$sql[] = 'CREATE TABLE IF NOT EXISTS `' ._DB_PREFIX_ . 'simplequotations_cart` (
	`id_simplequotations_cart` int(11) unsigned NOT NULL AUTO_INCREMENT,
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
	`secure_key` varchar(32) NOT NULL,
	`recyclable` tinyint(3) unsigned NOT NULL DEFAULT 1,
	`allow_seperated_package` tinyint(3) unsigned NOT NULL DEFAULT 0,
	`date_add` datetime NOT NULL,
	`date_upd` datetime NOT NULL,
	PRIMARY KEY (`id_simplequotations_cart`)
) ENGINE=' . _MYSQL_ENGINE_ . ' DEFAULT CHARSET=utf8mb4;';

$sql[] = 'CREATE TABLE IF NOT EXISTS `'. _DB_PREFIX_ .'simplequotations_cart_product` (
    `id_simplequotations_cart` int(10) unsigned NOT NULL,
    `id_product` int(10) unsigned NOT NULL,
    `id_address_delivery` int(10) unsigned NOT NULL DEFAULT 0,
    `id_shop` int(10) unsigned NOT NULL DEFAULT 1,
    `id_product_attribute` int(10) unsigned NOT NULL DEFAULT 0,
    `id_customization` int(10) unsigned NOT NULL DEFAULT 0,
    `quantity` int(10) unsigned NOT NULL DEFAULT 0,
    `date_add` datetime NOT NULL,
    PRIMARY KEY (`id_simplequotations_cart`,`id_product`,`id_product_attribute`,`id_customization`,`id_address_delivery`)
) ENGINE='. _MYSQL_ENGINE_ .' DEFAULT CHARSET=utf8mb4;';

$sql[] = 'CREATE TABLE IF NOT EXISTS `'. _DB_PREFIX_ .'simplequotations_quotes` (
    `id_quote` int(10) unsigned NOT NULL AUTO_INCREMENT,
    `reference` varchar(9) DEFAULT NULL,
    `id_shop_group` int(11) unsigned NOT NULL DEFAULT 1,
    `id_shop` int(11) unsigned NOT NULL DEFAULT 1,
    `id_carrier` int(10) unsigned NOT NULL,
    `id_lang` int(10) unsigned NOT NULL,
    `id_customer` int(10) unsigned NOT NULL,
    `id_cart` int(10) unsigned NOT NULL,
    `id_currency` int(10) unsigned NOT NULL,
    `id_address_delivery` int(10) unsigned NOT NULL,
    `id_address_invoice` int(10) unsigned NOT NULL,
    `secure_key` varchar(32) NOT NULL,
    `recyclable` tinyint(1) unsigned NOT NULL DEFAULT 0,
    `total_discounts` decimal(20,6) NOT NULL DEFAULT 0.000000,
    `total_discounts_tax_incl` decimal(20,6) NOT NULL DEFAULT 0.000000,
    `total_discounts_tax_excl` decimal(20,6) NOT NULL DEFAULT 0.000000,
    `total_paid_tax_incl` decimal(20,6) NOT NULL DEFAULT 0.000000,
    `total_paid_tax_excl` decimal(20,6) NOT NULL DEFAULT 0.000000,
    `total_products` decimal(20,6) NOT NULL DEFAULT 0.000000,
    `total_products_wt` decimal(20,6) NOT NULL DEFAULT 0.000000,
    `total_shipping_tax_incl` decimal(20,6) NOT NULL DEFAULT 0.000000,
    `total_shipping_tax_excl` decimal(20,6) NOT NULL DEFAULT 0.000000,
    `total_wrapping_tax_incl` decimal(20,6) NOT NULL DEFAULT 0.000000,
    `total_wrapping_tax_excl` decimal(20,6) NOT NULL DEFAULT 0.000000,
    `valid` tinyint(1) unsigned NOT NULL DEFAULT 0,
    `date_add` datetime NOT NULL,
    `date_upd` datetime NOT NULL,
    PRIMARY KEY (`id_quote`)
) ENGINE='. _MYSQL_ENGINE_ .' DEFAULT CHARSET=utf8mb4;';

foreach ($sql as $query) {
    if (Db::getInstance()->execute($query) == false) {
        return false;
    }
}