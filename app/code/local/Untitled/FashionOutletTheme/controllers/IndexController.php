<?php
class Untitled_FashionOutletTheme_IndexController extends Mage_Core_Controller_Front_Action
{
   public function indexAction()
	{
    	//Get current layout state 
    	$this->loadLayout();	
		$this->getLayout()->getBlock("head")->setTitle($this->__("News"));
		
		// Adding Breadcrumbs
	    $breadcrumbs = $this->getLayout()->getBlock("breadcrumbs");
      	$breadcrumbs->addCrumb("home", array(
                "label" => $this->__("Home Page"),
                "title" => $this->__("Home Page"),
                "link"  => Mage::getBaseUrl()
		   ));

      $breadcrumbs->addCrumb("news", array(
                "label" => $this->__("News"),
                "title" => $this->__("News")
		   ));
		   
		 // Adding Static Block  
		Mage::app()->setCurrentStore(Mage_Core_Model_App::ADMIN_STORE_ID);
		$title = 'Fashion Outlet News';
		$identifier = 'fashionoutlet_news';
		$content = 'Lorem ipsum dolor sit amet, mea doming dissentiet eu. Eum et delenit oportere. Ceteros signiferumque ex mea, cu mollis audire est. Te duo phaedrum senserit, in vero eligendi nam, ei nemore comprehensam nam. Quando dolore principes pro ex. Ei duo deleniti torquatos.';
	
		try{ 
		
		$isActive =  Mage::getModel('cms/block')->load($identifier)->getIsActive();
		//check if static block already exists
		if($isActive == 0)
		{
			
		$staticBlock = array(
                'title' => $title,
                'identifier' => $identifier,
                'content' => $content,
                'is_active' => 1,
                'stores' => array(1)
                ); 
		Mage::getModel('cms/block')->setData($staticBlock)->save(); 
		}
		}
		catch(Exception $e){
			Mage::getSingleton('core/session')->addError('Error creating static block');
		}
	   	//Release layout stream
    	$this->renderLayout();
	}
}