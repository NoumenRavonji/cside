<?php
namespace Application\Form;

 use Zend\Form\Form;

 class StaffForm extends Form
 {
    public function __construct($name = null)
    {
         // we want to ignore the name passed
        parent::__construct('staff');
        $this->setAttribute('method','post');

        $this->add(array(
            'name' => 'id',
            'type' => 'Hidden',
        ));

        $this->add(array(
            'name' => 'staff_cd',
            'type' => 'Text',
            'attributes' => array(
                'class' => 'w60',
            ),
            'options' => array(
                'label' => '社員コード',
            ),
        ));
       


        $this->add(array(
            'name' => 'staff_name',
            'type' => 'Text',
            'attributes' => array(
                'class' => 'w60',
            ),
            'options' => array(
                'label' => '社員名',
            ),
        ));
        $this->add(array(
            'name' => 'staff_kana',
            'type' => 'Text',
            'attributes' => array(
                'class' => 'w60',
            ),
            'options' => array(
                'label' => '社員名カナ',
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
            'name' => 'post_id',
            'type' => 'Text',
            'attributes' => array(
                'class' => 'w60',
            ),
            'options' => array(
                'label' => '役職ID',
            ),
        ));

        $this->add(array(
            'name' => 'enroll_knd',
            'type' => 'Text',
            'attributes' => array(
                'class' => 'w60',
            ),
            'options' => array(
                'label' => '在籍区分',
            ),
        ));

        $this->add(array(
            'name' => 'staff_email',
            'type' => 'Text',
            'attributes' => array(
                'class' => 'w60',
            ),
            'options' => array(
                'label' => 'メールアドレス',
            ),
        ));

        $this->add(array(
            'name' => 'staff_tel',
            'type' => 'Text',
            'attributes' => array(
                'class' => 'w60',
            ),
            'options' => array(
                'label' => '電話番号',
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
