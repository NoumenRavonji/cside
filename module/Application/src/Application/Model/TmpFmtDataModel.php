<?php
namespace Application\Model;

class TmpFmtDataModel extends ModelBasic
{

    public $id;
    public $tmpFmtId;
    public $tmpFmtDataCd;
    public $tmpFmtDataName;
    public $inputTypeId;
    public $tmpImputId;
    public $setMstShop;
    public $dispNum;


    public function __construct($data = null){
        $this->myTable = $data['tmpFmtDataTable'];
    }


    public function exchangeArray($data)
    {
        $this->id     = (!empty($data['id'])) ? $data['id'] : null;
        $this->tmpFmtId = (!empty($data['tmp_fmt_id'])) ? $data['tmp_fmt_id'] : null;
        $this->tmpFmtDataCd = (!empty($data['tmp_fmt_data_cd'])) ? $data['tmp_fmt_data_cd'] : null;
        $this->tmpFmtDataName = (!empty($data['tmp_fmt_data_name'])) ? $data['tmp_fmt_data_name'] : null;
        $this->inputTypeId = (!empty($data['input_type_id'])) ? $data['input_type_id'] : null;
        $this->tmpImputId = (!empty($data['tmp_imput_id'])) ? $data['tmp_imput_id'] : null;
        $this->setMstShop = (!empty($data['set_mst_shop'])) ? $data['set_mst_shop'] : null;
        $this->dispNum = (!empty($data['disp_num'])) ? $data['disp_num'] : null;
    }

    public function exchangeArrayFromTable($data)
    {
        $this->id     = (!empty($data['id'])) ? $data['id'] : null;
        $this->tmpFmtId = (!empty($data['tmp_fmt_id'])) ? $data['tmp_fmt_id'] : null;
        $this->tmpFmtDataCd = (!empty($data['tmp_fmt_data_cd'])) ? $data['tmp_fmt_data_cd'] : null;
        $this->tmpFmtDataName = (!empty($data['tmp_fmt_data_name'])) ? $data['tmp_fmt_data_name'] : null;
        $this->inputTypeId = (!empty($data['input_type_id'])) ? $data['input_type_id'] : null;
        $this->tmpImputId = (!empty($data['tmp_imput_id'])) ? $data['tmp_imput_id'] : null;
        $this->setMstShop = (!empty($data['set_mst_shop'])) ? $data['set_mst_shop'] : null;
        $this->dispNum = (!empty($data['disp_num'])) ? $data['disp_num'] : null;
    }
    
}
