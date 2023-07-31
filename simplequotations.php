<?php
use PrestaShop\PrestaShop\Core\Payment\PaymentOption;

if (!defined('_PS_VERSION_')) {
    exit;
}

class SimpleQuotations extends PaymentModule
{
    public function __construct()
    {
        $this->name = 'simplequotations';
        $this->tab = 'payments_gateways';
        $this->version = '1.0.0';
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
        include(dirname(__FILE__).'/sql/install.php');

        return (
            parent::install()
            && $this->registerHook('displayExpressCheckout')
            && $this->registerHook('displayCustomerAccount')
            && $this->registerHook('paymentOptions')
            && $this->registerHook('paymentReturn')
        );
    }

    public function uninstall()
    {
        include(dirname(__FILE__).'/sql/uninstall.php');
        return (
            parent::uninstall()
        );
    }

    public function hookDisplayExpressCheckout($params)
    {
        return $this->display(__FILE__, 'simplequotations.tpl');
    }

    public function hookDisplayCustomerAccount($params)
    {
        return $this->display(__FILE__, 'simplequotations.tpl');
    }

    public function hookPaymentOptions($params)
    {
        if (!$this->active) {
            return;
        }

        $newOption = new PaymentOption;
        $newOption->setModuleName($this->name)
            ->setCallToActionText($this->l('Request for a quote'))
            ->setAction($this->context->link->getModuleLink($this->name, 'validation', array(), true))
            ->setAdditionalInformation($this->fetch('module:simplequotations/views/templates/front/payment_infos.tpl'));

        return [$newOption];
    }

    public function hookPaymentReturn($params)
    {
        return $this->fetch('module:simplequotations/views/templates/hook/payment_return.tpl');
    }
}