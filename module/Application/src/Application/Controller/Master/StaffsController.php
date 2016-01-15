<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application\Controller\Master;

use Zend\View\Model\ViewModel;
use Application\Form\StaffForm;
use Application\Controller\ControllerBasicWithAuthentication;

class StaffsController extends ControllerBasicWithAuthentication
{
    public $staff;

    public function getStaff(){
        if($this->staff == null){
            $this->staff = $this->getServiceLocator()->get('Model\Staff');
        }
        return $this->staff;
    }

    public function indexAction()
    {

        $data = null;
        $pageNavi = null;

        $pageNo = (int) $this->params()->fromRoute('id',0);

        $form  = new StaffForm();

        $request = $this->getRequest();
        if($request->isPost()){
            //search
            $form->setData($request->getPost());
            $paginator = $this->getStaff()->search($pageNo, $request->getPost());
        }else{
            //index without search
            $paginator = $this->getStaff()->fetchAll($pageNo);
        }

        $data = $paginator->getCurrentItems();
        $pageNavi = $paginator->getPages();

        //make view
        //main view
        $mainView = new ViewModel();

        //sub view bread_crumb
        $previousPage = array(
            array('url' => 'index', 'name' => 'トップページ' ),
        );
        $currentPage = '社員管理(管理本部)';
        $bread_crumb = new ViewModel(array(
                'previousPage' => $previousPage,
                'currentPage' => $currentPage,
            )
        );
        $bread_crumb->setTemplate('/element/bread_crumb.phtml');

        //sub view search_bar
        $searchItems = array('staff_cd','staff_name');
        $searchButton  = array(
            'url' => array(
                'route' => 'master/default',
                'controller' => 'staffs',
                'action' => 'index' 
            ),
            //'name' => '検索',
        );

        $search_bar = new ViewModel(array(
                'searchItems' => $searchItems,
                'form' => $form,
                'searchButton' => $searchButton,
            )
        );

        $search_bar->setTemplate('/element/search_bar.phtml');

        //sub view add_bar
        $tableName = 'スタッフ管理';

        $addButton  = array(
            'url' => array(
                'route' => 'master/default',
                'controller' => 'staffs',
                'action' => 'add'
            ),
            //'name' => '新規追加',
        );

        $add_bar = new ViewModel(array(
                'tableName' => $tableName,
                'addButton' => $addButton,
            )
        );

        $add_bar->setTemplate('/element/add_bar.phtml');

        //sub view message_bar
        $message_bar = new ViewModel(array(
                'message' => $this->getMessage(),
            )
        );

        $message_bar->setTemplate('/element/message_bar.phtml');

        //sub view index_list
        $showList = array(
            'staff_cd' => 'w10',
            'staff_email' => 'w15',
            'staff_name' => 'w30',
            'post_id' => 'w30',
            'enroll_knd' => 'w15',
        );
        $url = array(
            'route' => 'master/default',
            'controller' => 'staffs',
            'action' => 'detail' 
        );

        $index_list = new ViewModel(array(
                'showList' => $showList,
                'data' => $data,
                'form' => $form,
                'url' => $url,
            )
        );

        $index_list->setTemplate('/element/index_list.phtml');

        //sub view paginator
        $labels = array(
            //'of' => 'of',
            //'First' => 'First',
            //'Previous' => '< Previous',
            //'Next' => 'Next >',
            //'Last' => 'Last',
            //'separator' => ' | ',
        );
        $url = array(
            'route' => 'master/default',
            'controller' => 'staffs',
            'action' => 'index' 
        );

        $paginator_bar = new ViewModel(array(
                'pageNavi' => $pageNavi,
                'lables' => $labels,
                'url' => $url,
            )
        );

        $paginator_bar->setTemplate('/element/paginator_bar.phtml');

        //add child view to the main view
        $mainView->addChild($bread_crumb,'bread_crumb')
            ->addChild($search_bar,'search_bar')
            ->addChild($add_bar,'add_bar')
            ->addChild($message_bar,'message_bar')
            ->addChild($index_list,'index_list')
            ->addChild($paginator_bar,'paginator_bar');

        return $mainView;
    }

