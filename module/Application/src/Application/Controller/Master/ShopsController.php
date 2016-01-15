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
use Application\Form\ShopForm;
use Application\Controller\ControllerBasicWithAuthentication;

class ShopsController extends ControllerBasicWithAuthentication
{
    protected $formName = 'ShopForm';

    public $shop;

    public function getShop(){
        if($this->shop == null){
            $this->shop = $this->getServiceLocator()->get('Model\Shop');
        }
        return $this->shop;
    }

//**********************************************************************************************************

    public function getDisplayFilter()
    {

        $this->displayFilter = array(
        );

        return $this->displayFilter;
    }


//**********************************************************************************************************

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
            $paginator = $this->getShop()->search($pageNo, $request->getPost());
        }else{
            //index without search
            $paginator = $this->getShop()->fetchAll($pageNo);
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
        $currentPage = '営業所一覧';
        $bread_crumb = new ViewModel(array(
                'previousPage' => $previousPage,
                'currentPage' => $currentPage,
            )
        );
        $bread_crumb->setTemplate('/element/bread_crumb.phtml');

        //sub view search_bar
        $searchItems = array('shop_cd','shop_name');
        $searchButton  = array(
            'url' => array(
                'route' => 'master/default',
                'controller' => 'shops',
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

        $search_bar->setTemplate('/element/search_bar.phtml');

        //sub view add_bar
        $tableName = '営業所管理';

        $addButton  = array(
            'url' => array(
                'route' => 'master/default',
                'controller' => 'shops',
                'action' => 'add'
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
            'shop_cd' => 'w10',
            'shop_name' => 'w15',
            'shop_add1' => 'w30',
            'shop_add2' => 'w30',
            'shop_tel' => 'w15',
        );
        $url = array(
            'route' => 'master/default',
            'controller' => 'shops',
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
            'controller' => 'shops',
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

    	$id = (int) $this->params()->fromRoute('id', 0);
        if (!$id) {
            return $this->redirect()->toRoute('master/default',array(
                'controller' => 'shops',
                'action' => 'index'
                )
            );
        }

        $data = $this->getShop()->get($id);

        //main view
        $mainView = new ViewModel();

        //sub view bread_crumb
        $previousPage = array(
            array('url' => 'index.html', 'name' => 'トップページ' ),
            array('url' => array(
                    'route' => 'master/default',
                    'controller' => 'shops',
                    'action' => 'index' 
                ),
                'name' => '営業所一覧',
            ),
        );
        $currentPage = '営業所詳細';
        $bread_crumb = new ViewModel(array(
                'previousPage' => $previousPage,
                'currentPage' => $currentPage,
            )
        );

        $bread_crumb->setTemplate('/element/bread_crumb.phtml');

        //sub view detail_list
        $detailList = array(
            '得意先ID' => 'shop_cl_id',
            '得意先枝番' => 'shop_cl_child_num', 
            '店舗コード' => 'shop_cd', 
            '店舗名' => 'shop_name',
            '店舗名カナ' => 'shop_kana', 
            '郵便番号' => 'shop_postcode',
            '住所１' => 'shop_add1', 
            '住所２' => 'shop_add2',
            '電話番号' => 'shop_tel',
            'オープン時間' => 'shop_open_time1',
            'クローズ時間' => 'shop_close_time1',
            'オープン時間2' => 'shop_open_time2',
            'クローズ時間2' => 'shop_close_time2',
            '店舗オープン時間コメント' => 'shop_open_comment',
            '定休日' => 'regular_holiday',
            '店舗地図' => 'shop_map',
            '店舗GPSアドレス' => 'shop_gps',
            '駐車場コメント' => 'parking_comment',
            '店舗メイン画像' => 'shop_main_img',
            '店舗業種カテゴリ' => 'shop_cat',
            '店舗側コメント' => 'shop_comment',
            '営業メモ' => 'sales_memo',
            '営業所ID' => 'branch_id',
            // '担当者ID' => 'staff_id',
            '店舗業種1' => 'shop_cat_sub',
            '店舗業種2' => 'shop_cat2',
            '店舗業種3' => 'shop_cat3',
        );

        $backButton = array(
            'url' => array(
                'route' => 'master/default',
                'controller' => 'shops',
                'action' => 'index' 
            ),
            'name' => '戻る', 
        );

        $forwardButton = array(
            'url' => array(
                'route' => 'master/default',
                'controller' => 'shops',
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
                'displayFilter' => $this->getDisplayFilter(),
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
            $result = $this->getShop()->save($this->getRequest()->getPost(), $this->auth);

            if($result){
                if($id){
                    $this->flashMessenger()->addMessage($request->getPost()['shop_name'].'の編集が完了しました。');
                }else{
                    $this->flashMessenger()->addMessage($request->getPost()['shop_name'].'の新規追加が完了しました。');
                }
                
            }

            return $this->redirect()->toRoute('master/default',array(
                    'controller' => 'shops',
                    'action' => 'index',
                )
            );
        }

        //this form is shared by all the other four status
        $form = $this->getMyForm();

        //if the status is '新規'(add) nothing need to add to the form

        if($status == '確認'){
            $form->setData($request->getPost());
            $form->setInputFilter($this->getShop()->getInputFilter());

            if($form->isValid()){

                $form->bind($request->getPost());
                $form = $this->unableMyForm();

            }else{

                //if the data didn't pass the validation the status can not be changed.
                $status = $id ? '編集' : '新規';
            }
        }
        
        if($status == '編集'){
            $shop = null;

            try {
                $shop = $this->getShop()->get($id);
            }
            catch (\Exception $ex) {
                return $this->redirect()->toRoute('master/default',array(
                    'controller' => 'shops',
                    'action' => 'index'
                    )
                );
            }

            $form->bind($shop);
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
                        'controller' => 'shops',
                        'action' => 'index' ,
                        ),
                        'name' => '営業所一覧',
                ),
            );
            $currentPage = '営業所新規追加';
        }

        if($status == '編集'){
            $previousPage = array(
                array('url' => 'index.html', 'name' => 'トップページ' ),
                array('url' => array(
                        'route' => 'master/default',
                        'controller' => 'shops',
                        'action' => 'index' ,
                        ),
                        'name' => '営業所一覧',
                ),
                array('url' => array(
                        'route' => 'master/default',
                        'controller' => 'shops',
                        'action' => 'detail',
                        'id' => $id,
                        ),
                        'name' => '営業所詳細',
                ),
            );
            $currentPage = '営業所詳細編集';
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
                            'controller' => 'shops',
                            'action' => 'index' ,
                            ),
                            'name' => '営業所一覧',
                    ),
                    array('url' => array(
                            'route' => 'master/default',
                            'controller' => 'shops',
                            'action' => 'detail',
                            'id' => $id,
                            ),
                            'name' => '営業所詳細',
                    ),
                );
                $currentPage = '営業所詳細編集';
            }else{

                //fix the data coming from the add
                $previousPage = array(
                    array('url' => 'index.html', 'name' => 'トップページ' ),
                    array('url' => array(
                            'route' => 'master/default',
                            'controller' => 'shops',
                            'action' => 'index' ,
                            ),
                            'name' => '営業所一覧',
                    ),
                );
                $currentPage = '営業所新規追加';
            }
        }

        //the '確認'(confirm) can also be origined from add and edit
        if($status == '確認'){
            if($request->getPost()['id']){

                $previousPage = array(
                    array('url' => 'index.html', 'name' => 'トップページ' ),
                    array('url' => array(
                            'route' => 'master/default',
                            'controller' => 'shops',
                            'action' => 'index' ,
                            ),
                            'name' => '営業所一覧',
                    ),
                    array('url' => array(
                            'route' => 'master/default',
                            'controller' => 'shops',
                            'action' => 'detail',
                            'id' => $request->getPost()['id'],
                            ),
                            'name' => '営業所詳細',
                    ),
                    array('url' => array(
                            'route' => 'master/default',
                            'controller' => 'shops',
                            'action' => 'edit',
                            'id' => $request->getPost()['id'],
                            ),
                            'name' => '営業所編集',
                    ),
                );
                $currentPage = '営業所詳細編集確認';

            }else{
                $previousPage = array(
                    array('url' => 'index.html', 'name' => 'トップページ' ),
                    array('url' => array(
                            'route' => 'master/default',
                            'controller' => 'shops',
                            'action' => 'index' ,
                            ),
                            'name' => '営業所一覧',
                    ),
                    array('url' => array(
                            'route' => 'master/default',
                            'controller' => 'shops',
                            'action' => 'edit' ,
                            ),
                            'name' => '営業所新規追加',
                    ),

                );
                $currentPage = '営業所新規追加確認';
            }
        }

        $bread_crumb = new ViewModel(array(
                'previousPage' => $previousPage,
                'currentPage' => $currentPage,
            )
        );

        $bread_crumb->setTemplate('/element/bread_crumb.phtml');

        //sub view edit_list
        $itemList = array('shop_cl_id','shop_cl_child_num','shop_cd','shop_name','shop_kana','shop_postcode', 'shop_add1',  'shop_add2','shop_tel', 'shop_open_time1','shop_close_time1','shop_open_time2','shop_close_time2','shop_open_comment', 'regular_holiday','shop_map', 'shop_gps','parking_comment','shop_main_img','shop_cat', 'shop_comment','sales_memo','branch_id',/*'staff_id',*/'shop_cat_sub', 'shop_cat2','shop_cat3',);

        $backButton = null;
        $forwardButton = null;
        if($status == '新規'){
            $backButton = array(
                'url' => array(
                    'route' => 'master/default',
                    'controller' => 'shops',
                    'action' => 'index',
                ),
                'name' => '戻る', 
            );
            $forwardButton = array(
                'url' => array(
                    'route' => 'master/default',
                    'controller' => 'shops',
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
                    'controller' => 'shops',
                    'action' => 'detail',
                    'id' =>$id,
                ),
                'name' => '戻る', 
            );
            $forwardButton = array(
                'url' => array(
                    'route' => 'master/default',
                    'controller' => 'shops',
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
                        'controller' => 'shops',
                        'action' => 'detail',
                        'id' => $request->getPost()['id'],
                    ),
                    'name' => '戻る',
                );
                $forwardButton = array(
                    'url' => array(
                        'route' => 'master/default',
                        'controller' => 'shops',
                        'action' => 'edit',
                        'id' =>  $request->getPost()['id'],
                    ),
                    'name' => '確認',
                );
            }else{
                $backButton = array(
                    'url' => array(
                        'route' => 'master/default',
                        'controller' => 'shops',
                        'action' => 'index',
                    ),
                    'name' => '戻る',
                );
                $forwardButton = array(
                    'url' => array(
                        'route' => 'master/default',
                        'controller' => 'shops',
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
                        'controller' => 'shops',
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
                        'controller' => 'shops',
                        'action' => 'edit',
                        'id' =>  $request->getPost()['id'],
                    ),
                    'name' => '保存',
                );

            }else{
                $backButton = array(
                    'url' => array(
                        'route' => 'master/default',
                        'controller' => 'shops',
                        'action' => 'edit',
                    ),
                    'name' => '修正',
                    //change the '修正'(fix) bottun to a submit bottun
                    'type' => 'submit',
                );
                $forwardButton = array(
                    'url' => array(
                        'route' => 'master/default',
                        'controller' => 'shops',
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
/*
    public function addAction()
    {

        return $this->redirect()->toRoute('master/default',array(
                'controller' => 'shops',
                'action' => 'edit',
            )
        );

    }
*/
    public function confirmAction()
    {
        $postData = $this->getConfirmData();

        var_dump($postData);
        exit();

        if(!$postData){
            return $this->redirect()->toRoute('master/default',array(
                    'controller' => 'shops',
                    'action' => 'index',
                )
            );
        }

        $this->confirmData = null;

        $id = $postData['id'];


        //$form  = new ShopForm();
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
                        'controller' => 'shops',
                        'action' => 'index' ,
                        ),
                        'name' => '営業所一覧',
                ),
                array('url' => array(
                        'route' => 'master/default',
                        'controller' => 'shops',
                        'action' => 'detail',
                        'id' => $id,
                        ),
                        'name' => '営業所詳細',
                ),
                array('url' => array(
                        'route' => 'master/default',
                        'controller' => 'shops',
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
                        'controller' => 'shops',
                        'action' => 'index' ,
                        ),
                        'name' => '営業所一覧',
                ),
                array('url' => array(
                        'route' => 'master/default',
                        'controller' => 'shops',
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


        $itemList = array('shop_cl_id','shop_cl_child_num','shop_cd','shop_name','shop_kana','shop_postcode', 'shop_add1',  'shop_add2','shop_tel', 'shop_open_time1','shop_close_time1','shop_open_time2','shop_close_time2','shop_open_comment', 'regular_holiday','shop_map', 'shop_gps','parking_comment','shop_main_img','shop_cat', 'shop_comment','sales_memo','branch_id',/*'staff_id',*/'shop_cat_sub', 'shop_cat2','shop_cat3',);
            
        $backButton = array(
            'url' => array(
                'route' => 'master/default',
                'controller' => 'shops',
                'action' => 'edit',
                'id' =>$id,
            ),
            'name' => '修正', 
        );

        $forwardButton = array(
            'url' => array(
                'route' => 'master/default',
                'controller' => 'shops',
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

        $result = $this->getShop()->save($this->getRequest()->getPost(), $this->auth);

        if($result){
            if($id){
                $this->flashMessenger()->addMessage($shop['shop_name'].'の編集が完了しました。');
            }else{
                $this->flashMessenger()->addMessage($shop['shop_name'].'の新規追加が完了しました。');
            }
            
        }

        return $this->redirect()->toRoute('master/default',array(
                'controller' => 'shops',
                'action' => 'index',
            )
        );

    }



    public function addAction()
    {
        $shop = null;
        $id = null;

        //$form  = new ShopForm();
        $form  = $this->getMyForm();

        $request = $this->getRequest();
        if($request->isPost()){

            $form->setInputFilter($this->getShop()->getInputFilter());
            $form->setData($request->getPost());

            if($form->isValid()){
$form  = new ShopForm();
        $form->bind($shop);
            $form->setInputFilter($this->getShop()->getInputFilter());
            $form->setData($request->getPost());
               
			   $result = $this->getShop()->save($form->getData());

                if($result){
                    $this->flashMessenger()->addMessage($request->getPost()['shop_name'].'の新規登録が完了しました。');
                }

                return $this->redirect()->toRoute('master/default',array(
                        'controller' => 'shops',
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
                    'controller' => 'shops',
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
        $itemList = array('shop_cl_id','shop_cl_child_num','shop_cd','shop_name','shop_kana','shop_postcode', 'shop_add1',  'shop_add2','shop_tel', 'shop_open_time1','shop_close_time1','shop_open_time2','shop_close_time2','shop_open_comment', 'regular_holiday','shop_map', 'shop_gps','parking_comment','shop_main_img','shop_cat', 'shop_comment','sales_memo','branch_id',/*'staff_id',*/'shop_cat_sub', 'shop_cat2','shop_cat3',);

        $backButton = array(
            'url' => array(
                'route' => 'master/default',
                'controller' => 'shops',
                'action' => 'index',
            ),
            'name' => '戻る', 
        );

        $forwardButton = array(
            'url' => array(
                'route' => 'master/default',
                'controller' => 'shops',
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
    }

}
