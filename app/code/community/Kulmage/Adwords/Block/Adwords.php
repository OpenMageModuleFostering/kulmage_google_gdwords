<?php
/**
 *
 * @package    Kulmage Google Adwords
 * @author     Kuldip, Magento Developer 
 */
class Kulmage_Adwords_Block_Adwords extends Mage_Core_Block_Abstract
{

	public function __construct()
    {
    	parent::__construct();
    	$this->setGoogleConversionId(Mage::getStoreConfig('adwordsmodule/kulmage/google_conversion_id'));
    	$this->setGoogleConversionLanguage(Mage::getStoreConfig('adwordsmodule/kulmage/google_conversion_language'));
    	$this->setGoogleConversionFormat(Mage::getStoreConfig('adwordsmodule/kulmage/google_conversion_format'));
    	$this->setGoogleConversionColor(Mage::getStoreConfig('adwordsmodule/kulmage/google_conversion_color'));
    	$this->setGoogleConversionLabel(Mage::getStoreConfig('adwordsmodule/kulmage/google_conversion_label'));
    }
	
	
	protected function _toHtml()
   {
   	$html = "";
   	
   	if(Mage::helper('kulmage_adwords')->isTrackingAllowed()){
   		
   	$this->setAmount(Mage::helper('kulmage_adwords')->getOrderTotal());
   	$html .= '
   	<!-- Google Code for Purchase Conversion Page -->
	<script type="text/javascript">
	/* <![CDATA[ */
	var google_conversion_id = '.$this->getGoogleConversionId().';
	var google_conversion_language = "'.$this->getGoogleConversionLanguage().'";
	var google_conversion_format = "'.$this->getGoogleConversionFormat().'";
	var google_conversion_color = "'.$this->getGoogleConversionColor().'";
	var google_conversion_label = "'.$this->getGoogleConversionLabel().'";
	var google_conversion_value = 0;
	if ('.$this->getAmount().') {
  	google_conversion_value = '.$this->getAmount().';
	}
	/* ]]> */
	</script>
	<script type="text/javascript" src="http://www.googleadservices.com/pagead/conversion.js">
	</script>
	<noscript>
	<div style="display:inline;">
	<img height="1" width="1" style="border-style:none;" alt="" src="http://www.googleadservices.com/pagead/conversion/'.$this->getGoogleConversionId().'/?value='.$this->getAmount().'&amp;label='.$this->getGoogleConversionLabel().'&amp;guid=ON&amp;script=0"/>
	</div>
	</noscript>';
   	}
   	
   	return $html;
   }
}
