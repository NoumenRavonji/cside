<?php
namespace Application\Form;

 use Zend\Form\Form;

 class TmpFmtHeaderForm extends Form
 {
    public function __construct($name = null)
    {
         // we want to ignore the name passed
        parent::__construct('tmpFmtHeader');
        $this->setAttribute('method','post');

        $this->add(array(
            'name' => 'id',
            'type' => 'Hidden',
        ));

        $this->add(array(
            'name' => 'tmp_fmt_hd_cd',
            'type' => 'Text',
            'attributes' => array(
                'class' => 'w60',
            ),
            'options' => array(
                'label' => 'テンプレートフォーマットコード',
            ),
        ));

        $this->add(array(
            'name' => 'tmp_fmt_hd_name',
            'type' => 'Text',
            'attributes' => array(
                'class' => 'w60',
            ),
            'options' => array(
                'label' => 'テンプレートフォーマット名',
            ),
        ));

        $this->add(array(
            'name' => 'tmp_fmt_hd_cat_id',
            'type' => 'Text',
            'attributes' => array(
                'class' => 'w60',
            ),
            'options' => array(
                'label' => '広告カテゴリID',
            ),
        ));

        $this->add(array(
            'name' => 'tmp_fmt_hd_memo',
            'type' => 'Text',
            'attributes' => array(
                'class' => 'w60',
            ),
            'options' => array(
                'label' => 'メモ',
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
