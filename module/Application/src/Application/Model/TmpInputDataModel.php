<?php
namespace Application\Model;

class TmpInputDataModel extends ModelBasic
{

    public $id;
    public $tmpInputId;
    public $tmpInputDatasName;
    public $tmpInputDatasDisp;
    public $tmpInputDatasImg;


    public function __construct($data = null){
        $this->myTable = $data['tmpInputDataTable'];
    }


    public function exchangeArray($data)
    {
        $this->id     = (!empty($data['id'])) ? $data['id'] : null;
        $this->tmpInputId = (!empty($data['tmp_input_id'])) ? $data['tmp_input_id'] : null;
        $this->tmpInputDatasName = (!empty($data['tmp_input_datas_name'])) ? $data['tmp_input_datas_name'] : null;
        $this->tmpInputDatasDisp = (!empty($data['tmp_input_datas_disp'])) ? $data['tmp_input_datas_disp'] : null;
        $this->tmpInputDatasImg = (!empty($data['tmp_input_datas_img'])) ? $data['tmp_input_datas_img'] : null;
    }

    public function exchangeArrayFromTable($data)
    {
        $this->id     = (!empty($data['id'])) ? $data['id'] : null;
        $this->tmpInputId = (!empty($data['tmp_input_id'])) ? $data['tmp_input_id'] : null;
        $this->tmpInputDatasName = (!empty($data['tmp_input_datas_name'])) ? $data['tmp_input_datas_name'] : null;
        $this->tmpInputDatasDisp = (!empty($data['tmp_input_datas_disp'])) ? $data['tmp_input_datas_disp'] : null;
        $this->tmpInputDatasImg = (!empty($data['tmp_input_datas_img'])) ? $data['tmp_input_datas_img'] : null;
    }
    
}
