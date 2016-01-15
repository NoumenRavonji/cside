<?php
namespace Application\Model;

class AreaModel extends ModelBasic
{

    public $id;
    public $areaCd;
    public $areaName;
    public $areaKana;
    public $prefId;
    public $dispFlag;

    public function __construct($data = null){
        $this->myTable = $data['areaTable'];
    }


    public function exchangeArray($data)
    {
        $this->id     = (!empty($data['id'])) ? $data['id'] : null;
        $this->areaCd = (!empty($data['area_cd'])) ? $data['area_cd'] : null;
        $this->areaName = (!empty($data['area_name'])) ? $data['area_name'] : null;
        $this->areaKana = (!empty($data['area_kana'])) ? $data['area_kana'] : null;
        $this->prefId = (!empty($data['pref_id'])) ? $data['pref_id'] : null;
        $this->dispFlag = (!empty($data['disp_flag'])) ? $data['disp_flag'] : null;
    }

    public function exchangeArrayFromTable($data)
    {
        $this->id     = (!empty($data['id'])) ? $data['id'] : null;
        $this->areaCd = (!empty($data['area_cd'])) ? $data['area_cd'] : null;
        $this->areaName = (!empty($data['area_name'])) ? $data['area_name'] : null;
        $this->areaKana = (!empty($data['area_kana'])) ? $data['area_kana'] : null;
        $this->prefId = (!empty($data['pref_id'])) ? $data['pref_id'] : null;
        $this->dispFlag = (!empty($data['disp_flag'])) ? $data['disp_flag'] : null;
    }
    
}