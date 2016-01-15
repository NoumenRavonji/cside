<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application\Controller;

use Zend\View\Model\ViewModel;
use Application\Model\AuthModel;
use Application\Form\LoginForm;


class AuthenticationController extends ControllerBasic
{

    protected $formName = 'LoginForm';
	public $dbAdapter;
	public $auth;

	public function getAuth()
	{
		if(!$this->auth){
			$this->auth = $this->getServiceLocator()->get('Model\Auth');
		}
		return $this->auth;
	}

	public function getDbAdapter()
	{
		if(!$this->dbAdapter){
			$this->dbAdapter = $this->getServiceLocator()->get('Zend\Db\Adapter\Adapter');
		}
		return $this->dbAdapter;
	}

    public function loginAction()
    {

    	$message = $this->getMessage();

    	//$form = new LoginForm();
        $form = $this->getMyForm();

    	$request = $this->getRequest();
    	if($request->isPost()){

    		$auth = $this->getAuth();

    		$form->setInputFilter($auth->getInputFilter());
    		$form->setData($request->getPost());

    		if($form->isValid()){
    			
    			try{
    				$auth->login($request->getPost());

    				return $this->redirect()->toRoute(
    						'application',
    						array(
    							'controller' => 'index',
    							'action' => 'index'
    						)
    					);

    			}catch(\Exception $e){
                    $message = $e->getMessage();
    				//$this->flashMessenger()->addMessage($e->getMessage());
    			}
    		}
    	}

    	$values = array(
    		'form' => $form,
    		'message' => $message
    	);

        $mainView = new ViewModel($values);
        $this->layout('layout/layout_login.phtml');

        return $mainView;
    }

    public function logoutAction()
    {
        $auth = $this->getAuth();
        $auth->logout();

        $this->flashMessenger()->addMessage("ログアウトしました。");

        return $this->redirect()->toRoute('application/default',array(
                'controller' => 'Authentication',
                'action' => 'login'
            )
        );

    }
}
