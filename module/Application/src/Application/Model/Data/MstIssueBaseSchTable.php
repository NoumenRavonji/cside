<?php

namespace Application\Model\Data;

use Application\Model\IssueBaseSchModel;
use Application\Model\AuthModel;

class MstIssueBaseSchTable extends TableModel
{
	protected $name = 'mst_issue_base_sch';

	public function searchRecord($pageNo, IssueBaseSchModel $issueBaseSch)
	{
		$data = array(
			'id' => $area->id,
            'issue_base_sch_cd' => $issueBaseSch->issueBaseSchCd,
            'issue_base_sch_name' => $issueBaseSch->issueBaseSchName,
            'issue_base_sch_date' => $issueBaseSch->issueBaseSchDate,
            'note' => $issueBaseSch->note,
        );

		return $this->searchRecordByData($pageNo, $data);

	}

	public function saveRecord(IssueBaseSchModel $issueBaseSch, AuthModel $auth)
	{

		$data = array(
            'issue_base_sch_cd' => $issueBaseSch->issueBaseSchCd,
            'issue_base_sch_name' => $issueBaseSch->issueBaseSchName,
            'issue_base_sch_date' => $issueBaseSch->issueBaseSchDate,
            'note' => $issueBaseSch->note,
        );

        return $this->saveRecordByData($issueBaseSch->id, $data ,$auth);

	}

}