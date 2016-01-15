<?php

namespace Application\Model\Data;

use Application\Model\VcModel;
use Application\Model\AuthModel;

class MstVcTable extends TableModel
{
	protected $name = 'mst_vc';

	public function searchRecord($pageNo,VcModel $vc)
	{
		$data = array(
			'id' => $vc->id,
            'vc_cd' => $vc->vcCd,
            'vc_name' => $vc->vcName,
            'vc_rep_name' => $vc->vcRepName,
            'vc_postcode' => $vc->vcPostcode,
            'vc_pref' => $vc->vcPref,
            'vc_add1' => $vc->vcAdd1,
            'vc_add2' => $vc->vcAdd2,
            'vc_tel' => $vc->vcTel,
            'vc_rep_email' => $vc->vcRepEmail,
            'vc_crg_name' => $vc->vcCrgName,
            'vc_crg_email' => $vc->vcCrgEmail,
            'vc_crg_tel' => $vc->vcCrgTel,
            'vc_com_grd' => $vc->vcComGrd,
            'vc_anti_sotial' => $vc->vcAntiSotial,
            'reg_staff' => $vc->regStaff,
            'vc_busi_cat' => $vc->vcBusiCat,
            'contract_date' => $vc->contractDate,
            'expiration_date' => $vc->expirationDate,
            'status' => $vc->status,
            'acount_cnt' => $vc->acountCnt,
        );
		
		return $this->searchRecordByData($pageNo, $data);

	}

	public function saveRecord(VcModel $vc, AuthModel $auth)
	{
		$data = array(
			'id' => $vc->id,
            'vc_cd' => $vc->vcCd,
            'vc_name' => $vc->vcName,
            'vc_rep_name' => $vc->vcRepName,
            'vc_postcode' => $vc->vcPostcode,
            'vc_pref' => $vc->vcPref,
            'vc_add1' => $vc->vcAdd1,
            'vc_add2' => $vc->vcAdd2,
            'vc_tel' => $vc->vcTel,
            'vc_rep_email' => $vc->vcRepEmail,
            'vc_crg_name' => $vc->vcCrgName,
            'vc_crg_email' => $vc->vcCrgEmail,
            'vc_crg_tel' => $vc->vcCrgTel,
            'vc_com_grd' => $vc->vcComGrd,
            'vc_anti_sotial' => $vc->vcAntiSotial,
            'reg_staff' => $vc->regStaff,
            'vc_busi_cat' => $vc->vcBusiCat,
            'contract_date' => $vc->contractDate,
            'expiration_date' => $vc->expirationDate,
            'status' => $vc->status,
            'acount_cnt' => $vc->acountCnt,
        );
		
        return $this->saveRecordByData($vc->id, $data ,$auth);

	}

}