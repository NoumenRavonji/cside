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
use Application\Form\ComCatForm;
use Application\Controller\ControllerBasicWithAuthentication;

class ComCatsController extends ControllerBasicWithAuthentication
{
    protected $formName = 'ComCatForm';
    public $comCat;

    public function getComCat(){
        if($this->comCat == null){
            $this->comCat = $this->getServiceLocator()->get('Model\ComCat');
        }
        return $this->comCat;
    }

    //**********************************************************************************************************

    public function getDisplayFilter()
    {

        $this->displayFilter = array(
            'parent_com_cat_id' => $this->getServiceLocator()->get('Model\ComCat')->provideReference('id','com_cat_name'),
        );

        return $this->displayFilter;
    }


    //**********************************************************************************************************

    public function indexAction()
    {

        $data = null;
        $pageNavi = null;

        $pageNo = (int) $this->params()->fromRoute('id',0);

        //$form  = new comCatForm();
        $form = $this->getMyForm();

        $request = $this->getRequest();
        if($request->isPost()){
            //search
            $form->setData($request->getPost());
            $paginator = $this->getComCat()->search($pageNo, $request->getPost());
        }else{
            //index without search
            $paginator = $this->getComCat()->fetchAll($pageNo);
        }

        $data = $paginator->getCurrentItems();
        $pageNavi = $paginator->getPages();

        //make view
        //main view
        $mainView = new ViewModel();

        //sub view bread_crumb
        $previousPage = array(
            array('url' => 'index.html', 'name' => 'トップページ' ),
        );
        $currentPage = '企業業種一覧';
        $bread_crumb = new ViewModel(array(
                'previousPage' => $previousPage,
                'currentPage' => $currentPage,
            )
        );
        $bread_crumb->setTemplate('/element/bread_crumb.phtml');

        //sub view add_bar
        $tableName = '企業業種管理';

        $addButton  = array(
            'url' => array(
                'route' => 'master/default',
                'controller' => 'com_cats',
                'action' => 'add'
            ),
            //'name' => '企業業種新規追加',
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
            'com_cat_cd' => 'w10',
            'com_cat_name' => 'w40',
            'parent_com_cat_id' => 'w40',
        );
        $url = array(
            'route' => 'master/default',
            'controller' => 'com_cats',
            'action' => 'detail' 
        );

        $index_list = new ViewModel(array(
                'showList' => $showList,
                'data' => $data,
                'form' => $form,
                'url' => $url,
                'displayFilter' => $this->getDisplayFilter(),
            )
        );

        $index_list->setTemplate('/element/index_list_with_delete.phtml');

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
            'controller' => 'com_cats',
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
                'controller' => 'com_cats',
                'action' => 'index'
                )
            );
        }

        $data = $this->getComCat()->get($id);

        //main view
        $mainView = new ViewModel();

        //sub view bread_crumb
        $previousPage = array(
            array('url' => 'index.html', 'name' => 'トップページ' ),
            array('url' => array(
                    'route' => 'master/default',
                    'controller' => 'com_cats',
                    'action' => 'index' 
                ),
                'name' => '企業業種一覧',
            ),
        );
        $currentPage = '企業業種詳細';
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
            '企業業種コード' => 'com_cat_cd',
            '企業業種名' => 'com_cat_name', 
            '親企業業種コード' => 'parent_com_cat_id', 
        );

        $backButton = array(
            'url' => array(
                'route' => 'master/default',
                'controller' => 'com_cats',
                'action' => 'index' 
            ),
            //'name' => '戻る', 
        );

        $forwardButton = array(
            'url' => array(
                'route' => 'master/default',
                'controller' => 'com_cats',
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
                'displayFilter' => $this->getDisplayFilter(),
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

        $status = null;

        $id = (int) $this->params()->fromRoute('id', 0);

        $request = $this->getRequest();

        //there are totally five ways come to this editAction
        //1.when the '新規'(add) button is pressed on the index page
        //2.when the '編集'(edit) button is pressed on the detail page
        //3.when the '確認'(confirm) button is pressed on the add/edit page
        //4.when the '修正'(fix) button is pressed on the confirm page
        //5.when the '保存'(save) button is pressed on the confirm page
        if(!$request->isPost()){
            //add and edit are requested by 'get' method
            //these two status is distinguished by the id coming from the url
            //if add no id
            //if edit has an id
            $status = $id ? '編集' : '新規';
        }else{
            //confirm fix and save are requested by 'post' method , they can be distinguished by the submit button value
            //which is also the value on the submit button
            $status = $request->getPost()['submit'];
        }

        if($status == '保存'){

            $id = $request->getPost()['id'];

            //save to the database
            $result = $this->getComCat()->save($this->getRequest()->getPost(), $this->auth);

            if($result){
                if($id){
                    $this->flashMessenger()->addMessage($request->getPost()['com_cat_name'].'の編集が完了しました。');
                }else{
                    $this->flashMessenger()->addMessage($request->getPost()['com_cat_name'].'の新規追加が完了しました。');
                }
                
            }

            return $this->redirect()->toRoute('master/default',array(
                    'controller' => 'com_cats',
                    'action' => 'index',
                )
            );
        }

        //this form is shared by all the other four status
        $form = $this->getMyForm();

        //if the status is '新規'(add) nothing need to add to the form

        if($status == '確認'){
            $form->setData($request->getPost());
            $form->setInputFilter($this->getComCat()->getInputFilter());

            if($form->isValid()){

                $form->bind($request->getPost());
                $form = $this->unableMyForm();

            }else{

                //if the data didn't pass the validation the status can not be changed.
                $status = $id ? '編集' : '新規';
            }
        }
        
        if($status == '編集'){
            $companyScale = null;

            try {
                $companyScale = $this->getComCat()->get($id);
            }
            catch (\Exception $ex) {
                return $this->redirect()->toRoute('master/default',array(
                    'controller' => 'com_cats',
                    'action' => 'index'
                    )
                );
            }

            $form->bind($companyScale);
        }

        if($status == '修正'){
            $form->bind($request->getPost());
        }

        //edit mainView 
        $mainView = new ViewModel();

        //sub view bread_crumb
        $previousPage = null;
        $currentPage = null;

        //the bread_crumb should be changed due to the status
        if($status == '新規'){
            $previousPage = array(
                array('url' => 'index.html', 'name' => 'トップページ' ),
                array('url' => array(
                        'route' => 'master/default',
                        'controller' => 'com_cats',
                        'action' => 'index' ,
                        ),
                        'name' => '企業業種一覧',
                ),
            );
            $currentPage = '企業業種新規追加';
        }

        if($status == '編集'){
            $previousPage = array(
                array('url' => 'index.html', 'name' => 'トップページ' ),
                array('url' => array(
                        'route' => 'master/default',
                        'controller' => 'com_cats',
                        'action' => 'index' ,
                        ),
                        'name' => '企業業種一覧',
                ),
                array('url' => array(
                        'route' => 'master/default',
                        'controller' => 'com_cats',
                        'action' => 'detail',
                        'id' => $id,
                        ),
                        'name' => '企業業種詳細',
                ),
            );
            $currentPage = '企業業種詳細編集';
        }

        //if the status is '修正'(fix)
        //it should adjust the breadcrumb due to where fix should be origined from
        //it may be aimed to fix the data coming from '新規'(add)
        //it may be aimed to fix the data coming from '編集'(edit)
        //these two original can be distinguished by whether they have an id in the post data(coming from the form)
        if($status == '修正'){

            if($request->getPost()['id']){

                //fix the data coming from the edit
                $previousPage = array(
                    array('url' => 'index.html', 'name' => 'トップページ' ),
                    array('url' => array(
                            'route' => 'master/default',
                            'controller' => 'com_cats',
                            'action' => 'index' ,
                            ),
                            'name' => '企業業種一覧',
                    ),
                    array('url' => array(
                            'route' => 'master/default',
                            'controller' => 'com_cats',
                            'action' => 'detail',
                            'id' => $id,
                            ),
                            'name' => '企業業種詳細',
                    ),
                );
                $currentPage = '企業業種詳細編集';
            }else{

                //fix the data coming from the add
                $previousPage = array(
                    array('url' => 'index.html', 'name' => 'トップページ' ),
                    array('url' => array(
                            'route' => 'master/default',
                            'controller' => 'com_cats',
                            'action' => 'index' ,
                            ),
                            'name' => '企業業種一覧',
                    ),
                );
                $currentPage = '企業業種新規追加';
            }
        }

        //the '確認'(confirm) can also be origined from add and edit
        if($status == '確認'){
            if($request->getPost()['id']){

                $previousPage = array(
                    array('url' => 'index.html', 'name' => 'トップページ' ),
                    array('url' => array(
                            'route' => 'master/default',
                            'controller' => 'com_cats',
                            'action' => 'index' ,
                            ),
                            'name' => '企業業種一覧',
                    ),
                    array('url' => array(
                            'route' => 'master/default',
                            'controller' => 'com_cats',
                            'action' => 'detail',
                            'id' => $request->getPost()['id'],
                            ),
                            'name' => '企業業種詳細',
                    ),
                    array('url' => array(
                            'route' => 'master/default',
                            'controller' => 'com_cats',
                            'action' => 'edit',
                            'id' => $request->getPost()['id'],
                            ),
                            'name' => '企業業種編集',
                    ),
                );
                $currentPage = '企業業種詳細編集確認';

            }else{
                $previousPage = array(
                    array('url' => 'index.html', 'name' => 'トップページ' ),
                    array('url' => array(
                            'route' => 'master/default',
                            'controller' => 'com_cats',
                            'action' => 'index' ,
                            ),
                            'name' => '企業業種一覧',
                    ),
                    array('url' => array(
                            'route' => 'master/default',
                            'controller' => 'com_cats',
                            'action' => 'edit' ,
                            ),
                            'name' => '企業業種新規追加',
                    ),

                );
                $currentPage = '企業業種新規追加確認';
            }
        }

        $bread_crumb = new ViewModel(array(
                'previousPage' => $previousPage,
                'currentPage' => $currentPage,
            )
        );

        $bread_crumb->setTemplate('/element/bread_crumb.phtml');

        //sub view edit_list
        $itemList = array('com_cat_cd','com_cat_name','parent_com_cat_id');

        $backButton = null;
        $forwardButton = null;
        if($status == '新規'){
            $backButton = array(
                'url' => array(
                    'route' => 'master/default',
                    'controller' => 'com_cats',
                    'action' => 'index',
                ),
                'name' => '戻る', 
            );
            $forwardButton = array(
                'url' => array(
                    'route' => 'master/default',
                    'controller' => 'com_cats',
                    'action' => 'edit',
                    'id' =>  $id,
                ),
                'name' => '確認',
            );
        }

        if($status == '編集'){
            $backButton = array(
                'url' => array(
                    'route' => 'master/default',
                    'controller' => 'com_cats',
                    'action' => 'detail',
                    'id' =>$id,
                ),
                'name' => '戻る', 
            );
            $forwardButton = array(
                'url' => array(
                    'route' => 'master/default',
                    'controller' => 'com_cats',
                    'action' => 'edit',
                    'id' =>  $id,
                ),
                'name' => '確認',
            );
        }

        if($status == '修正'){

            if($request->getPost()['id']){
                $backButton = array(
                    'url' => array(
                        'route' => 'master/default',
                        'controller' => 'com_cats',
                        'action' => 'detail',
                        'id' => $request->getPost()['id'],
                    ),
                    'name' => '戻る',
                );
                $forwardButton = array(
                    'url' => array( 
                        'route' => 'master/default',
                        'controller' => 'com_cats',
                        'action' => 'edit',
                        'id' =>  $request->getPost()['id'],
                    ),
                    'name' => '確認',
                );
            }else{
                $backButton = array(
                    'url' => array(
                        'route' => 'master/default',
                        'controller' => 'com_cats',
                        'action' => 'index',
                    ),
                    'name' => '戻る',
                );
                $forwardButton = array(
                    'url' => array(
                        'route' => 'master/default',
                        'controller' => 'com_cats',
                        'action' => 'edit',
                    ),
                    'name' => '確認',
                );
            }
        }

        //for the submit button here there are some difference
        //as there are two bottons here,
        // the '修正'(fix) button which need to take all the data in the form to the add/edit page
        //(because the data now is still not in the database the data should be carried by the post)
        // the '保存'(save) button which need to take all the data in the form to add to the database
        // so the form should have two submit
        // by now the left one of the two buttons is just a common bottun which is used to redirect to other action
        //so we need to change this common bottun to a submit bottun
        if($status == '確認'){

            if($request->getPost()['id']){
                $backButton = array(
                    'url' => array(
                        'route' => 'master/default',
                        'controller' => 'com_cats',
                        'action' => 'edit',
                        'id' => $request->getPost()['id'],
                    ),
                    'name' => '修正',
                    //change the '修正'(fix) bottun to a submit bottun
                    'type' => 'submit',
                );
                $forwardButton = array(
                    'url' => array(
                        'route' => 'master/default',
                        'controller' => 'com_cats',
                        'action' => 'edit',
                        'id' =>  $request->getPost()['id'],
                    ),
                    'name' => '保存',
                );

            }else{
                $backButton = array(
                    'url' => array(
                        'route' => 'master/default',
                        'controller' => 'com_cats',
                        'action' => 'edit',
                    ),
                    'name' => '修正',
                    //change the '修正'(fix) bottun to a submit bottun
                    'type' => 'submit',
                );
                $forwardButton = array(
                    'url' => array(
                        'route' => 'master/default',
                        'controller' => 'com_cats',
                        'action' => 'edit',
                    ),
                    'name' => '保存',
                );
            }

        }

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

        return $this->redirect()->toRoute('master/default',array(
                'controller' => 'com_cats',
                'action' => 'edit',
            )
        );

    }

    public function deleteAction(){

        $id = (int) $this->params()->fromRoute('id', 0);

        if (!$id) {
            return $this->redirect()->toRoute('master/default',array(
                'controller' => 'com_cats',
                'action' => 'index'
                )
            );
        }

        $request = $this->getRequest();
        if($request->isPost()){

            //delete to the database
            $result = $this->getComCat()->delete($id, $this->auth);

            if($result){
                $this->flashMessenger()->addMessage('削除が完了しました。');
            }else{
                $this->flashMessenger()->addMessage('削除が失敗しました。');
            }

            return $this->redirect()->toRoute('master/default',array(
                    'controller' => 'com_cats',
                    'action' => 'index',
                )
            );

        }

        //main view
        $mainView = new ViewModel();

        //sub view bread_crumb
        $previousPage = array(
            array('url' => 'index.html', 'name' => 'トップページ' ),
            array('url' => array(
                    'route' => 'master/default',
                    'controller' => 'com_cats',
                    'action' => 'index' 
                ),
                'name' => '企業規模一覧',
            ),
        );
        $currentPage = '企業規模削除確認';
        $bread_crumb = new ViewModel(array(
                'previousPage' => $previousPage,
                'currentPage' => $currentPage,
            )
        );

        $bread_crumb->setTemplate('/element/bread_crumb.phtml');

        //sub view delete_confirm
        $recordCd = $this->getComCat()->get($id)['com_cat_cd'];

        $confirmButton = array(
            'url' => array(
                'route' => 'master/default',
                'controller' => 'com_cats',
                'action' => 'delete',
                'id' => $id,
            ),
            //'name' => '確認', 
        );

        $cancelButton = array(
            'url' => array(
                'route' => 'master/default',
                'controller' => 'com_cats',
                'action' => 'index',
            ),
            //'name' => 'キャンセル',
        );

        $delete_confirm = new ViewModel(array(
                'recordCd' => $recordCd,
                'confirmButton' => $confirmButton,
                'cancelButton' => $cancelButton,
            )
        );

        $delete_confirm->setTemplate('/element/delete_confirm.phtml');

        $mainView->addChild($bread_crumb,'bread_crumb')
            ->addChild($delete_confirm,'delete_confirm');

        return $mainView;
    }


}
