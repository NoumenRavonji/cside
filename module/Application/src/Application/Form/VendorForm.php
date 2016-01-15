<?php
namespace Application\Form;

 use Zend\Form\Form;

 class VendorForm extends Form
 {
    public function __construct($name = null)
    {
         // we want to ignore the name passed
        parent::__construct('vendor');
        $this->setAttribute('method','post');

        $this->add(array(
            'name' => 'id',
            'type' => 'Hidden',
        ));

        $this->add(array(
            'name' => 'sup_cd',
            'type' => 'Text',
            'attributes' => array(
                'class' => 'w60',
            ),
            'options' => array(
                'label' => '得意先コード',
            ),
        ));

        $this->add(array(
            'name' => 'sup_name',
            'type' => 'Text',
            'attributes' => array(
                'class' => 'w60',
            ),
            'options' => array(
                'label' => '仕入先名',
            ),
        ));

        $this->add(array(
            'name' => 'sup_cat_id',
            'type' => 'Text',
            'attributes' => array(
                'class' => 'w60',
            ),
            'options' => array(
                'label' => '仕入先業種',
            ),
        ));

        $this->add(array(
            'name' => 'sup_abb',
            'type' => 'Text',
            'attributes' => array(
                'class' => 'w60',
            ),
            'options' => array(
                'label' => '仕入先略名',
            ),
        ));


        $this->add(array(
            'name' => 'sup_postcode',
            'type' => 'Text',
            'attributes' => array(
                'class' => 'w60',
            ),
            'options' => array(
                'label' => '郵便番号',
            ),
        ));

        $this->add(array(
            'name' => 'sup_add1',
            'type' => 'Text',
            'attributes' => array(
                'class' => 'w60',
            ),
            'options' => array(
                'label' => '住所上段',
            ),
        ));

        $this->add(array(
            'name' => 'sup_add2',
            'type' => 'Text',
            'attributes' => array(
                'class' => 'w60',
            ),
            'options' => array(
                'label' => '住所下段',
            ),
        ));

        $this->add(array(
            'name' => 'sup_tel',
            'type' => 'Text',
            'attributes' => array(
                'class' => 'w60',
            ),
            'options' => array(
                'label' => '電話番号',
            ),
        ));

        $this->add(array(
            'name' => 'sup_fax',
            'type' => 'Text',
            'attributes' => array(
                'class' => 'w60',
            ),
            'options' => array(
                'label' => 'FAX番号',
            ),
        ));

        $this->add(array(
            'name' => 'sup_rep',
            'type' => 'Text',
            'attributes' => array(
                'class' => 'w60',
            ),
            'options' => array(
                'label' => '代表者名',
            ),
        ));

        $this->add(array(
            'name' => 'sup_crg',
            'type' => 'Text',
            'attributes' => array(
                'class' => 'w60',
            ),
            'options' => array(
                'label' => '先方担当者',
            ),
        ));

        $this->add(array(
            'name' => 'sup_email',
            'type' => 'Text',
            'attributes' => array(
                'class' => 'w60',
            ),
            'options' => array(
                'label' => 'メールアドレス',
            ),
        ));

        $this->add(array(
            'name' => 'sup_kana1',
            'type' => 'Text',
            'attributes' => array(
                'class' => 'w60',
            ),
            'options' => array(
                'label' => 'カナ1（仕入先名）',
            ),
        ));

        $this->add(array(
            'name' => 'sup_kana2',
            'type' => 'Text',
            'attributes' => array(
                'class' => 'w60',
            ),
            'options' => array(
                'label' => 'カナ2（口座名義名）',
            ),
        ));

        $this->add(array(
            'name' => 'sup_kana3',
            'type' => 'Text',
            'attributes' => array(
                'class' => 'w60',
            ),
            'options' => array(
                'label' => 'カナ3',
            ),
        ));

        $this->add(array(
            'name' => 'sup_kana4',
            'type' => 'Text',
            'attributes' => array(
                'class' => 'w60',
            ),
            'options' => array(
                'label' => 'カナ4',
            ),
        ));

        $this->add(array(
            'name' => 'sup_kana5',
            'type' => 'Text',
            'attributes' => array(
                'class' => 'w60',
            ),
            'options' => array(
                'label' => 'カナ5',
            ),
        ));

        $this->add(array(
            'name' => 'branch_id',
            'type' => 'Text',
            'attributes' => array(
                'class' => 'w60',
            ),
            'options' => array(
                'label' => '申請営業所ID',
            ),
        ));

        $this->add(array(
            'name' => 'staff_id',
            'type' => 'Text',
            'attributes' => array(
                'class' => 'w60',
            ),
            'options' => array(
                'label' => '申請担当者ID',
            ),
        ));

        $this->add(array(
            'name' => 'com_grade',
            'type' => 'Text',
            'attributes' => array(
                'class' => 'w60',
            ),
            'options' => array(
                'label' => '企業規模',
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