    public function detailAction()
    {   

        $message = $this->getMessage();

    	$id = (int) $this->params()->fromRoute('id', 0);
        if (!$id) {
            return $this->redirect()->toRoute('master/default',array(
                'controller' => 'staffs',
                'action' => 'index'
                )
            );
        }

        $data = $this->getStaff()->get($id);

        //main view
        $mainView = new ViewModel();

        //sub view bread_crumb
        $previousPage = array(
            array('url' => 'index', 'name' => 'トップページ' ),
            array('url' => array(
                    'route' => 'master/default',
                    'controller' => 'staffs',
                    'action' => 'index' 
                ),
                'name' => '営業所一覧',
            ),
        );
        $currentPage = '社員詳細';
        $bread_crumb = new ViewModel(array(
                'previousPage' => $previousPage,
                'currentPage' => $currentPage,
            )
        );

        $bread_crumb->setTemplate('/element/bread_crumb.phtml');

        //sub view message_bar
        $message_bar = new ViewModel(array(
                'message' => $message,
            )
        );

        $message_bar->setTemplate('/element/message_bar.phtml');

        //sub view detail_list
        $detailList = array(
            '社員コード' => 'staff_cd',
            'メールアドレス' => 'staff_email', 
            '氏名' => 'staff_name', 
            '営業所' => 'post_id', 
            '在籍区分' => 'enroll_knd', 
            '端末番号' => 'staff_tel', 
        );

        $backButton = array(
            'url' => array(
                'route' => 'master/default',
                'controller' => 'staffs',
                'action' => 'index' 
            ),
            //'name' => '戻る', 
        );

        $forwardButton = array(
            'url' => array(
                'route' => 'master/default',
                'controller' => 'staffs',
                'action' => 'edit',
                'id' =>  $id,
            ),
            //'name' => '編集',
        );

        $detail_list = new ViewModel(array(
                'detailList' => $detailList,
                'data' => $data,
                'backButton' => $backButton,
                'forwardButton' => $forwardButton,
            )
        );

        $detail_list->setTemplate('/element/detail_list.phtml');

        $mainView->addChild($bread_crumb,'bread_crumb')
            ->addChild($message_bar,'message_bar')
            ->addChild($detail_list,'detail_list');

        return $mainView;
    }

