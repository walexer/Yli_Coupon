<?php 

class Yli_Coupon_Block_Adminhtml_Coupon_Grid extends Mage_Adminhtml_Block_Widget_Grid
{
    public function __construct()
    {
        parent::__construct();
        $this->setId('couponGrid');
        $this->setDefaultSort('coupon_id');
        $this->setDefaultDir('ASC');
        $this->setSaveParametersInSession(true);
    }
    
    protected function _prepareCollection()
    {
        $collection = Mage::getModel('salesrule/coupon')->getCollection()
                      ->addFieldToFilter('is_primary',array('null' => true));        
        $this->setCollection($collection);
        return parent::_prepareCollection();
    } 
    
    protected function _prepareColumns()
    {
        
        $this->addColumn('code', array(
            'header' => Mage::helper('coupon')->__('Coupon Code'),
            'align' =>'left',
            'width' => '50px',
            'index' => 'code',
        ));
        $this->addColumn('rule_id', array(
            'header' => Mage::helper('coupon')->__('rule_id'),
            'align' =>'left',
            'width' => '50px',
            'index' => 'rule_id',
        ));
        $this->addColumn('customer_id', array(
            'header' => Mage::helper('coupon')->__('customer_id'),
            'align' =>'left',
            'width' => '50px',
            'index' => 'customer_id',
        ));
        return parent::_prepareColumns();
    }    
        
}