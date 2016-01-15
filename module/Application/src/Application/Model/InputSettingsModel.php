<?php
namespace Application\Model;

class InputSettingsModel extends ModelBasic
{

    public $id;
    public $tmpFmtId;
    public $inputSetId;


    public function __construct($data = null){
        $this->myTable = $data['inputSettingsTable'];
    }


    public function exchangeArray($data)
    {
        $this->id     = (!empty($data['id'])) ? $data['id'] : null;
        $this->tmpFmtId = (!empty($data['tmp_fmt_id'])) ? $data['tmp_fmt_id'] : null;
        $this->inputSetId = (!empty($data['input_set_id'])) ? $data['input_set_id'] : null;
    }

    public function exchangeArrayFromTable($data)
    {
        $this->id     = (!empty($data['id'])) ? $data['id'] : null;
        $this->tmpFmtId = (!empty($data['tmp_fmt_id'])) ? $data['tmp_fmt_id'] : null;
        $this->inputSetId = (!empty($data['input_set_id'])) ? $data['input_set_id'] : null;
    }
    
}
