<?php
namespace Application\Form;

 use Zend\Form\Form;

 class LoginForm extends Form
 {
    public function __construct($name = null)
    {
         // we want to ignore the name passed
        parent::__construct('branch');
        $this->setAttribute('method','post');

        $this->add(array(
            'name' => 'staff_email',
            'type' => 'Text',
            'attributes' => array(
                'class' => 'w80',
            ),
            'options' => array(
                'label' => 'メールアドレス',
            ),
        ));

        $this->add(array(
            'name' => 'password',
            'type' => 'Password',
            'attributes' => array(
                'class' => 'w80',
            ),
            'options' => array(
                'label' => 'パスワード',
            ),
        ));

        $this->add(array(
            'name' => 'submit',
            'type' => 'Submit',
            'attributes' => array(
                'value' => '認証確認',
                'id' => 'submitbutton',
            ),
        ));
    }

 }