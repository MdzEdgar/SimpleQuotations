<?php
$sql = array();

$sql[] = 'DROP TABLE IF EXISTS `' . _DB_PREFIX_ . 'simplequotations_cart`';
$sql[] = 'DROP TABLE IF EXISTS `' . _DB_PREFIX_ . 'simplequotations_cart_product`';
$sql[] = 'DROP TABLE IF EXISTS `' . _DB_PREFIX_ . 'simplequotations_quotes`';

foreach ($sql as $query) {
    if (Db::getInstance()->execute($query) == false) {
        return false;
    }
}