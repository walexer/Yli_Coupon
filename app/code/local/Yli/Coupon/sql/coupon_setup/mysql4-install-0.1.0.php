<?php
/**
 *
 *
 * @category    Yli
 * @package     Yli_Coupon
 */


$installer = $this;
$installer->startSetup();

$installer->run("
ALTER TABLE `{$installer->getTable('salesrule/coupon')}` ADD `customer_id` INT(10) NOT NULL AFTER `rule_id`;
");
$installer->endSetup();

