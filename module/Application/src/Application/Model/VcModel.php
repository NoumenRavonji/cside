<?php
namespace Application\Model;

class VcModel extends ModelBasic
{
	public $id;
    public $vcCd;
    public $vcName;
    public $vcRepName;
    public $vcPostcode;
    public $vcPref;
    public $vcAdd1;
    public $vcAdd2;
    public $vcTel;
    public $vcRepEmail;
    public $vcCrgName;
    public $vcCrgEmail;
    public $vcCrgTel;
    public $vcComGrd;
    public $vcAntiSotial;
    public $regStaff;
    public $vcBusiCat;
    public $contractDate;
    public $expirationDate;
    public $status;
    public $acountCnt;
	
    public function __construct($data = null){
        $this->myTable = $data['vcTable'];
    }

    public function exchangeArray($data)
    {
        $this->id     = (!empty($data['id'])) ? $data['id'] : null;
        $this->vcCd = (!empty($data['vc_cd'])) ? $data['vc_cd'] : null;
        $this->vcName = (!empty($data['vc_name'])) ? $data['vc_name'] : null;
        $this->vcRepName = (!empty($data['vc_rep_name'])) ? $data['vc_rep_name'] : null;
        $this->vcPostcode = (!empty($data['vc_postcode'])) ? $data['vc_postcode'] : null;
        $this->vcPref = (!empty($data['vc_pref'])) ? $data['vc_pref'] : null;
        $this->vcAdd1 = (!empty($data['vc_add1'])) ? $data['vc_add1'] : null;
        $this->vcAdd2 = (!empty($data['vc_add2'])) ? $data['vc_add2'] : null;
        $this->vcTel = (!empty($data['vc_tel'])) ? $data['vc_tel'] : null;
        $this->vcRepEmail = (!empty($data['vc_rep_email'])) ? $data['vc_rep_email'] : null;
        $this->vcCrgName = (!empty($data['vc_crg_name'])) ? $data['vc_crg_name'] : null;
        $this->vcCrgEmail = (!empty($data['vc_crg_email'])) ? $data['vc_crg_email'] : null;
        $this->vcCrgTel = (!empty($data['vc_crg_tel'])) ? $data['vc_crg_tel'] : null;
        $this->vcComGrd = (!empty($data['vc_com_grd'])) ? $data['vc_com_grd'] : null;
        $this->vcAntiSotial = (!empty($data['vc_anti_sotial'])) ? $data['vc_anti_sotial'] : null;
        $this->regStaff = (!empty($data['reg_staff'])) ? $data['reg_staff'] : null;
        $this->vcBusiCat = (!empty($data['vc_busi_cat'])) ? $data['vc_busi_cat'] : null;
        $this->contractDate = (!empty($data['contract_date'])) ? $data['contract_date'] : null;
        $this->expirationDate = (!empty($data['expiration_date'])) ? $data['expiration_date'] : null;
        $this->status = (!empty($data['status'])) ? $data['status'] : null;
        $this->acountCnt = (!empty($data['acount_cnt'])) ? $data['acount_cnt'] : null;
    }

    public function exchangeArrayFromTable($data)
    {
        $this->id     = (!empty($data['id'])) ? $data['id'] : null;
        $this->vcCd = (!empty($data['vc_cd'])) ? $data['vc_cd'] : null;
        $this->vcName = (!empty($data['vc_name'])) ? $data['vc_name'] : null;
        $this->vcRepName = (!empty($data['vc_rep_name'])) ? $data['vc_rep_name'] : null;
        $this->vcPostcode = (!empty($data['vc_postcode'])) ? $data['vc_postcode'] : null;
        $this->vcPref = (!empty($data['vc_pref'])) ? $data['vc_pref'] : null;
        $this->vcAdd1 = (!empty($data['vc_add1'])) ? $data['vc_add1'] : null;
        $this->vcAdd2 = (!empty($data['vc_add2'])) ? $data['vc_add2'] : null;
        $this->vcTel = (!empty($data['vc_tel'])) ? $data['vc_tel'] : null;
        $this->vcRepEmail = (!empty($data['vc_rep_email'])) ? $data['vc_rep_email'] : null;
        $this->vcCrgName = (!empty($data['vc_crg_name'])) ? $data['vc_crg_name'] : null;
        $this->vcCrgEmail = (!empty($data['vc_crg_email'])) ? $data['vc_crg_email'] : null;
        $this->vcCrgTel = (!empty($data['vc_crg_tel'])) ? $data['vc_crg_tel'] : null;
        $this->vcComGrd = (!empty($data['vc_com_grd'])) ? $data['vc_com_grd'] : null;
        $this->vcAntiSotial = (!empty($data['vc_anti_sotial'])) ? $data['vc_anti_sotial'] : null;
        $this->regStaff = (!empty($data['reg_staff'])) ? $data['reg_staff'] : null;
        $this->vcBusiCat = (!empty($data['vc_busi_cat'])) ? $data['vc_busi_cat'] : null;
        $this->contractDate = (!empty($data['contract_date'])) ? $data['contract_date'] : null;
        $this->expirationDate = (!empty($data['expiration_date'])) ? $data['expiration_date'] : null;
        $this->status = (!empty($data['status'])) ? $data['status'] : null;
        $this->acountCnt = (!empty($data['acount_cnt'])) ? $data['acount_cnt'] : null;
    }
    
}