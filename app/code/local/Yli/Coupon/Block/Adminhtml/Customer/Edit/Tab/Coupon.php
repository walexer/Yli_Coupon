<?php

class Yli_Coupon_Block_Adminhtml_Customer_Edit_Tab_Coupon extends Yli_Coupon_Block_Adminhtml_Coupon_Grid implements Mage_Adminhtml_Block_Widget_Tab_Interface
{
    
    public function __construct()
    {
        parent::__construct();
        $this->setId('couponGrid');
        $this->setUseAjax(true);      
    }
    
    protected function _getCustomer()
    {
        return Mage::registry('current_customer');
    }
    
    public function canShowTab() {
        $customer = Mage::registry('current_customer');
        return (bool)$customer->getId();
    }

    public function getTabLabel() {
        return $this->__('My Coupon');
    }

    public function getTabTitle() {
        return $this->__('My Coupon');
    }

    public function isHidden() {
        return false;
    }
    
    public function getAfter()
    {
        return 'wishlist';
    }

    protected function _prepareCollection()
    {
        $collection = Mage::getModel('salesrule/coupon')->getCollection()
                      ->addFieldToFilter('is_primary',array('null' => true))
                      ->addFieldToFilter('customer_id',$this->_getCustomer()->getId());         
        $this->setCollection($collection);
        return Mage_Adminhtml_Block_Widget_Grid::_prepareCollection();
    }
}


