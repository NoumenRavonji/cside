<?php

namespace Application\Model\Data;

use Application\Model\VendorModel;
use Application\Model\AuthModel;

class MstVendorTable extends TableModel
{
	protected $name = 'mst_sup';

	public function searchRecord($pageNo,VendorModel $vendor)
	{
		$data = array(
			'id' => $vendor->id,
            'sup_cd' => $vendor->vendorCd,
            'sup_name' => $vendor->vendorName,
            'sup_abb' => $vendor->vendorAbb,
            'sup_cat_id' => $vendor->vendorCatId,
            'sup_postcode' => $vendor->vendorPostcode,
            'sup_add1' => $vendor->vendorAdd1,
            'sup_add2' => $vendor->vendorAdd2,
            'sup_tel' => $vendor->vendorTel,
            'sup_fax' => $vendor->vendorFax,
            'sup_rep' => $vendor->vendorRep,
            'sup_crg' => $vendor->vendorCrg,
            'sup_email' => $vendor->vendorEmail,
            'sup_kana1' => $vendor->vendorKana1,
            'sup_kana2' => $vendor->vendorKana2,
            'sup_kana3' => $vendor->vendorKana3,
            'sup_kana4' => $vendor->vendorKana4,
            'sup_kana5' => $vendor->vendorKana5,
            'branch_id' => $vendor->branchId,
            'staff_id' => $vendor->staffId,
            'com_grade' => $vendor->comGrade,
        );

		return $this->searchRecordByData($pageNo, $data);

	}

	public function saveRecord(VendorModel $vendor, AuthModel $auth)
	{

		$data = array(
			'id' => $vendor->id,
            'sup_cd' => $vendor->vendorCd,
            'sup_name' => $vendor->vendorName,
            'sup_abb' => $vendor->vendorAbb,
            'sup_cat_id' => $vendor->vendorCatId,
            'sup_postcode' => $vendor->vendorPostcode,
            'sup_add1' => $vendor->vendorAdd1,
            'sup_add2' => $vendor->vendorAdd2,
            'sup_tel' => $vendor->vendorTel,
            'sup_fax' => $vendor->vendorFax,
            'sup_rep' => $vendor->vendorRep,
            'sup_crg' => $vendor->vendorCrg,
            'sup_email' => $vendor->vendorEmail,
            'sup_kana1' => $vendor->vendorKana1,
            'sup_kana2' => $vendor->vendorKana2,
            'sup_kana3' => $vendor->vendorKana3,
            'sup_kana4' => $vendor->vendorKana4,
            'sup_kana5' => $vendor->vendorKana5,
            'branch_id' => $vendor->branchId,
            'staff_id' => $vendor->staffId,
            'com_grade' => $vendor->comGrade,
            'updated_at'  => time(),
            'updated_by'  => 'me',
        );

        return $this->saveRecordByData($vendor->id, $data ,$auth);

	}

}
