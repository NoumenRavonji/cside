<?php
namespace Application\Model;

class BranchModel extends ModelBasic
{

    public $id;
    public $branchCd;
    public $branchName;
    public $branchKana;
    public $branchTel;
    public $branchPostcode;
    public $branchAdd1;
    public $branchAdd2;
    public $branchFax;
    public $areaId;
    public $appTel;
    public $hotlineTel;
    public $contactTel;


    public function __construct($data = null){
        $this->myTable = $data['branchTable'];
    }


    public function exchangeArray($data)
    {
        $this->id     = (!empty($data['id'])) ? $data['id'] : null;
        $this->branchCd = (!empty($data['branch_cd'])) ? $data['branch_cd'] : null;
        $this->branchName = (!empty($data['branch_name'])) ? $data['branch_name'] : null;
        $this->branchKana = (!empty($data['branch_kana'])) ? $data['branch_kana'] : null;
        $this->branchTel = (!empty($data['branch_tel'])) ? $data['branch_tel'] : null;
        $this->branchPostcode = (!empty($data['branch_postcode'])) ? $data['branch_postcode'] : null;
        $this->branchAdd1 = (!empty($data['branch_add1'])) ? $data['branch_add1'] : null;
        $this->branchAdd2 = (!empty($data['branch_add2'])) ? $data['branch_add2'] : null;
        $this->branchFax = (!empty($data['branch_fax'])) ? $data['branch_fax'] : null;
        $this->areaId = (!empty($data['area_id'])) ? $data['area_id'] : null;
        $this->appTel = (!empty($data['app_tel'])) ? $data['app_tel'] : null;
        $this->hotlineTel = (!empty($data['hotline_tel'])) ? $data['hotline_tel'] : null;
        $this->contactTel = (!empty($data['contact_tel'])) ? $data['contact_tel'] : null;
    }

    public function exchangeArrayFromTable($data)
    {
        $this->id     = (!empty($data['id'])) ? $data['id'] : null;
        $this->branchCd = (!empty($data['branch_cd'])) ? $data['branch_cd'] : null;
        $this->branchName = (!empty($data['branch_name'])) ? $data['branch_name'] : null;
        $this->branchKana = (!empty($data['branch_kana'])) ? $data['branch_kana'] : null;
        $this->branchTel = (!empty($data['branch_tel'])) ? $data['branch_tel'] : null;
        $this->branchPostcode = (!empty($data['branch_postcode'])) ? $data['branch_postcode'] : null;
        $this->branchAdd1 = (!empty($data['branch_add1'])) ? $data['branch_add1'] : null;
        $this->branchAdd2 = (!empty($data['branch_add2'])) ? $data['branch_add2'] : null;
        $this->branchFax = (!empty($data['branch_fax'])) ? $data['branch_fax'] : null;
        $this->areaId = (!empty($data['area_id'])) ? $data['area_id'] : null;
        $this->appTel = (!empty($data['app_tel'])) ? $data['app_tel'] : null;
        $this->hotlineTel = (!empty($data['hotline_tel'])) ? $data['hotline_tel'] : null;
        $this->contactTel = (!empty($data['contact_tel'])) ? $data['contact_tel'] : null;
    }
    
}