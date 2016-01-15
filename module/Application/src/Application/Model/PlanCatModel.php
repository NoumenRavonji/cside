<?php
namespace Application\Model;
use Zend\Db\TableGateway\Feature\GlobalAdapterFeature;

class PlanCatModel extends ModelBasic
{

    public $id;
    public $planCatCd;
    public $planCatName;
    public $parentPlanCatId;
    public $rank;

    public function __construct($data = null){
        $this->myTable = $data['planCatTable'];
    }


    public function exchangeArray($data)
    {
        $this->id     = (!empty($data['id'])) ? $data['id'] : null;
        $this->planCatCd = (!empty($data['plan_cat_cd'])) ? $data['plan_cat_cd'] : null;
        $this->planCatName = (!empty($data['plan_cat_name'])) ? $data['plan_cat_name'] : null;
        $this->parentPlanCatId = (!empty($data['parent_plan_cat_id'])) ? $data['parent_plan_cat_id'] : null;
        $this->rank = (!empty($data['rank'])) ? $data['rank'] : null;
    }

    public function exchangeArrayFromTable($data)
    {
        $this->id     = (!empty($data['id'])) ? $data['id'] : null;
        $this->planCatCd = (!empty($data['plan_cat_cd'])) ? $data['plan_cat_cd'] : null;
        $this->planCatName = (!empty($data['plan_cat_name'])) ? $data['plan_cat_name'] : null;
        $this->parentPlanCatId = (!empty($data['parent_plan_cat_id'])) ? $data['parent_plan_cat_id'] : null;
        $this->rank = (!empty($data['rank'])) ? $data['rank'] : null;
    }

/*    public function getParentCatArray(){

        $result = null;

        $adapter = GlobalAdapterFeature::getStaticAdapter();
        $connection = $adapter->getDriver()->getConnection();

        $connection->beginTransaction();
        try {
            $result = $this->myTable->getParentCatArray();
            $connection->commit();
        } catch (\Exception $e) {
            echo($e->getMessage());
            exit();
            $connection->rollback();
        }

        return $result;

    }

    public function getRankArray(){

        $result = null;

        $adapter = GlobalAdapterFeature::getStaticAdapter();
        $connection = $adapter->getDriver()->getConnection();

        $connection->beginTransaction();
        try {
            $result = $this->myTable->getRankArray();
            $connection->commit();
        } catch (\Exception $e) {
            echo($e->getMessage());
            exit();
            $connection->rollback();
        }

        return $result;
        
    }*/
    
}