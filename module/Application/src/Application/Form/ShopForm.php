<?php
namespace Application\Form;

 use Zend\Form\Form;

 class ShopForm extends Form
 {
    public function __construct($name = null)
    {
         // we want to ignore the name passed
        parent::__construct('shop');
        $this->setAttribute('method','post');

        $this->add(array(
            'name' => 'id',
            'type' => 'Hidden',
        ));

        $this->add(array(
            'name' => 'shop_cl_id',
            'type' => 'Text',
            'attributes' => array(
                'class' => 'w60',
            ),
            'options' => array(
                'label' => '得意先ID',
            ),
        ));

        $this->add(array(
            'name' => 'shop_cl_child_num',
            'type' => 'Text',
            'attributes' => array(
                'class' => 'w60',
            ),
            'options' => array(
                'label' => '得意先枝番',
            ),
        ));

        $this->add(array(
            'name' => 'shop_cd',
            'type' => 'Text',
            'attributes' => array(
                'class' => 'w60',
            ),
            'options' => array(
                'label' => '店舗コード',
            ),
        ));

        $this->add(array(
            'name' => 'shop_name',
            'type' => 'Text',
            'attributes' => array(
                'class' => 'w60',
            ),
            'options' => array(
                'label' => '店舗名',
            ),
        ));

        $this->add(array(
            'name' => 'shop_kana',
            'type' => 'Text',
            'attributes' => array(
                'class' => 'w60',
            ),
            'options' => array(
                'label' => '店舗名カナ',
            ),
        ));

        $this->add(array(
            'name' => 'shop_postcode',
            'type' => 'Text',
            'attributes' => array(
                'class' => 'w60',
            ),
            'options' => array(
                'label' => '郵便番号',
            ),
        ));

        $this->add(array(
            'name' => 'shop_add1',
            'type' => 'Text',
            'attributes' => array(
                'class' => 'w60',
            ),
            'options' => array(
                'label' => '住所１',
            ),
        ));

        $this->add(array(
            'name' => 'shop_add2',
            'type' => 'Text',
            'attributes' => array(
                'class' => 'w60',
            ),
            'options' => array(
                'label' => '住所２',
            ),
        ));

        $this->add(array(
            'name' => 'shop_tel',
            'type' => 'Text',
            'attributes' => array(
                //'class' => 'w60',
            ),
            'options' => array(
                'label' => '電話番号',
            ),
        ));

        $this->add(array(
            'name' => 'shop_open_time1',
            'type' => 'Text',
            'attributes' => array(
                'class' => 'w60',
            ),
            'options' => array(
                'label' => 'オープン時間',
            ),
        ));

        $this->add(array(
            'name' => 'shop_close_time1',
            'type' => 'Text',
            'attributes' => array(
                'class' => 'w60',
            ),
            'options' => array(
                'label' => 'クローズ時間2',
            ),
        ));

        $this->add(array(
            'name' => 'shop_open_time2',
            'type' => 'Text',
            'attributes' => array(
                'class' => 'w60',
            ),
            'options' => array(
                'label' => 'オープン時間2',
            ),
        ));

        $this->add(array(
            'name' => 'shop_close_time2',
            'type' => 'Text',
            'attributes' => array(
                'class' => 'w60',
            ),
            'options' => array(
                'label' => 'クローズ時間2',
            ),
        ));

        $this->add(array(
            'name' => 'shop_open_comment',
            'type' => 'Text',
            'attributes' => array(
                'class' => 'w60',
            ),
            'options' => array(
                'label' => '店舗オープン時間コメント',
            ),
        ));

        $this->add(array(
            'name' => 'regular_holiday',
            'type' => 'Text',
            'attributes' => array(
                'class' => 'w60',
            ),
            'options' => array(
                'label' => '定休日',
            ),
        ));

        $this->add(array(
            'name' => 'shop_map',
            'type' => 'Text',
            'attributes' => array(
                'class' => 'w60',
            ),
            'options' => array(
                'label' => '店舗地図',
            ),
        ));

        $this->add(array(
            'name' => 'shop_gps',
            'type' => 'Text',
            'attributes' => array(
                'class' => 'w60',
            ),
            'options' => array(
                'label' => '店舗GPSアドレス',
            ),
        ));

        $this->add(array(
            'name' => 'parking_comment',
            'type' => 'Text',
            'attributes' => array(
                'class' => 'w60',
            ),
            'options' => array(
                'label' => '駐車場コメント',
            ),
        ));

        $this->add(array(
            'name' => 'shop_main_img',
            'type' => 'Text',
            'attributes' => array(
                'class' => 'w60',
            ),
            'options' => array(
                'label' => '店舗メイン画像',
            ),
        ));

        $this->add(array(
            'name' => 'shop_cat',
            'type' => 'Text',
            'attributes' => array(
                'class' => 'w60',
            ),
            'options' => array(
                'label' => '店舗業種カテゴリ',
            ),
        ));

        $this->add(array(
            'name' => 'shop_comment',
            'type' => 'Text',
            'attributes' => array(
                'class' => 'w60',
            ),
            'options' => array(
                'label' => '店舗側コメント',
            ),
        ));

        $this->add(array(
            'name' => 'sales_memo',
            'type' => 'Text',
            'attributes' => array(
                'class' => 'w60',
            ),
            'options' => array(
                'label' => '営業メモ',
            ),
        ));

        $this->add(array(
            'name' => 'branch_id',
            'type' => 'Text',
            'attributes' => array(
                'class' => 'w60',
            ),
            'options' => array(
                'label' => '営業所ID',
            ),
        ));

        $this->add(array(
            'name' => 'staff_id',
            'type' => 'Text',
            'attributes' => array(
                'class' => 'w60',
            ),
            'options' => array(
                'label' => '担当者ID',
            ),
        ));

        $this->add(array(
            'name' => 'shop_cat_sub',
            'type' => 'Text',
            'attributes' => array(
                'class' => 'w60',
            ),
            'options' => array(
                'label' => '店舗業種1',
            ),
        ));

        $this->add(array(
            'name' => 'shop_cat2',
            'type' => 'Text',
            'attributes' => array(
                'class' => 'w60',
            ),
            'options' => array(
                'label' => '店舗業種2',
            ),
        ));

        $this->add(array(
            'name' => 'shop_cat3',
            'type' => 'Text',
            'attributes' => array(
                'class' => 'w60',
            ),
            'options' => array(
                'label' => '店舗業種3',
            ),
        ));

        $this->add(array(
            'name' => 'submit',
            'type' => 'Submit',
            'attributes' => array(
                'value' => '登録',
                'id' => 'submitbutton',
            ),
        ));
     }
 }