<?php
namespace Application\Model;

class StaffModel extends ModelBasic
{

    public $id;
    public $staffCd;
    public $staffName;
    public $staffKana;
    public $branchId;
    public $postId;
    public $enrollKnd;
    public $staffEmail;
    public $staffTel;

    //data from other tables
    public $authId;
    public $password;

    public function __construct($data = null){
        $this->myTable = $data['mstStaffTable'];
    }


    public function exchangeArray($data)
    {
        $this->id     = (!empty($data['id'])) ? $data['id'] : null;
        $this->staffCd = (!empty($data['staff_cd'])) ? $data['staff_cd'] : null;
        $this->staffName = (!empty($data['staff_name'])) ? $data['staff_name'] : null;
        $this->staffKana = (!empty($data['staff_kana'])) ? $data['staff_kana'] : null;
        $this->branchId = (!empty($data['branch_id'])) ? $data['branch_id'] : null;
        $this->postId = (!empty($data['post_id'])) ? $data['post_id'] : null;
        $this->enrollKnd = (!empty($data['enroll_knd'])) ? $data['enroll_knd'] : null;
        $this->staffEmail = (!empty($data['staff_email'])) ? $data['staff_email'] : null;
        $this->staffTel = (!empty($data['staff_tel'])) ? $data['staff_tel'] : null;

        $this->authId = (!empty($data['auth_id'])) ? $data['auth_id'] : null;
        $this->password = (!empty($data['password'])) ? $data['password'] : null;
    }

    public function exchangeArrayFromTable($data)
    {
        $this->id     = (!empty($data['id'])) ? $data['id'] : null;
        $this->staffCd = (!empty($data['staff_cd'])) ? $data['staff_cd'] : null;
        $this->staffName = (!empty($data['staff_name'])) ? $data['staff_name'] : null;
        $this->staffKana = (!empty($data['staff_kana'])) ? $data['staff_kana'] : null;
        $this->branchId = (!empty($data['branch_id'])) ? $data['branch_id'] : null;
        $this->postId = (!empty($data['post_id'])) ? $data['post_id'] : null;
        $this->enrollKnd = (!empty($data['enroll_knd'])) ? $data['enroll_knd'] : null;
        $this->staffEmail = (!empty($data['staff_email'])) ? $data['staff_email'] : null;
        $this->staffTel = (!empty($data['staff_tel'])) ? $data['staff_tel'] : null;
    }
    
}