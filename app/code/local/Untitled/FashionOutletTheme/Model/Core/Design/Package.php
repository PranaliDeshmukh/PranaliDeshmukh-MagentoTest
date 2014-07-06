<?php 
class Untitled_FashionOutletTheme_Model_Core_Design_Package extends Mage_Core_Model_Design_Package
{
   public function setPackageName($name = '')
    {
		$name = 'fashionoutlet';
        if (empty($name)) {
            // see, if exceptions for user-agents defined in config
            $customPackage = $this->_checkUserAgentAgainstRegexps('design/package/ua_regexp');
            if ($customPackage) {
                $this->_name = $customPackage;
            }
            else {
                $this->_name = Mage::getStoreConfig('design/package/name', $this->getStore());
            }
        }
        else {
            $this->_name = $name;
        }
        // make sure not to crash, if wrong package specified
        if (!$this->designPackageExists($this->_name, $this->getArea())) {
            $this->_name = self::DEFAULT_PACKAGE;
        }
        return $this;
    }
	
	 }