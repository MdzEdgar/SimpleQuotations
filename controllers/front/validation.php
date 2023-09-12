<?php

class SimpleQuotationsValidationModuleFrontController extends ModuleFrontController
{
    public function postProcess()
    {
        $cart = $this->context->cart;
        if ($cart->id_customer == 0 || $cart->id_address_delivery == 0 || $cart->id_address_invoice == 0 || !$this->module->active)
            Tools::redirect($this->context->link->getPageLink(
                'order',
                true,
                (int) $this->context->language->id,
                ['step' => 1,]
            ));

        $customer = new Customer($cart->id_customer);

        if (!Validate::isLoadedObject($customer)) {
            Tools::redirect($this->context->link->getPageLink(
                'order',
                true,
                (int) $this->context->language->id,
                ['step' => 1,]
            ));
        }

        $total_cart = (float) $cart->getOrderTotal(false, Cart::BOTH_WITHOUT_SHIPPING, null, null, true);
        if ($total_cart <=0)
        {
            Tools::redirect($this->context->link->getPageLink(
                'order',
                true,
                $this->context->link->getPageLink(
                    'oder',
                    true,
                    (int) $this->context->language->id,
                    ['step' => 1,]
                )
            ));
        }

        $cartdetails = $cart->getSummaryDetails();
        $cartproducts = $cart->getProducts();

        $this->setTemplate('module:simplequotations/views/templates/front/quotation_added.tpl');
    }
}