<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Application\Model\Branch;
use Application\Form\BranchForm;
use Application\Model\Shop;
use Application\Form\ShopForm;
use Application\Model\Staff;
use Application\Form\StaffForm;

class ControllerBasic extends AbstractActionController
{

    protected $formName;
    private $myForm;
    private $displayFilter;

    public function getDisplayFilter()
    {
        return $this->displayFilter;
    }

    public function getMyForm(){
        if($this->myForm == null){
            $this->myForm = $this->getServiceLocator()->get('Form\\'.$this->formName);
        }

        $elements = $this->myForm->getElements();

        foreach ($elements as $element) {
            if ($element instanceof \Zend\Form\Element\Text) {
                $element->setValue('');
            }
        }

        $displayFilter = $this->getDisplayFilter();

        if( $displayFilter && (count($displayFilter) > 0)){

            foreach ($displayFilter as $id => $displayNameList) {
                $this->myForm->get($id)->setValueOptions($displayNameList);
            }

        }

        return $this->myForm;
    }

    public function unableMyForm(){

        $elements = $this->myForm->getElements();

        foreach ($elements as $element) {
            if (!$element instanceof \Zend\Form\Element\Hidden && !$element instanceof \Zend\Form\Element\Submit) {
                $element->setAttributes(array('readonly' => 'true', ));
                
                if ($element instanceof \Zend\Form\Element\Select || $element instanceof \Zend\Form\Element\Radio ) {
                    $selectedValue = $element->getValue();
                    $options = $element->getValueOptions();
                    $selectedOption = null;
                    foreach ($options as $value => $name) {
                        if($selectedValue == $value){
                            $selectedOption[$value] = $name;
                        }
                    }
                    $element->setAttributes(array('class' => 'readonly', ));
                    $element->setValueOptions($selectedOption);
                }
            }
        }

        return $this->myForm;
    }

    public function getMessage()
    {
        $message = '';

        $flashMessenger = $this->flashMessenger();

        if($flashMessenger->hasMessages()){
            $message_array = $flashMessenger->getMessages();
            $message = $message_array[0];
        }

        return $message;
        
    }

}
