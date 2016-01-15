<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application;

use Zend\Mvc\ModuleRouteListener;
use Zend\Mvc\MvcEvent;
use Zend\Db\Adapter\Adapter;
use Zend\Db\TableGateway\Feature\GlobalAdapterFeature;
use Application\Model\AlbumModel;
use Application\Model\Data\AlbumTable;

use Application\Model\BranchModel;
use Application\Model\Data\MstBranchTable;
use Application\Form\BranchForm;

use Application\Model\InputSetListModel;
use Application\Model\Data\InputSetListTable;
use Application\Form\InputSetListForm;

use Application\Model\TmpFmtHeaderModel;
use Application\Model\Data\TmpFmtHeaderTable;
use Application\Form\TmpFmtHeaderForm;

use Application\Model\TmpInputHeaderModel;
use Application\Model\Data\TmpInputHeaderTable;
use Application\Form\TmpInputHeaderForm;

use Application\Model\TmpFmtDataModel;
use Application\Model\Data\TmpFmtDataTable;
use Application\Form\TmpFmtDataForm;

use Application\Model\TmpInputDataModel;
use Application\Model\Data\TmpInputDataTable;
use Application\Form\TmpInputDataForm;

use Application\Model\VcModel;
use Application\Model\Data\MstVcTable;
use Application\Form\VcForm;

use Application\Model\VendorModel;
use Application\Model\Data\MstVendorTable;
use Application\Form\VendorForm;

use Application\Model\ShopModel;
use Application\Model\Data\MstShopTable;
use Application\Form\ShopForm;

use Application\Model\PostModel;
use Application\Model\Data\MstPostTable;
use Application\Form\PostForm;

use Application\Model\CompanyScaleModel;
use Application\Model\Data\MstComGrdTable;
use Application\Form\CompanyScaleForm;

use Application\Model\ComCatModel;
use Application\Model\Data\MstComCatTable;
use Application\Form\ComCatForm;

use Application\Model\PlanCatModel;
use Application\Model\Data\MstPlanCatTable;
use Application\Form\PlanCatForm;

use Application\Model\PrefModel;
use Application\Model\Data\MstPrefTable;

use Application\Model\AreaModel;
use Application\Model\Data\MstAreaTable;
use Application\Form\AreaForm;

use Application\Model\FmModel;
use Application\Model\Data\MstFmTable;
use Application\Form\FmForm;

use Application\Model\IssueBaseSchModel;
use Application\Model\Data\MstIssueBaseSchTable;
use Application\Form\IssueBaseSchForm;

use Application\Form\LoginForm;

use Application\Model\StaffModel;
use Application\Model\Data\MstStaffTable;
use Application\Model\PasswordModel;
use Application\Model\Data\PasswordTable;

use Application\Model\Area;
use Application\Model\Data\MstArea;
use Application\Model\AuthModel;
use Zend\InputFilter\InputFilter;
use Application\Validator\Validator;

class Module
{
    public function onBootstrap(MvcEvent $e)
    {
        $eventManager        = $e->getApplication()->getEventManager();
        $moduleRouteListener = new ModuleRouteListener();
        $moduleRouteListener->attach($eventManager);

        //追加
        $this->createDbAdapter($e);

        $e->getApplication()->getEventManager()->getSharedManager()
            ->attach('Zend\Mvc\Controller\AbstractActionController', 'dispatch', function($e) {
                    $controller = $e->getTarget();

                    if(get_class($controller) != 'Application\Controller\AuthenticationController' ){
                        $controller->preDispatch();
                    }

                }, 100);

        $e->getApplication()->getEventManager()->getSharedManager()
            ->attach('Zend\Mvc\Controller\AbstractActionController', 'dispatch', function($e) {
                    $controller = $e->getTarget();

                    if(get_class($controller) != 'Application\Controller\AuthenticationController' ){
                        $controller->layout()->USER = $controller->postDispatch();
                    }

                }, 0);
    }

