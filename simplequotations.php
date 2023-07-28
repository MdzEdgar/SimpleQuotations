<?php
if (!defined('_PS_VERSION_')) {
    exit;
}

class SimpleQuotations extends Module
{
    public function __construct()
    {
        $this->name = 'simplequotations';
        $this->tab = 'others';
        $this->Version = '1.0.0';
        $this->author = 'Edgar Mdz';
        $this->need_instance = 0;
        $this->ps_versions_compliancy = [
            'min' => '1.7',
            'max' => '1.7.9',
        ];
        $this->bootstrap = true;

        parent::__construct();

        $this->displayName = $this->l('Simple Quotations');
        $this->description = $this->l('Create quotes from shopping carts.');

        $this->confirmUninstall = $this->l('Are you sure you want to uninstall?');

    }

    public function install()
    {
        return (
            parent::install()
            && $this->registerHook('displayExpressCheckout')
            && $this->registerHook('displayAfterCarrier')
            && $this->registerHook('displayCartExtraProductActions')
            && $this->registerHook('displayShoppingCart')
            && $this->registerHook('displayCustomerAccount')
        );
    }

    public function uninstall()
    {
        return (
            parent::uninstall()
        );
    }
}