<?php
namespace Application\Form;

 use Zend\Form\Form;

 class TmpInputDataForm extends Form
 {
    public function __construct($name = null)
    {
         // we want to ignore the name passed
        parent::__construct('tmpInputData');
        $this->setAttribute('method','post');

        $this->add(array(
            'name' => 'id',
            'type' => 'Hidden',
        ));

        $this->add(array(
            'name' => 'tmp_input_id',
            'type' => 'Text',
            'attributes' => array(
                'class' => 'w60',
            ),
            'options' => array(
                'label' => '選択入力ID',
            ),
        ));

        $this->add(array(
            'name' => 'tmp_input_datas_name',
            'type' => 'Text',
            'attributes' => array(
                'class' => 'w60',
            ),
            'options' => array(
                'label' => '選択入力表示名',
            ),
        ));

        $this->add(array(
            'name' => 'tmp_input_datas_disp',
            'type' => 'Text',
            'attributes' => array(
                'class' => 'w60',
            ),
            'options' => array(
                'label' => '選択入力登録名',
            ),
        ));

        $this->add(array(
            'name' => 'tmp_input_datas_img',
            'type' => 'File',
            'attributes' => array(
                'class' => 'w60',
            ),
            'options' => array(
                'label' => '表示画像',
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
