<?php
namespace Application\Form;

 use Zend\Form\Form;

 class FmForm extends Form
 {
    public function __construct($name = null)
    {
         // we want to ignore the name passed
        parent::__construct('fm');
        $this->setAttribute('method','post');

        $this->add(array(
            'name' => 'id',
            'type' => 'Hidden',
        ));

        $this->add(array(
            'name' => 'fm_cd',
            'type' => 'Text',
            'attributes' => array(
                'class' => 'w60',
            ),
            'options' => array(
                'label' => '媒体コード',
            ),
        ));

        $this->add(array(
            'name' => 'fm_child_num',
            'type' => 'Text',
            'attributes' => array(
                'class' => 'w60',
            ),
            'options' => array(
                'label' => '媒体コード枝番',
            ),
        ));

        $this->add(array(
            'name' => 'fm_name',
            'type' => 'Text',
            'attributes' => array(
                'class' => 'w60',
            ),
            'options' => array(
                'label' => '媒体名',
            ),
        ));

        $this->add(array(
            'name' => 'branch_id',
            'type' => 'Select',
            'attributes' => array(
            ),
            'options' => array(
                'label' => '担当営業所',
            ),
        ));

        $this->add(array(
            'name' => 'area_id',
            'type' => 'Select',
            'attributes' => array(
            ),
            'options' => array(
                'label' => 'エリア',
            ),
        ));

        $this->add(array(
            'name' => 'issue_amount',
            'type' => 'Text',
            'attributes' => array(
                'class' => 'w60',
            ),
            'options' => array(
                'label' => '発行部数',
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
            'name' => 'base_issue_date',
            'type' => 'Number',
            'attributes' => array(
                'min'  => '0',
                'max'  => '60',
                'step' => '1',
            ),
            'options' => array(
                'label' => '基本発行日',
            ),
        ));

        $this->add(array(
            'name' => 'proof_date',
            'type' => 'Number',
            'attributes' => array(
                'min'  => '0',
                'max'  => '60',
                'step' => '1',
            ),
            'options' => array(
                'label' => 'スケジュール 校了日',
            ),
        ));

        $this->add(array(
            'name' => 'datasend_date',
            'type' => 'Number',
            'attributes' => array(
                'min'  => '0',
                'max'  => '60',
                'step' => '1',
            ),
            'options' => array(
                'label' => 'スケジュール データ渡し',
            ),
        ));

        $this->add(array(
            'name' => 'kampf_date',
            'type' => 'Number',
            'attributes' => array(
                'min'  => '0',
                'max'  => '60',
                'step' => '1',
            ),
            'options' => array(
                'label' => 'カンプ確認',
            ),
        ));

        $this->add(array(
            'name' => 'issue_base_sch_id',
            'type' => 'Select',
            'attributes' => array(
            ),
            'options' => array(
                'label' => '発行基本スケジュール',
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