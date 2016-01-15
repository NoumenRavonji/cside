<?php

namespace Application\Model\Data;

use Application\Model\BranchModel;
use Application\Model\AuthModel;

class MstBranchTable extends TableModel
{
	protected $name = 'mst_branch';

	public function searchRecord($pageNo,BranchModel $branch)
	{
		$data = array(
			'id' => $branch->id,
            'branch_cd' => $branch->branchCd,
            'branch_name' => $branch->branchName,
            'branch_kana' => $branch->branchKana,
            'branch_tel' => $branch->branchTel,
            'branch_postcode' => $branch->branchPostcode,
            'branch_add1' => $branch->branchAdd1,
            'branch_add2' => $branch->branchAdd2,
            'branch_fax' => $branch->branchFax,
            'area_id' => $branch->areaId,
            'app_tel' => $branch->appTel,
            'hotline_tel' => $branch->hotlineTel,
            'contact_tel' => $branch->contactTel,
        );

		return $this->searchRecordByData($pageNo, $data);

	}

	public function saveRecord(BranchModel $branch, AuthModel $auth)
	{

		$data = array(
            'branch_cd' => $branch->branchCd,
            'branch_name' => $branch->branchName,
            'branch_kana' => $branch->branchKana,
            'branch_tel' => $branch->branchTel,
            'branch_postcode' => $branch->branchPostcode,
            'branch_add1' => $branch->branchAdd1,
            'branch_add2' => $branch->branchAdd2,
            'branch_fax' => $branch->branchFax,
            'area_id' => $branch->areaId,
            'app_tel' => $branch->appTel,
            'hotline_tel' => $branch->hotlineTel,
            'contact_tel' => $branch->contactTel,
        );

        return $this->saveRecordByData($branch->id, $data ,$auth);

	}

}