    public function editAction()
    {
        $staff = null;

        $id = (int) $this->params()->fromRoute('id', 0);

        if (!$id) {
            return $this->redirect()->toRoute('master/default',array(
                'controller' => 'staffs',
                'action' => 'index'
                )
            );
        }

        try {
            $staff = $this->getStaff()->get($id);
        }
        catch (\Exception $ex) {
            return $this->redirect()->toRoute('master/default',array(
                'controller' => 'staffs',
                'action' => 'index'
                )
            );
        }

        $form  = new StaffForm();
        $form->bind($staff);

        $request = $this->getRequest();
        if($request->isPost()){

            $form->setInputFilter($this->getStaff()->getInputFilter());
            $form->setData($request->getPost());

            if($form->isValid()){

                $result = $this->getStaff()->save($form->getData());

                if($result){
                    $this->flashMessenger()->addMessage($staff['staff_name'].'の編集が完了しました。');
                }

                return $this->redirect()->toRoute('master/default',array(
                        'controller' => 'staffs',
                        'action' => 'detail',
                        'id' => $id,
                    )
                );
            }

        }

        //edit mainView 
        $mainView = new ViewModel();

        //sub view bread_crumb
        $previousPage = array(
            array('url' => 'index', 'name' => 'トップページ' ),
            array('url' => array(
                    'route' => 'master/default',
                    'controller' => 'staffs',
                    'action' => 'index' ,
                    ),
                    'name' => '営業所一覧',
            ),
            array('url' => array(
                    'route' => 'master/default',
                    'controller' => 'staffs',
                    'action' => 'detail',
                    'id' => $id,
                    ),
                    'name' => '営業所詳細',
            ),
        );
        $currentPage = '営業所詳細編集';
        $bread_crumb = new ViewModel(array(
                'previousPage' => $previousPage,
                'currentPage' => $currentPage,
            )
        );

        $bread_crumb->setTemplate('/element/bread_crumb.phtml');

        //sub view edit_list
        $itemList = array(
                    'staff_cd',
                    'staff_name',
                    'post_id',
                    'enroll_knd',
                    'staff_email',
                    'staff_tel'
                    );

        $backButton = array(
            'url' => array(
                'route' => 'master/default',
                'controller' => 'staffs',
                'action' => 'detail',
                'id' =>$id,
            ),
            //'name' => '戻る', 
        );

        $forwardButton = array(
            'url' => array(
                'route' => 'master/default',
                'controller' => 'staffs',
                'action' => 'edit',
                'id' =>  $id,
            ),
            //'name' => '編集',
        );

        $edit_list = new ViewModel(array(
                'itemList' => $itemList,
                'form' => $form,
                'backButton' => $backButton,
                'forwardButton' => $forwardButton,
            )
        );

        $edit_list->setTemplate('/element/edit_list.phtml');

        $mainView->addChild($bread_crumb,'bread_crumb')
                ->addChild($edit_list,'edit_list');


        return $mainView;

    }


    public function addAction()
    {
        $staff = null;
        $id = null;

        $form  = new staffForm();

        $request = $this->getRequest();
        if($request->isPost()){

            $form->setInputFilter($this->getStaff()->getInputFilter());
            $form->setData($request->getPost());

            if($form->isValid()){

                $result = $this->getStaff()->save($form->getData());

                if($result){
                    $this->flashMessenger()->addMessage($request->getPost()['staff_name'].'の新規登録が完了しました。');
                }

                return $this->redirect()->toRoute('master/default',array(
                        'controller' => 'staffs',
                        'action' => 'index',
                    )
                );
            }

        }

        //edit mainView 
        $mainView = new ViewModel();

        //sub view bread_crumb
        $previousPage = array(
            array('url' => 'index', 'name' => 'トップページ' ),
            array('url' => array(
                    'route' => 'master/default',
                    'controller' => 'staffs',
                    'action' => 'index' ,
                    ),
                    'name' => '営業所一覧',
            ),
        );
        $currentPage = '営業所新規追加';
        $bread_crumb = new ViewModel(array(
                'previousPage' => $previousPage,
                'currentPage' => $currentPage,
            )
        );

        $bread_crumb->setTemplate('/element/bread_crumb.phtml');

        //sub view edit_list
        $itemList = array(
                        'staff_cd',
                        'staff_email',
                        'staff_name',
                        'branch_id',
                        'post_id',
                        'enroll_knd',
                        'staff_kana',
                        'staff_tel');

        $backButton = array(
            'url' => array(
                'route' => 'master/default',
                'controller' => 'staffs',
                'action' => 'index',
            ),
            //'name' => '戻る', 
        );

        $forwardButton = array(
            'url' => array(
                'route' => 'master/default',
                'controller' => 'staffs',
                'action' => 'add',
                'id' =>  $id,
            ),
            //'name' => '編集',
        );

        $edit_list = new ViewModel(array(
                'itemList' => $itemList,
                'form' => $form,
                'backButton' => $backButton,
                'forwardButton' => $forwardButton,
            )
        );

        $edit_list->setTemplate('/element/edit_list.phtml');

        $mainView->addChild($bread_crumb,'bread_crumb')
                ->addChild($edit_list,'edit_list');


        return $mainView;
    }

}
