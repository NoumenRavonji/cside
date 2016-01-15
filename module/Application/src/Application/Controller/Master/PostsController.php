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
use Application\Form\PostForm;
use Application\Controller\ControllerBasicWithAuthentication;

class PostsController extends ControllerBasicWithAuthentication
{
    protected $formName = 'PostForm';

    public $post;

    public function getPost(){
        if($this->post == null){
            $this->post = $this->getServiceLocator()->get('Model\post');
        }
        return $this->post;
    }

    public function indexAction()
    {

        $data = null;
        $pageNavi = null;

        $pageNo = (int) $this->params()->fromRoute('id',0);

        $form  = $this->getMyForm();

        $request = $this->getRequest();
        if($request->isPost()){
            //search
            $form->setData($request->getPost());
            $paginator = $this->getPost()->search($pageNo, $request->getPost());
        }else{
            //index without search
            $paginator = $this->getPost()->fetchAll($pageNo);
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
        $currentPage = '役職一覧';
        $bread_crumb = new ViewModel(array(
                'previousPage' => $previousPage,
                'currentPage' => $currentPage,
            )
        );
        $bread_crumb->setTemplate('/element/bread_crumb.phtml');

        //sub view search_bar
        /*$searchItems = array('post_cd','post_name');
        $searchButton  = array(
            'url' => array(
                'route' => 'master/default',
                'controller' => 'posts',
                'action' => 'index' 
            ),
            'name' => '検索',
        );

        $search_bar = new ViewModel(array(
                'searchItems' => $searchItems,
                'form' => $form,
                'searchButton' => $searchButton,
            )
        );

        $search_bar->setTemplate('/element/search_bar.phtml');*/

        //sub view add_bar
        $tableName = '役職管理';

        $addButton  = array(
            'url' => array(
                'route' => 'master/default',
                'controller' => 'posts',
                'action' => 'edit'
            ),
            'name' => '新規追加',
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
            'post_cd' => 'w10',
            'post_name' => 'w15',
          
        );
        $url = array(
            'route' => 'master/default',
            'controller' => 'posts',
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
            'controller' => 'podtd',
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

    	$id = (int) $this->params()->fromRoute('id', 0);
        if (!$id) {
            return $this->redirect()->toRoute('master/default',array(
                'controller' => 'posts',
                'action' => 'index'
                )
            );
        }

        $data = $this->getPost()->get($id);

        //main view
        $mainView = new ViewModel();

        //sub view bread_crumb
        $previousPage = array(
            array('url' => 'index.html', 'name' => 'トップページ' ),
            array('url' => array(
                    'route' => 'master/default',
                    'controller' => 'posts',
                    'action' => 'index' 
                ),
                'name' => '役職一覧',
            ),
        );
        $currentPage = '役職詳細';
        $bread_crumb = new ViewModel(array(
                'previousPage' => $previousPage,
                'currentPage' => $currentPage,
            )
        );

        $bread_crumb->setTemplate('/element/bread_crumb.phtml');

        //sub view detail_list
        $detailList = array(
            '役職コード' => 'post_cd',
            '役職名' => 'post_name', 
          
        );

        $backButton = array(
            'url' => array(
                'route' => 'master/default',
                'controller' => 'posts',
                'action' => 'index' 
            ),
            'name' => '戻る', 
        );

        $forwardButton = array(
            'url' => array(
                'route' => 'master/default',
                'controller' => 'posts',
                'action' => 'edit',
                'id' =>  $id,
            ),
            'name' => '編集',
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
            $result = $this->getPost()->save($this->getRequest()->getPost(), $this->auth);

            if($result){
                if($id){
                    $this->flashMessenger()->addMessage($request->getPost()['post_name'].'の編集が完了しました。');
                }else{
                    $this->flashMessenger()->addMessage($request->getPost()['post_name'].'の新規追加が完了しました。');
                }
                
            }

            return $this->redirect()->toRoute('master/default',array(
                    'controller' => 'posts',
                    'action' => 'index',
                )
            );
        }

        //this form is shared by all the other four status
        $form = $this->getMyForm();
     
        //if the status is '新規'(add) nothing need to add to the form

        if($status == '確認'){
            $form->setData($request->getPost());
            $form->setInputFilter($this->getPost()->getInputFilter());

            if($form->isValid()){

                $form->bind($request->getPost());
                $form = $this->unableMyForm();

            }else{

                //if the data didn't pass the validation the status can not be changed.
                $status = $id ? '編集' : '新規';
            }
        }
        
        if($status == '編集'){
            $post = null;

            try {
                $post = $this->getPost()->get($id);
            }
            catch (\Exception $ex) {
                return $this->redirect()->toRoute('master/default',array(
                    'controller' => 'posts',
                    'action' => 'index'
                    )
                );
            }

            $form->bind($post);
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
                        'controller' => 'posts',
                        'action' => 'index' ,
                        ),
                        'name' => '役職一覧',
                ),
            );
            $currentPage = '役職新規追加';
        }

