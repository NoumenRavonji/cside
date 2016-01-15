<?php
namespace Application\Model;

class TmpInputHeaderModel extends ModelBasic
{

    public $id;
    public $tmpInputHdCd;
    public $tmpInputHdName;
    public $inputTypeId;


    public function __construct($data = null){
        $this->myTable = $data['tmpInputHeaderTable'];
    }


    public function exchangeArray($data)
    {
        $this->id     = (!empty($data['id'])) ? $data['id'] : null;
        $this->tmpInputHdCd = (!empty($data['tmp_input_hd_cd'])) ? $data['tmp_input_hd_cd'] : null;
        $this->tmpInputHdName = (!empty($data['tmp_input_hd_name'])) ? $data['tmp_input_hd_name'] : null;
        $this->inputTypeId = (!empty($data['input_type_id'])) ? $data['input_type_id'] : null;
    }

    public function exchangeArrayFromTable($data)
    {
        $this->id     = (!empty($data['id'])) ? $data['id'] : null;
        $this->tmpInputHdCd = (!empty($data['tmp_input_hd_cd'])) ? $data['tmp_input_hd_cd'] : null;
        $this->tmpInputHdName = (!empty($data['tmp_input_hd_name'])) ? $data['tmp_input_hd_name'] : null;
        $this->inputTypeId = (!empty($data['input_type_id'])) ? $data['input_type_id'] : null;
    }
    
}
