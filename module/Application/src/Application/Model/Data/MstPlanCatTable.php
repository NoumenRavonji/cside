<?php

namespace Application\Model\Data;

use Application\Model\PlanCatModel;
use Application\Model\AuthModel;
use Zend\Db\Sql\Sql;

class MstPlanCatTable extends TableModel
{
	protected $name = 'mst_plan_cat';

	public function searchRecord($pageNo, PlanCatModel $planCat)
	{
		$data = array(
			'id' => $planCat->id,
            'plan_cat_cd' => $planCat->planCatCd,
            'plan_cat_name' => $planCat->planCatName,
            'parent_plan_cat_id' => $planCat->parentPlanCatId,
            'rank' => $planCat->rank,
        );

		return $this->searchRecordByData($pageNo, $data);

	}

	public function saveRecord(PlanCatModel $planCat, AuthModel $auth)
	{

		$data = array(
            'plan_cat_cd' => $planCat->planCatCd,
            'plan_cat_name' => $planCat->planCatName,
            'parent_plan_cat_id' => $planCat->parentPlanCatId,
            'rank' => $planCat->rank,
        );

        return $this->saveRecordByData($planCat->id, $data, $auth);

	}

/*	public function getParentCatArray(){

		$result = null;

        $sql = new Sql($this->adapter);

		$select = $sql->select();
		$select->from($this->name);

		$select->columns(array('id'));

		$select->order('id asc');
		$select->where(array('delete_flag' => 0, ));

		$middle = $this->selectWith($select)->toArray();

		foreach ($middle as $value) {
			$result[$value['id']] = $value['id'];
		}

		return $result;

    }

    public function getRankArray(){

		$result = null;

        $sql = new Sql($this->adapter);

		$select = $sql->select();
		$select->from($this->name);

		$select->columns(array('rank'));

		$select->order('id asc');
		$select->where(array('delete_flag' => 0, ));

		$middle = $this->selectWith($select)->toArray();

		foreach ($middle as $value) {
			$result[$value['rank']] = $value['rank'];
		}

		return $result;
        
    }*/

}