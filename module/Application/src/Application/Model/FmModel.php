<?php
namespace Application\Model;

class FmModel extends ModelBasic
{

    public $id;
    public $fmCd;
    public $fmChildNum;
    public $fmName;
    public $branchId;
    public $areaId;
    public $issueAmount;
    public $appTel;
    public $hotlineTel;
    public $contactTel;
    public $baseIssueDate;
    public $proofDate;
    public $datasendDate;
    public $kampfDate;
    public $issueBaseSchId;

    public function __construct($data = null)
    {
        $this->myTable = $data['fmTable'];
    }

    public function exchangeArray($data)
    {
        $this->id     = (!empty($data['id'])) ? $data['id'] : null;
        $this->fmCd = (!empty($data['fm_cd'])) ? $data['fm_cd'] : null;
        $this->fmChildNum = (!empty($data['fm_child_num'])) ? $data['fm_child_num'] : null;
        $this->fmName = (!empty($data['fm_name'])) ? $data['fm_name'] : null;
        $this->branchId = (!empty($data['branch_id'])) ? $data['branch_id'] : null;
        $this->areaId = (!empty($data['area_id'])) ? $data['area_id'] : null;
        $this->issueAmount = (!empty($data['issue_amount'])) ? $data['issue_amount'] : null;
        $this->appTel = (!empty($data['app_tel'])) ? $data['app_tel'] : null;
        $this->hotlineTel = (!empty($data['hotline_tel'])) ? $data['hotline_tel'] : null;
        $this->contactTel = (!empty($data['contact_tel'])) ? $data['contact_tel'] : null;
        $this->baseIssueDate = (!empty($data['base_issue_date'])) ? $data['base_issue_date'] : null;
        $this->proofDate = (!empty($data['proof_date'])) ? $data['proof_date'] : null;
        $this->datasendDate = (!empty($data['datasend_date'])) ? $data['datasend_date'] : null;
        $this->kampfDate = (!empty($data['kampf_date'])) ? $data['kampf_date'] : null;
        $this->issueBaseSchId = (!empty($data['issue_base_sch_id'])) ? $data['issue_base_sch_id'] : null;
    }

    public function exchangeArrayFromTable($data)
    {
        $this->id     = (!empty($data['id'])) ? $data['id'] : null;
        $this->fmCd = (!empty($data['fm_cd'])) ? $data['fm_cd'] : null;
        $this->fmChildNum = (!empty($data['fm_child_num'])) ? $data['fm_child_num'] : null;
        $this->fmName = (!empty($data['fm_name'])) ? $data['fm_name'] : null;
        $this->branchId = (!empty($data['branch_id'])) ? $data['branch_id'] : null;
        $this->areaId = (!empty($data['area_id'])) ? $data['area_id'] : null;
        $this->issueAmount = (!empty($data['issue_amount'])) ? $data['issue_amount'] : null;
        $this->appTel = (!empty($data['app_tel'])) ? $data['app_tel'] : null;
        $this->hotlineTel = (!empty($data['hotline_tel'])) ? $data['hotline_tel'] : null;
        $this->contactTel = (!empty($data['contact_tel'])) ? $data['contact_tel'] : null;
        $this->baseIssueDate = (!empty($data['base_issue_date'])) ? $data['base_issue_date'] : null;
        $this->proofDate = (!empty($data['proof_date'])) ? $data['proof_date'] : null;
        $this->datasendDate = (!empty($data['datasend_date'])) ? $data['datasend_date'] : null;
        $this->kampfDate = (!empty($data['kampf_date'])) ? $data['kampf_date'] : null;
        $this->issueBaseSchId = (!empty($data['issue_base_sch_id'])) ? $data['issue_base_sch_id'] : null;
    }
    
}