        if($status == '編集'){
            $previousPage = array(
                array('url' => 'index.html', 'name' => 'トップページ' ),
                array('url' => array(
                        'route' => 'master/default',
                        'controller' => 'posts',
                        'action' => 'index' ,
                        ),
                        'name' => '役職一覧',
                ),
                array('url' => array(
                        'route' => 'master/default',
                        'controller' => 'posts',
                        'action' => 'detail',
                        'id' => $id,
                        ),
                        'name' => '役職詳細',
                ),
            );
            $currentPage = '役職詳細編集';
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
                            'controller' => 'posts',
                            'action' => 'index' ,
                            ),
                            'name' => '役職一覧',
                    ),
                    array('url' => array(
                            'route' => 'master/default',
                            'controller' => 'posts',
                            'action' => 'detail',
                            'id' => $id,
                            ),
                            'name' => '役職詳細',
                    ),
                );
                $currentPage = '役職詳細編集';
            }else{

                //fix the data coming from the add
                $previousPage = array(
                    array('url' => 'index.html', 'name' => 'トップページ' ),
                    array('url' => array(
                            'route' => 'master/default',
                            'controller' => 'posts',
                            'action' => 'index' ,
                            ),
                            'name' => '役職一覧',
                    ),
                );
                $currentPage = '役職新規追加';
            }
        }

        //the '確認'(confirm) can also be origined from add and edit
        if($status == '確認'){
            if($request->getPost()['id']){

                $previousPage = array(
                    array('url' => 'index.html', 'name' => 'トップページ' ),
                    array('url' => array(
                            'route' => 'master/default',
                            'controller' => 'posts',
                            'action' => 'index' ,
                            ),
                            'name' => '役職一覧',
                    ),
                    array('url' => array(
                            'route' => 'master/default',
                            'controller' => 'posts',
                            'action' => 'detail',
                            'id' => $request->getPost()['id'],
                            ),
                            'name' => '役職詳細',
                    ),
                    array('url' => array(
                            'route' => 'master/default',
                            'controller' => 'posts',
                            'action' => 'edit',
                            'id' => $request->getPost()['id'],
                            ),
                            'name' => '役職編集',
                    ),
                );
                $currentPage = '役職詳細編集確認';

            }else{
                $previousPage = array(
                    array('url' => 'index.html', 'name' => 'トップページ' ),
                    array('url' => array(
                            'route' => 'master/default',
                            'controller' => 'posts',
                            'action' => 'index' ,
                            ),
                            'name' => '役職一覧',
                    ),
                    array('url' => array(
                            'route' => 'master/default',
                            'controller' => 'posts',
                            'action' => 'edit' ,
                            ),
                            'name' => '役職新規追加',
                    ),

                );
                $currentPage = '役職新規追加確認';
            }
        }

        $bread_crumb = new ViewModel(array(
                'previousPage' => $previousPage,
                'currentPage' => $currentPage,
            )
        );

        $bread_crumb->setTemplate('/element/bread_crumb.phtml');

        //sub view edit_list
        $itemList = array('post_cd','post_name');

        $backButton = null;
        $forwardButton = null;
        if($status == '新規'){
            $backButton = array(
                'url' => array(
                    'route' => 'master/default',
                    'controller' => 'posts',
                    'action' => 'index',
                ),
                'name' => '戻る', 
            );
            $forwardButton = array(
                'url' => array(
                    'route' => 'master/default',
                    'controller' => 'posts',
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
                    'controller' => 'posts',
                    'action' => 'detail',
                    'id' =>$id,
                ),
                'name' => '戻る', 
            );
            $forwardButton = array(
                'url' => array(
                    'route' => 'master/default',
                    'controller' => 'posts',
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
                        'controller' => 'posts',
                        'action' => 'detail',
                        'id' => $request->getPost()['id'],
                    ),
                    'name' => '戻る',
                );
                $forwardButton = array(
                    'url' => array(
                        'route' => 'master/default',
                        'controller' => 'posts',
                        'action' => 'edit',
                        'id' =>  $request->getPost()['id'],
                    ),
                    'name' => '確認',
                );
            }else{
                $backButton = array(
                    'url' => array(
                        'route' => 'master/default',
                        'controller' => 'posts',
                        'action' => 'index',
                    ),
                    'name' => '戻る',
                );
                $forwardButton = array(
                    'url' => array(
                        'route' => 'master/default',
                        'controller' => 'posts',
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
                        'controller' => 'posts',
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
                        'controller' => 'posts',
                        'action' => 'edit',
                        'id' =>  $request->getPost()['id'],
                    ),
                    'name' => '保存',
                );

            }else{
                $backButton = array(
                    'url' => array(
                        'route' => 'master/default',
                        'controller' => 'posts',
                        'action' => 'edit',
                    ),
                    'name' => '修正',
                    //change the '修正'(fix) bottun to a submit bottun
                    'type' => 'submit',
                );
                $forwardButton = array(
                    'url' => array(
                        'route' => 'master/default',
                        'controller' => 'posts',
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
                'controller' => 'posts',
                'action' => 'edit',
            )
        );

    }
