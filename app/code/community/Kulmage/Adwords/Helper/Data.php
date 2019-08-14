<?php
/**
 *
 * @package    Kulmage Google Adwords
 * @author     Kuldip, Magento Developer 
 */
class Kulmage_Adwords_Helper_Data extends Mage_Core_Helper_Abstract
{
	
	public function getOrderTotal()
	{
		$orderId = (int) Mage::getSingleton('checkout/session')->getLastOrderId();
    	
        $resurce = Mage::getModel('sales/order')->getResource();
        $select = $resurce->getReadConnection()->select()
            ->from(array('o' => $resurce->getTable('sales/order')), 'base_subtotal')
            ->where('o.entity_id=?', $orderId)
        ;
        
        $result = $resurce->getReadConnection()->fetchRow($select);
		print_r($result); die;
        
    	if($result['base_subtotal'] > 0)
        return round($result['base_subtotal'],2);
        else 
        return 1;
	}
	
	
	public function isTrackingAllowed()
    {
        return Mage::getStoreConfigFlag('adwordsmodule/kulmage/enabled');
    }


}