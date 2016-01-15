<?php
namespace Application\Form;

 use Zend\Form\Form;

 class BranchForm extends Form
 {
    public function __construct($name = null)
    {
         // we want to ignore the name passed
        parent::__construct('branch');
        $this->setAttribute('method','post');

        $this->add(array(
            'name' => 'id',
            'type' => 'Hidden',
        ));

        $this->add(array(
            'name' => 'branch_cd',
            'type' => 'Text',
            'attributes' => array(
                'class' => 'w60',
            ),
            'options' => array(
                'label' => '営業所コード',
            ),
        ));

        $this->add(array(
            'name' => 'branch_name',
            'type' => 'Text',
            'attributes' => array(
                'class' => 'w60',
            ),
            'options' => array(
                'label' => '営業所名',
            ),
        ));

        $this->add(array(
            'name' => 'branch_kana',
            'type' => 'Text',
            'attributes' => array(
                'class' => 'w60',
            ),
            'options' => array(
                'label' => '営業所カナ',
            ),
        ));

        $this->add(array(
            'name' => 'branch_tel',
            'type' => 'Text',
            'attributes' => array(
                'class' => 'w60',
            ),
            'options' => array(
                'label' => '電話番号',
            ),
        ));

        $this->add(array(
            'name' => 'branch_postcode',
            'type' => 'Text',
            'attributes' => array(
                'class' => 'w60',
            ),
            'options' => array(
                'label' => '郵便番号',
            ),
        ));

        $this->add(array(
            'name' => 'branch_add1',
            'type' => 'Text',
            'attributes' => array(
                'class' => 'w60',
            ),
            'options' => array(
                'label' => '住所１',
            ),
        ));

        $this->add(array(
            'name' => 'branch_add2',
            'type' => 'Text',
            'attributes' => array(
                'class' => 'w60',
            ),
            'options' => array(
                'label' => '住所２',
            ),
        ));

        $this->add(array(
            'name' => 'branch_fax',
            'type' => 'Text',
            'attributes' => array(
                'class' => 'w60',
            ),
            'options' => array(
                'label' => 'FAX番号',
            ),
        ));

        $this->add(array(
            'name' => 'area_id',
            'type' => 'Select',
            'attributes' => array(
                //'class' => 'w60',
            ),
            'options' => array(
                'label' => 'エリア',
            ),
        ));

        $this->add(array(
            'name' => 'app_tel',
            'type' => 'Text',
            'attributes' => array(
                'class' => 'w60',
            ),
            'options' => array(
                'label' => '広告掲載申し込みTEL',
            ),
        ));

        $this->add(array(
            'name' => 'hotline_tel',
            'type' => 'Text',
            'attributes' => array(
                'class' => 'w60',
            ),
            'options' => array(
                'label' => '読者ホットラインTEL',
            ),
        ));

        $this->add(array(
            'name' => 'contact_tel',
            'type' => 'Text',
            'attributes' => array(
                'class' => 'w60',
            ),
            'options' => array(
                'label' => 'お問い合わせTEL',
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