<?php

namespace Application\Model\Data;

use Application\Model\StaffModel;
use Application\Model\AuthModel;

class MstStaffTable extends TableModel
{
	protected $name = 'mst_staff';

    public function searchRecord($pageNo,StaffModel $staff)
    {
        $data = array(
            'id' => $staff->id,
            'staff_cd' => $staff->staffCd,
            'staff_name' => $staff->staffName,
            'staff_kana' => $staff->staffKana,
            'branch_id' => $staff->branchId,
            'post_id' => $staff->postId,
            'enroll_knd' => $staff->enrollKnd,
            'staff_email' => $staff->staffEmail,
            'staff_tell' => $staff->staffTel,
        );

        return $this->searchRecordByData($pageNo, $data);

    }

    public function saveRecord(StaffModel $staff, AuthModel $auth)
    {

        $data = array(
            'staff_cd' => $staff->staffCd,
            'staff_name' => $staff->staffName,
            'staff_kana' => $staff->staffKana,
            'branch_id' => $staff->branchId,
            'post_id' => $staff->postId,
            'enroll_knd' => $staff->enrollKnd,
            'staff_email' => $staff->staffEmail,
            'staff_tell' => $staff->staffTel,
        );

        return $this->saveRecordByData($staff->id, $data, $auth);

    }

    public function searchRecordWithWhere(StaffModel $staff)
    {
        $row = null;

        $where = array(
            'staff_email' => $staff->staffEmail,
        );

        $rowset = $this->select($where);

        $row = $rowset->current();

        if(!$row){
            throw new \Exception("該当レコードが見つかりませんでした。");
        }
        
        return $row;

    }

}