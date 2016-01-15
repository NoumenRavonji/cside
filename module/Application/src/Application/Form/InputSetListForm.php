<?php
namespace Application\Form;

 use Zend\Form\Form;

 class InputSetListForm extends Form
 {
    public function __construct($name = null)
    {
         // we want to ignore the name passed
        parent::__construct('inputSetList');
        $this->setAttribute('method','post');

        $this->add(array(
            'name' => 'id',
            'type' => 'Hidden',
        ));

        $this->add(array(
            'name' => 'input_set_cd',
            'type' => 'Text',
            'attributes' => array(
                'class' => 'w60',
            ),
            'options' => array(
                'label' => '入力値制御コード',
            ),
        ));

        $this->add(array(
            'name' => 'input_set_name',
            'type' => 'Text',
            'attributes' => array(
                'class' => 'w60',
            ),
            'options' => array(
                'label' => '入力値制御名',
            ),
        ));

        $this->add(array(
            'name' => 'max_value',
            'type' => 'Text',
            'attributes' => array(
                'class' => 'w60',
            ),
            'options' => array(
                'label' => '最小値',
            ),
        ));

        $this->add(array(
            'name' => 'min_value',
            'type' => 'Text',
            'attributes' => array(
                'class' => 'w60',
            ),
            'options' => array(
                'label' => '最大値',
            ),
        ));

        $this->add(array(
            'name' => 'imp_value',
            'type' => 'Text',
            'attributes' => array(
                'class' => 'w60',
            ),
            'options' => array(
                'label' => '実施値',
            ),
        ));

        $this->add(array(
            'name' => 'imp_work',
            'type' => 'Text',
            'attributes' => array(
                'class' => 'w60',
            ),
            'options' => array(
                'label' => '実施作業',
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
