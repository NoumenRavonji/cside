<?php

namespace Application\Model\Data;

use Application\Model\FmModel;
use Application\Model\AuthModel;

class MstFmTable extends TableModel
{
	protected $name = 'mst_fm';

	public function searchRecord($pageNo,FmModel $fm)
	{
		$data = array(
			'id' => $fm->id,
            'fm_cd' => $fm->fmCd,
            'fm_child_num' => $fm->fmChildNum,
            'fm_name' => $fm->fmName,
            'branch_id' => $fm->branchId,
            'area_id' => $fm->areaId,
            'issue_amount' => $fm->issueAmount,
            'app_tel' => $fm->appTel,
            'hotline_tel' => $fm->hotlineTel,
            'contact_tel' => $fm->contactTel,
            'base_issue_date' => $fm->baseIssueDate,
            'proof_date' => $fm->proofDate,
            'datasend_date' => $fm->datasendDate,
            'kampf_date' => $fm->kampfDate,
            'issue_base_sch_id' => $fm->issueBaseSchId,
        );

		return $this->searchRecordByData($pageNo, $data);

	}

	public function saveRecord(FmModel $fm, AuthModel $auth)
	{

		$data = array(
            'fm_cd' => $fm->fmCd,
            'fm_child_num' => $fm->fmChildNum,
            'fm_name' => $fm->fmName,
            'branch_id' => $fm->branchId,
            'area_id' => $fm->areaId,
            'issue_amount' => $fm->issueAmount,
            'app_tel' => $fm->appTel,
            'hotline_tel' => $fm->hotlineTel,
            'contact_tel' => $fm->contactTel,
            'base_issue_date' => $fm->baseIssueDate,
            'proof_date' => $fm->proofDate,
            'datasend_date' => $fm->datasendDate,
            'kampf_date' => $fm->kampfDate,
            'issue_base_sch_id' => $fm->issueBaseSchId,
        );

        return $this->saveRecordByData($fm->id, $data, $auth);

	}

}