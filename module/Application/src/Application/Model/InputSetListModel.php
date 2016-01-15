<?php
namespace Application\Model;

class InputSetListModel extends ModelBasic
{

    public $id;
    public $inputSetCd;
    public $inputSetName;
    public $maxValue;
    public $minValue;
    public $impValue;
    public $impWork;


    public function __construct($data = null){
        $this->myTable = $data['inputSetListTable'];
    }


    public function exchangeArray($data)
    {
        $this->id     = (!empty($data['id'])) ? $data['id'] : null;
        $this->inputSetCd = (!empty($data['input_set_cd'])) ? $data['input_set_cd'] : null;
        $this->inputSetName = (!empty($data['input_set_name'])) ? $data['input_set_name'] : null;
        $this->maxValue = (!empty($data['max_value'])) ? $data['max_value'] : null;
        $this->minValue = (!empty($data['min_value'])) ? $data['min_value'] : null;
        $this->impValue = (!empty($data['imp_value'])) ? $data['imp_value'] : null;
        $this->impWork = (!empty($data['imp_work'])) ? $data['imp_work'] : null;
    }

    public function exchangeArrayFromTable($data)
    {
        $this->id     = (!empty($data['id'])) ? $data['id'] : null;
        $this->inputSetCd = (!empty($data['input_set_cd'])) ? $data['input_set_cd'] : null;
        $this->inputSetName = (!empty($data['input_set_name'])) ? $data['input_set_name'] : null;
        $this->maxValue = (!empty($data['max_value'])) ? $data['max_value'] : null;
        $this->minValue = (!empty($data['min_value'])) ? $data['min_value'] : null;
        $this->impValue = (!empty($data['imp_value'])) ? $data['imp_value'] : null;
        $this->impWork = (!empty($data['imp_work'])) ? $data['imp_work'] : null;
    }
    
}