    //追加
    protected function createDbAdapter(MvcEvent $e)
    {
        $config = $e->getApplication()->getConfig();
        $adapter = new Adapter($config['db']);
        GlobalAdapterFeature::setStaticAdapter($adapter);
    }

    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }

    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }

    // getAutoloaderConfig() and getConfig() methods here

    // Add this method:
    public function getServiceConfig()
    {

        return array(
            'factories' => array(
                'Model\Branch' =>  function($sm) {
                    $data = array('branchTable' => new MstBranchTable(), );
                    $branch = new BranchModel($data);
                    $inputFilter = $this->getInputFilter('branch');
                    $branch->setInputFilter($inputFilter);
                    return $branch;
                },
                'Model\InputSetList' =>  function($sm) {
                    $data = array('inputSetListTable' => new InputSetListTable(), );
                    $inputSetList = new InputSetListModel($data);
                    $inputFilter = $this->getInputFilter('inputSetList');
                    $inputSetList->setInputFilter($inputFilter);
                    return $inputSetList;
                },
                'Model\TmpInputHeader' =>  function($sm) {
                    $data = array('tmpInputHeaderTable' => new TmpInputHeaderTable(), );
                    $tmpInputHeader = new TmpInputHeaderModel($data);
                    $inputFilter = $this->getInputFilter('tmpInputHeader');
                    $tmpInputHeader->setInputFilter($inputFilter);
                    return $tmpInputHeader;
                },
                'Model\TmpFmtHeader' =>  function($sm) {
                    $data = array('tmpFmtHeaderTable' => new TmpFmtHeaderTable(), );
                    $tmpFmtHeader = new tmpFmtHeaderModel($data);
                    $inputFilter = $this->getInputFilter('tmpFmtHeader');
                    $tmpFmtHeader->setInputFilter($inputFilter);
                    return $tmpFmtHeader;
                },
                'Model\TmpFmtData' =>  function($sm) {
                    $data = array('tmpFmtDataTable' => new TmpFmtDataTable(), );
                    $tmpFmtData = new TmpFmtDataModel($data);
                    $inputFilter = $this->getInputFilter('tmpFmtData');
                    $tmpFmtData->setInputFilter($inputFilter);
                    return $tmpFmtData;
                },
                'Model\TmpInputData' =>  function($sm) {
                    $data = array('tmpInputDataTable' => new TmpInputDataTable(), );
                    $tmpInputData = new TmpInputDataModel($data);
                    $inputFilter = $this->getInputFilter('tmpInputData');
                    $tmpInputData->setInputFilter($inputFilter);
                    return $tmpInputData;
                },
                'Model\Vc' =>  function($sm) {
                    $data = array('vcTable' => new MstVcTable(), );
                    $vc = new VcModel($data);
                    $inputFilter = $this->getInputFilter('vc');
                    $vc->setInputFilter($inputFilter);
                    return $vc;
                },
                'Model\Vendor' =>  function($sm) {
                    $data = array('vendorTable' => new MstVendorTable(), );
                    $vendor = new VendorModel($data);
                    $inputFilter = $this->getInputFilter('vendor');
                    $vendor->setInputFilter($inputFilter);
                    return $vendor;
                },
                'Model\Shop' =>  function($sm) {
                    $data = array('shopTable' => new MstShopTable(), );
                    $shop = new ShopModel($data);
                    $inputFilter = $this->getInputFilter('shop');
                    $shop->setInputFilter($inputFilter);
                    return $shop;
                },
                'Model\CompanyScale' =>  function($sm) {
                    $data = array('companyScaleTable' => new MstComGrdTable(), );
                    $companyScale = new CompanyScaleModel($data);
                    $inputFilter = $this->getInputFilter('companyScale');
                    $companyScale->setInputFilter($inputFilter);
                    return $companyScale;
                },
                'Model\PlanCat' =>  function($sm) {
                    $data = array('planCatTable' => new MstPlanCatTable(), );
                    $planCat = new PlanCatModel($data);
                    $inputFilter = $this->getInputFilter('planCat');
                    $planCat->setInputFilter($inputFilter);
                    return $planCat;
                },
                'Model\Area' =>  function($sm) {
                    $data = array('areaTable' => new MstAreaTable(), );
                    $area = new AreaModel($data);
                    $inputFilter = $this->getInputFilter('area');
                    $area->setInputFilter($inputFilter);
                    return $area;
                },
                'Model\Fm' =>  function($sm) {
                    $data = array('fmTable' => new MstFmTable(), );
                    $fm = new FmModel($data);
                    $inputFilter = $this->getInputFilter('fm');
                    $fm->setInputFilter($inputFilter);
                    return $fm;
                },
                'Model\IssueBaseSch' =>  function($sm) {
                    $data = array('issueBaseSchTable' => new MstIssueBaseSchTable(), );
                    $issueBaseSch = new IssueBaseSchModel($data);
/*                    $inputFilter = $this->getInputFilter('fm');
                    $issueBaseSch->setInputFilter($inputFilter);*/
                    return $issueBaseSch;
                },
                'Model\ComCat' =>  function($sm) {
                    $data = array('comCatTable' => new MstComCatTable(), );
                    $comCat = new ComCatModel($data);
                    $inputFilter = $this->getInputFilter('comCat');
                    $comCat->setInputFilter($inputFilter);
                    return $comCat;
                },
                'Model\Post' =>  function($sm) {
                    $data = array('postTable' => new MstPostTable(), );
                    $post= new PostModel($data);
                    $inputFilter = $this->getInputFilter('post');
                    $post->setInputFilter($inputFilter);
                    return $post;
                },
                'Model\Pref' =>  function($sm) {
                    $data = array('prefTable' => new MstPrefTable(), );
                    $pref = new PrefModel($data);
                    return $pref;
                },
                'Model\Password' =>  function($sm) {
                    $data = array('passwordTable' => new PasswordTable(), );
                    $password = new PasswordModel($data);
                    return $password;
                },
                'Model\Staff' =>  function($sm) {
                    $data = array('mstStaffTable' => new MstStaffTable(), );
                    $staff = new StaffModel($data);
                    return $staff;
                },
                'Model\Auth' =>  function($sm) {
                    $auth = new AuthModel();
                    $auth->setStaffModel($sm->get('Model\Staff'));
                    $auth->setPasswordModel($sm->get('Model\Password'));
                    $auth->setBranchModel($sm->get('Model\Branch'));
                    $auth->setInputSetListModel($sm->get('Model\InputSetList'));
                    $auth->setTmpFmtHeaderModel($sm->get('Model\TmpFmtHeader'));
                    $auth->setTmpFmtDataModel($sm->get('Model\TmpFmtData'));
                    $auth->setTmpInputDataModel($sm->get('Model\TmpInputData'));
                    $auth->setVcModel($sm->get('Model\Vc'));
                    $auth->setVendorModel($sm->get('Model\Vendor'));
                    $auth->setShopModel($sm->get('Model\Shop'));
                    $auth->setShopModel($sm->get('Model\Shop'));
                    $inputFilter = $this->getInputFilter('authentication');
                    $auth->setInputFilter($inputFilter);
                    return $auth;
                },


                //FormClass
                'Form\BranchForm' =>  function($sm) {
                    return new BranchForm();
                },
                'Form\InputSetListForm' =>  function($sm) {
                    return new InputSetListForm();
                },
                'Form\VcForm' =>  function($sm) {
                    return new VcForm();
                },
                'Form\TmpFmtHeaderForm' =>  function($sm) {
                    return new TmpFmtHeaderForm();
                },
                'Form\TmpInputHeaderForm' =>  function($sm) {
                    return new TmpInputHeaderForm();
                },
                'Form\TmpFmtDataForm' =>  function($sm) {
                    return new TmpFmtDataForm();
                },
                'Form\TmpInputDataForm' =>  function($sm) {
                    return new TmpInputDataForm();
                },
                'Form\VendorForm' =>  function($sm) {
                    return new VendorForm();
                },
                'Form\ShopForm' =>  function($sm) {
                    return new ShopForm();
                },
                'Form\CompanyScaleForm' =>  function($sm) {
                    return new CompanyScaleForm();
                },
                'Form\PlanCatForm' =>  function($sm) {
                    return new PlanCatForm();
                },
                'Form\AreaForm' =>  function($sm) {
                    return new AreaForm();
                },
                'Form\FmForm' =>  function($sm) {
                    return new FmForm();
                },
                'Form\ComCatForm' =>  function($sm) {
                    return new ComCatForm();
                },
                'Form\PostForm' =>  function($sm) {
                    return new PostForm();
                },
                'Form\LoginForm' =>  function($sm) {
                    return new LoginForm();
                },
            ),
        );
    }

    public function getViewHelperConfig()
    {
        return array(
            'invokables' => array(
                'getUrl' => 'Application\View\Helper\GetUrlHelper',
            ),
        );
    }

    public function getInputFilter($name)
    {
        require 'inputFilter.config.php';

        $inputFilter = new InputFilter();
        
        $lst = $inputFilters[$name];
        foreach ($lst as $value) {
            $inputFilter->add($value);
        }
        
        return $inputFilter;
    }
}
