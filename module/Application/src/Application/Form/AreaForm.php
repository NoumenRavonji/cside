<?php
namespace Application\Form;

 use Zend\Form\Form;

 class AreaForm extends Form
 {
    public function __construct($name = null)
    {
         // we want to ignore the name passed
        parent::__construct('area');
        $this->setAttribute('method','post');

        $this->add(array(
            'name' => 'id',
            'type' => 'Hidden',
        ));

        $this->add(array(
            'name' => 'area_cd',
            'type' => 'Text',
            'attributes' => array(
                'class' => 'w60',
            ),
            'options' => array(
                'label' => 'エリアコード',
            ),
        ));

        $this->add(array(
            'name' => 'area_name',
            'type' => 'Text',
            'attributes' => array(
                'class' => 'w60',
            ),
            'options' => array(
                'label' => 'エリア名',
            ),
        ));

        $this->add(array(
            'name' => 'area_kana',
            'type' => 'Text',
            'attributes' => array(
                'class' => 'w60',
            ),
            'options' => array(
                'label' => 'エリア名カナ',
            ),
        ));

        $this->add(array(
            'name' => 'pref_id',
            'type' => 'Select',
            'attributes' => array(
                //'class' => 'w60',
            ),
            'options' => array(
                'label' => '都道府県',
            ),
        ));

        $this->add(array(
            'name' => 'disp_flag',
            'type' => 'Radio',
            'attributes' => array(
                //'class' => 'w60',
            ),
            'options' => array(
                'label' => '表示フラグ',
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