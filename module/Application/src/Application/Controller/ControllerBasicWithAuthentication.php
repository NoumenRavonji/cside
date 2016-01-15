<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application\Controller;

class ControllerBasicWithAuthentication extends ControllerBasic
{
    protected $auth;

    public function preDispatch()
    {

        $this->auth = $this->getServiceLocator()->get('Model\Auth');
        if(!$this->auth->isLogin()){

            return $this->redirect()->toRoute('application/default',array(
                'controller' => 'Authentication',
                'action' => 'login'
                )
            );

        }

    }

    public function postDispatch()
    {

        return $this->auth->getLoginUser();

    }


}