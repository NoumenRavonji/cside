<?php
namespace Application\Form;

 use Zend\Form\Form;

 class ComCatForm extends Form
 {
    public function __construct($name = null)
    {
         // we want to ignore the name passed
        parent::__construct('comCat');
        $this->setAttribute('method','post');

        $this->add(array(
            'name' => 'id',
            'type' => 'Hidden',
        ));

        $this->add(array(
            'name' => 'com_cat_cd',
            'type' => 'Text',
            'attributes' => array(
                'class' => 'w60',
            ),
            'options' => array(
                'label' => '企業業種コード',
            ),
        ));

        $this->add(array(
            'name' => 'com_cat_name',
            'type' => 'Text',
            'attributes' => array(
                'class' => 'w60',
            ),
            'options' => array(
                'label' => '企業業種名',
            ),
        ));

        $this->add(array(
            'name' => 'com_cat_name',
            'type' => 'Text',
            'attributes' => array(
                'class' => 'w60',
            ),
            'options' => array(
                'label' => '企業業種名',
            ),
        ));

        $this->add(array(
            'name' => 'parent_com_cat_id',
            'type' => 'Select',
            'attributes' => array(
                //'class' => 'w60',
            ),
            'options' => array(
                'label' => '親企業業種名',
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