<?php
namespace Application\Form;

 use Zend\Form\Form;

 class TmpFmtDataForm extends Form
 {
    public function __construct($name = null)
    {
         // we want to ignore the name passed
        parent::__construct('tmpFmtData');
        $this->setAttribute('method','post');

        $this->add(array(
            'name' => 'id',
            'type' => 'Hidden',
        ));

        $this->add(array(
            'name' => 'tmp_fmt_id',
            'type' => 'Text',
            'attributes' => array(
                'class' => 'w60',
            ),
            'options' => array(
                'label' => 'テンプレートフォーマットID',
            ),
        ));

        $this->add(array(
            'name' => 'tmp_fmt_data_cd',
            'type' => 'Text',
            'attributes' => array(
                'class' => 'w60',
            ),
            'options' => array(
                'label' => 'テンプレートフォーマットデータコード名',
            ),
        ));

        $this->add(array(
            'name' => 'tmp_fmt_data_name',
            'type' => 'Text',
            'attributes' => array(
                'class' => 'w60',
            ),
            'options' => array(
                'label' => 'テンプレートフォーマットデータコード',
            ),
        ));

        $this->add(array(
            'name' => 'input_type_id',
            'type' => 'Text',
            'attributes' => array(
                'class' => 'w60',
            ),
            'options' => array(
                'label' => '入力項目名',
            ),
        ));

        $this->add(array(
            'name' => 'tmp_imput_id',
            'type' => 'Text',
            'attributes' => array(
                'class' => 'w60',
            ),
            'options' => array(
                'label' => '選択入力ID',
            ),
        ));

        $this->add(array(
            'name' => 'set_mst_shop',
            'type' => 'Text',
            'attributes' => array(
                'class' => 'w60',
            ),
            'options' => array(
                'label' => '自動取込対象カラム',
            ),
        ));

        $this->add(array(
            'name' => 'disp_num',
            'type' => 'Text',
            'attributes' => array(
                'class' => 'w60',
            ),
            'options' => array(
                'label' => '入力画面での表示場所',
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
