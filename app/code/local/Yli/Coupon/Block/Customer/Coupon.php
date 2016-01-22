<?php

class Yli_Coupon_Block_Customer_Coupon extends Mage_Core_Block_Template
{
    public function getCoupons()
    {
        $customer_id = Mage::getSingleton('customer/session')->getCustomerId();
        $coupons = Mage::getModel('salesrule/coupon')->getCollection()
                    ->addFieldToFilter('customer_id',$customer_id);
        $coupons->getSelect()->joinLeft(
                array( 'salesrule' => $coupons->getTable('salesrule/rule')),
                'main_table.rule_id = salesrule.rule_id',
                array('name')
        );
        return $coupons;
    }
}