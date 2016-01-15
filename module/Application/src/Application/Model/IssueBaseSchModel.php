<?php
namespace Application\Model;

class IssueBaseSchModel extends ModelBasic
{

    public $id;
    public $issueBaseSchCd;
    public $issueBaseSchName;
    public $issueBaseSchDate;
    public $note;

    public function __construct($data = null){
        $this->myTable = $data['issueBaseSchTable'];
    }


    public function exchangeArray($data)
    {
        $this->id     = (!empty($data['id'])) ? $data['id'] : null;
        $this->issueBaseSchCd = (!empty($data['issue_base_sch_cd'])) ? $data['issue_base_sch_cd'] : null;
        $this->issueBaseSchName = (!empty($data['issue_base_sch_name'])) ? $data['issue_base_sch_name'] : null;
        $this->issueBaseSchDate = (!empty($data['issue_base_sch_date'])) ? $data['issue_base_sch_date'] : null;
        $this->note = (!empty($data['note'])) ? $data['note'] : null;
    }

    public function exchangeArrayFromTable($data)
    {
        $this->id     = (!empty($data['id'])) ? $data['id'] : null;
        $this->issueBaseSchCd = (!empty($data['issue_base_sch_cd'])) ? $data['issue_base_sch_cd'] : null;
        $this->issueBaseSchName = (!empty($data['issue_base_sch_name'])) ? $data['issue_base_sch_name'] : null;
        $this->issueBaseSchDate = (!empty($data['issue_base_sch_date'])) ? $data['issue_base_sch_date'] : null;
        $this->note = (!empty($data['note'])) ? $data['note'] : null;
    }
    
}