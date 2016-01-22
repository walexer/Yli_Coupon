<?php

class Yli_Coupon_Adminhtml_CouponController extends Mage_Adminhtml_Controller_Action
{
     public function indexAction()
      {
          $this->loadLayout();
      		$this->_setActiveMenu('promo/coupon');
          $this->_title('Manage Coupon');
          $this->_addContent($this->getLayout()->createBlock('coupon/adminhtml_coupon'));
          $this->renderLayout();
      }
}

