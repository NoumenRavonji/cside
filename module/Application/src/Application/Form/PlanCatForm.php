<?php
namespace Application\Form;

 use Zend\Form\Form;

 class PlanCatForm extends Form
 {
    public function __construct($name = null)
    {
         // we want to ignore the name passed
        parent::__construct('planCat');
        $this->setAttribute('method','post');

        $this->add(array(
            'name' => 'id',
            'type' => 'Hidden',
        ));

        $this->add(array(
            'name' => 'plan_cat_cd',
            'type' => 'Text',
            'attributes' => array(
                'class' => 'w60',
            ),
            'options' => array(
                'label' => '広告業種コード',
            ),
        ));

        $this->add(array(
            'name' => 'plan_cat_name',
            'type' => 'Text',
            'attributes' => array(
                'class' => 'w60',
            ),
            'options' => array(
                'label' => '広告業種名',
            ),
        ));


        $this->add(array(
            'name' => 'parent_plan_cat_id',
            'type' => 'Select',
            'attributes' => array(
                //'class' => 'w60',
            ),
            'options' => array(
                'label' => '親カテゴリ',
            ),
        ));

        $this->add(array(
            'name' => 'rank',
            'type' => 'Select',
            'attributes' => array(
                //'class' => 'w60',
            ),
            'options' => array(
                'label' => '階層',
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