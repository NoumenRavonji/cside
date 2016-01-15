<?php
namespace Application\Model;

class CompanyScaleModel extends ModelBasic
{

    public $id;
    public $comGrdCd;
    public $comGrdName;

    public function __construct($data = null)
    {
        $this->myTable = $data['companyScaleTable'];
    }

    public function exchangeArray($data)
    {
        $this->id     = (!empty($data['id'])) ? $data['id'] : null;
        $this->comGrdCd = (!empty($data['com_grd_cd'])) ? $data['com_grd_cd'] : null;
        $this->comGrdName = (!empty($data['com_grd_name'])) ? $data['com_grd_name'] : null;
    }

    public function exchangeArrayFromTable($data)
    {
        $this->id     = (!empty($data['id'])) ? $data['id'] : null;
        $this->comGrdCd = (!empty($data['com_grd_cd'])) ? $data['com_grd_cd'] : null;
        $this->comGrdName = (!empty($data['com_grd_name'])) ? $data['com_grd_name'] : null;
    }
    
}