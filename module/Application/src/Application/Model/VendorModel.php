<?php
namespace Application\Model;

class VendorModel extends ModelBasic
{
    public $id;
	public $vendorCd;
	public $vendorName;
	public $vendorAbb;
	public $vendorCatId;
	public $vendorPostcode;
	public $vendorAdd1;
	public $vendorAdd2;
	public $vendorTel;
	public $vendorFax;
	public $vendorRep;
	public $vendorCrg;
	public $vendorEmail;
	public $vendorKana1;
	public $vendorKana2;
	public $vendorKana3;
	public $vendorKana4;
	public $vendorKana5;
	public $branchId;
	public $staffId;
	public $comGrade;
    

    public function __construct($data = null){
        $this->myTable = $data['vendorTable'];
    }


    public function exchangeArray($data)
    {
        $this->id     = (!empty($data['id'])) ? $data['id'] : null;
        $this->vendorCd = (!empty($data['sup_cd'])) ? $data['sup_cd'] : null;
        $this->vendorName = (!empty($data['sup_name'])) ? $data['sup_name'] : null;
        $this->vendorAbb = (!empty($data['sup_abb'])) ? $data['sup_abb'] : null;
        $this->vendorCatId = (!empty($data['supcat_id'])) ? $data['sup_abb'] : null;
        $this->vendorPostcode = (!empty($data['sup_postcode'])) ? $data['sup_postcode'] : null;
        $this->vendorAdd1 = (!empty($data['sup_add1'])) ? $data['sup_add1'] : null;
        $this->vendorAdd2 = (!empty($data['sup_add2'])) ? $data['sup_add2'] : null;
        $this->vendorTel = (!empty($data['sup_tel'])) ? $data['sup_tel'] : null;
        $this->vendorFax = (!empty($data['sup_fax'])) ? $data['sup_fax'] : null;
        $this->vendorRep = (!empty($data['sup_rep'])) ? $data['sup_rep'] : null;
        $this->vendorCrg = (!empty($data['sup_crg'])) ? $data['sup_crg'] : null;
        $this->vendorEmail = (!empty($data['sup_email'])) ? $data['sup_email'] : null;
        $this->vendorKanal = (!empty($data['sup_kana1'])) ? $data['sup_kana1'] : null;
        $this->vendorKanal = (!empty($data['sup_kana1'])) ? $data['sup_kana1'] : null;
        $this->vendorKanal = (!empty($data['sup_kana2'])) ? $data['sup_kana2'] : null;
        $this->vendorKanal = (!empty($data['sup_kana3'])) ? $data['sup_kana3'] : null;
        $this->vendorKanal = (!empty($data['sup_kana4'])) ? $data['sup_kana4'] : null;
        $this->vendorKanal = (!empty($data['sup_kana5'])) ? $data['sup_kana5'] : null;
        $this->branchId = (!empty($data['branch_id'])) ? $data['branch_id'] : null;
        $this->branchId = (!empty($data['branch_id'])) ? $data['branch_id'] : null;
        $this->staffId = (!empty($data['staff_id'])) ? $data['staff_id'] : null;
        $this->comGrade = (!empty($data['com_grade'])) ? $data['com_grade'] : null;
        
    }

    public function exchangeArrayFromTable($data)
    {
        $this->id     = (!empty($data['id'])) ? $data['id'] : null;
        $this->vendorCd = (!empty($data['sup_cd'])) ? $data['sup_cd'] : null;
        $this->vendorName = (!empty($data['sup_name'])) ? $data['sup_name'] : null;
        $this->vendorAbb = (!empty($data['sup_abb'])) ? $data['sup_abb'] : null;
        $this->vendorCatId = (!empty($data['supcat_id'])) ? $data['sup_abb'] : null;
        $this->vendorPostcode = (!empty($data['sup_postcode'])) ? $data['sup_postcode'] : null;
        $this->vendorAdd1 = (!empty($data['sup_add1'])) ? $data['sup_add1'] : null;
        $this->vendorAdd2 = (!empty($data['sup_add2'])) ? $data['sup_add2'] : null;
        $this->vendorTel = (!empty($data['sup_tel'])) ? $data['sup_tel'] : null;
        $this->vendorFax = (!empty($data['sup_fax'])) ? $data['sup_fax'] : null;
        $this->vendorRep = (!empty($data['sup_rep'])) ? $data['sup_rep'] : null;
        $this->vendorCrg = (!empty($data['sup_crg'])) ? $data['sup_crg'] : null;
        $this->vendorEmail = (!empty($data['sup_email'])) ? $data['sup_email'] : null;
        $this->vendorKanal = (!empty($data['sup_kana1'])) ? $data['sup_kana1'] : null;
        $this->vendorKanal = (!empty($data['sup_kana1'])) ? $data['sup_kana1'] : null;
        $this->vendorKanal = (!empty($data['sup_kana2'])) ? $data['sup_kana2'] : null;
        $this->vendorKanal = (!empty($data['sup_kana3'])) ? $data['sup_kana3'] : null;
        $this->vendorKanal = (!empty($data['sup_kana4'])) ? $data['sup_kana4'] : null;
        $this->vendorKanal = (!empty($data['sup_kana5'])) ? $data['sup_kana5'] : null;
        $this->branchId = (!empty($data['branch_id'])) ? $data['branch_id'] : null;
        $this->branchId = (!empty($data['branch_id'])) ? $data['branch_id'] : null;
        $this->staffId = (!empty($data['staff_id'])) ? $data['staff_id'] : null;
        $this->comGrade = (!empty($data['com_grade'])) ? $data['com_grade'] : null;
    }
    
}