/*
    public function confirmAction()
    {
        $postData = $this->getConfirmData();

        var_dump($postData);
        exit();

        if(!$postData){
            return $this->redirect()->toRoute('master/default',array(
                    'controller' => 'branchs',
                    'action' => 'index',
                )
            );
        }

        $this->confirmData = null;

        $id = $postData['id'];


        //$form  = new BranchForm();
        $form  = $this->getMyForm();

        $form->bind($postData);
        
        //$form->setData($request->getPost());

        $form = $this->unableMyForm();

        //edit mainView 
        $mainView = new ViewModel();

        $previousPage = null;
        $currentPage = null;
        if($id){
            //come from edit
            //sub view bread_crumb
            $previousPage = array(
                array('url' => 'index.html', 'name' => 'トップページ' ),
                array('url' => array(
                        'route' => 'master/default',
                        'controller' => 'branchs',
                        'action' => 'index' ,
                        ),
                        'name' => '営業所一覧',
                ),
                array('url' => array(
                        'route' => 'master/default',
                        'controller' => 'branchs',
                        'action' => 'detail',
                        'id' => $id,
                        ),
                        'name' => '営業所詳細',
                ),
                array('url' => array(
                        'route' => 'master/default',
                        'controller' => 'branchs',
                        'action' => 'edit',
                        'id' => $id,
                        ),
                        'name' => '営業所編集',
                ),
            );
            $currentPage = '営業所編集確認';
        }else{
            //come from add
            //sub view bread_crumb
            $previousPage = array(
                array('url' => 'index.html', 'name' => 'トップページ' ),
                array('url' => array(
                        'route' => 'master/default',
                        'controller' => 'branchs',
                        'action' => 'index' ,
                        ),
                        'name' => '営業所一覧',
                ),
                array('url' => array(
                        'route' => 'master/default',
                        'controller' => 'branchs',
                        'action' => 'edit',
                        'id' => $id,
                        ),
                        'name' => '営業所新規追加',
                ),
            );
            $currentPage = '営業所新規追加確認';
        }

        $bread_crumb = new ViewModel(array(
                'previousPage' => $previousPage,
                'currentPage' => $currentPage,
            )
        );

        $bread_crumb->setTemplate('/element/bread_crumb.phtml');


        $itemList = array('branch_cd','branch_name','branch_postcode','branch_add1','branch_add2','branch_tel','branch_fax');
            
        $backButton = array(
            'url' => array(
                'route' => 'master/default',
                'controller' => 'branchs',
                'action' => 'edit',
                'id' =>$id,
            ),
            'name' => '修正', 
        );

        $forwardButton = array(
            'url' => array(
                'route' => 'master/default',
                'controller' => 'branchs',
                'action' => 'save',
                'id' =>  $id,
            ),
            'name' => '保存',
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

    public function saveAction(){

        $id = $request->getPost()['id'];

        $result = $this->getBranch()->save($this->getRequest()->getPost(), $this->auth);

        if($result){
            if($id){
                $this->flashMessenger()->addMessage($branch['branch_name'].'の編集が完了しました。');
            }else{
                $this->flashMessenger()->addMessage($branch['branch_name'].'の新規追加が完了しました。');
            }
            
        }

        return $this->redirect()->toRoute('master/default',array(
                'controller' => 'branchs',
                'action' => 'index',
            )
        );

    }




    public function addAction()
    {
        $branch = null;
        $id = null;

        //$form  = new BranchForm();
        $form  = $this->getMyForm();

        $request = $this->getRequest();
        if($request->isPost()){

            $form->setInputFilter($this->getBranch()->getInputFilter());
            $form->setData($request->getPost());

            if($form->isValid()){

                $result = $this->getBranch()->save($form->getData(), $this->auth);

                if($result){
                    $this->flashMessenger()->addMessage($request->getPost()['branch_name'].'の新規登録が完了しました。');
                }

                return $this->redirect()->toRoute('master/default',array(
                        'controller' => 'branchs',
                        'action' => 'index',
                    )
                );
            }

        }

        //edit mainView 
        $mainView = new ViewModel();

        //sub view bread_crumb
        $previousPage = array(
            array('url' => 'index.html', 'name' => 'トップページ' ),
            array('url' => array(
                    'route' => 'master/default',
                    'controller' => 'branchs',
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
        $itemList = array('branch_cd','branch_name','branch_postcode','branch_add1','branch_add2','branch_tel','branch_fax');

        $backButton = array(
            'url' => array(
                'route' => 'master/default',
                'controller' => 'branchs',
                'action' => 'index',
            ),
            'name' => '戻る', 
        );

        $forwardButton = array(
            'url' => array(
                'route' => 'master/default',
                'controller' => 'branchs',
                'action' => 'edit',
            ),
            'name' => '編集',
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
    }*/

}
