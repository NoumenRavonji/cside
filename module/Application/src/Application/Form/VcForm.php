<?php
namespace Application\Form;

 use Zend\Form\Form;

 class VcForm extends Form
 {
    public function __construct($name = null)
    {
         // we want to ignore the name passed
        parent::__construct('vc');
        $this->setAttribute('method','post');

        $this->add(array(
            'name' => 'id',
            'type' => 'Hidden',
        ));

        $this->add(array(
            'name' => 'vc_cd',
            'type' => 'Text',
            'attributes' => array(
                'class' => 'w60',
            ),
            'options' => array(
                'label' => 'VC コード',
            ),
        ));

        $this->add(array(
            'name' => 'vc_name',
            'type' => 'Text',
            'attributes' => array(
                'class' => 'w60',
            ),
            'options' => array(
                'label' => 'VC名',
            ),
        ));

        $this->add(array(
            'name' => 'vc_rep_name',
            'type' => 'Text',
            'attributes' => array(
                'class' => 'w60',
            ),
            'options' => array(
                'label' => 'VC代表者名',
            ),
        ));
		
        $this->add(array(
            'name' => 'vc_postcode',
            'type' => 'Text',
            'attributes' => array(
                'class' => 'w60',
            ),
            'options' => array(
                'label' => '郵便番号',
            ),
        ));
		
        $this->add(array(
            'name' => 'vc_pref',
            'type' => 'Text',
            'attributes' => array(
                'class' => 'w60',
            ),
            'options' => array(
                'label' => '都道府県名',
            ),
        ));

        $this->add(array(
            'name' => 'vc_add1',
            'type' => 'Text',
            'attributes' => array(
                'class' => 'w60',
            ),
            'options' => array(
                'label' => '地区町村名',
            ),
        ));

        $this->add(array(
            'name' => 'vc_add2',
            'type' => 'Text',
            'attributes' => array(
                'class' => 'w60',
            ),
            'options' => array(
                'label' => '住所',
            ),
        ));

        $this->add(array(
            'name' => 'vc_tel',
            'type' => 'Text',
            'attributes' => array(
                'class' => 'w60',
            ),
            'options' => array(
                'label' => '電話番号',
            ),
        ));

        $this->add(array(
            'name' => 'vc_rep_email',
            'type' => 'Text',
            'attributes' => array(
                'class' => 'w60',
            ),
            'options' => array(
                'label' => '代表メールアドレス',
            ),
        ));

        $this->add(array(
            'name' => 'vc_crg_name',
            'type' => 'Text',
            'attributes' => array(
                'class' => 'w60',
            ),
            'options' => array(
                'label' => '担当者名',
            ),
        ));

        $this->add(array(
            'name' => 'vc_crg_email',
            'type' => 'Text',
            'attributes' => array(
                'class' => 'w60',
            ),
            'options' => array(
                'label' => '担当者メールアドレス',
            ),
        ));

        $this->add(array(
            'name' => 'vc_crg_tel',
            'type' => 'Text',
            'attributes' => array(
                'class' => 'w60',
            ),
            'options' => array(
                'label' => '担当者電話番号',
            ),
        ));

        $this->add(array(
            'name' => 'vc_com_grd',
            'type' => 'Text',
            'attributes' => array(
                'class' => 'w60',
            ),
            'options' => array(
                'label' => '企業グレード',
            ),
        ));

        $this->add(array(
            'name' => 'vc_anti_sotial',
            'type' => 'Text',
            'attributes' => array(
                'class' => 'w60',
            ),
            'options' => array(
                'label' => '反社会的企業フラグ',
            ),
        ));

        $this->add(array(
            'name' => 'reg_staff',
            'type' => 'Text',
            'attributes' => array(
                'class' => 'w60',
            ),
            'options' => array(
                'label' => '営業担当者',
            ),
        ));

        $this->add(array(
            'name' => 'vc_busi_cat',
            'type' => 'Text',
            'attributes' => array(
                'class' => 'w60',
            ),
            'options' => array(
                'label' => '業種カテゴリ',
            ),
        ));

        $this->add(array(
            'name' => 'contract_date',
            'type' => 'Text',
            'attributes' => array(
                'class' => 'w60',
            ),
            'options' => array(
                'label' => '契約日',
            ),
        ));

        $this->add(array(
            'name' => 'expiration_date',
            'type' => 'Text',
            'attributes' => array(
                'class' => 'w60',
            ),
            'options' => array(
                'label' => '契約満了日',
            ),
        ));

        $this->add(array(
            'name' => 'status',
            'type' => 'Text',
            'attributes' => array(
                'class' => 'w60',
            ),
            'options' => array(
                'label' => '利用ステータス',
            ),
        ));

        $this->add(array(
            'name' => 'acount_cnt',
            'type' => 'Text',
            'attributes' => array(
                'class' => 'w60',
            ),
            'options' => array(
                'label' => 'アカウント数',
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