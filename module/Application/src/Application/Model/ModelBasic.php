<?php
namespace Application\Model;

use Application\Model\Data\MstBranchTable;
use Zend\Db\TableGateway\Feature\GlobalAdapterFeature;
use Zend\InputFilter\InputFilterInterface;
use Zend\InputFilter\InputFilterAwareInterface;


class ModelBasic implements InputFilterAwareInterface
{

    protected $myTable = null;


    protected $inputFilter;

    public function setInputFilter(InputFilterInterface $inputFilter)
    {
        $this->inputFilter = $inputFilter;
    }

    public function getInputFilter()
    {
        return $this->inputFilter;
    }

    public function fetchAll($pageNo)
    {
        $result = null;

        $adapter = GlobalAdapterFeature::getStaticAdapter();
        $connection = $adapter->getDriver()->getConnection();

        $connection->beginTransaction();
        try {
            $result = $this->myTable->fetchAll($pageNo);
            $connection->commit();
        } catch (\Exception $e) {
            echo($e->getMessage());
            exit();
            $connection->rollback();
        }

        return $result;
    }

    public function search($pageNo,$data)
    {
        $this->exchangeArray($data);
        
        $result = null;

        $adapter = GlobalAdapterFeature::getStaticAdapter();
        $connection = $adapter->getDriver()->getConnection();

        $connection->beginTransaction();
        try {
            $result = $this->myTable->searchRecord($pageNo, $this);
            $connection->commit();
        } catch (\Exception $e) {
            echo($e->getMessage());
            exit();
            $connection->rollback();
        }

        return $result;
    }

    public function searchWithWhere()
    {   
        $result = null;

        $adapter = GlobalAdapterFeature::getStaticAdapter();
        $connection = $adapter->getDriver()->getConnection();

        $connection->beginTransaction();
        try {
            $result = $this->myTable->searchRecordWithWhere($this);
            $connection->commit();
        } catch (\Exception $e) {
            $connection->rollback();
            throw $e;
        }

        return $result;
    }

    public function get($id)
    {
        $result = null;

        $adapter = GlobalAdapterFeature::getStaticAdapter();
        $connection = $adapter->getDriver()->getConnection();

        $connection->beginTransaction();
        try {
            $result = $this->myTable->getRecord($id);
            $connection->commit();
        } catch (\Exception $e) {
            echo($e->getMessage());
            exit();
            $connection->rollback();
        }

        return $result;
    }

    public function save($data, AuthModel $auth)
    {
        $this->exchangeArray($data);

        $result = null;

        $adapter = GlobalAdapterFeature::getStaticAdapter();
        $connection = $adapter->getDriver()->getConnection();

        $connection->beginTransaction();
        try {
            $result = $this->myTable->saveRecord($this, $auth);
            $connection->commit();
        } catch (\Exception $e) {
            echo($e->getMessage());
            exit();
            $connection->rollback();
        }
        return $result;
    }

    public function delete($id, AuthModel $auth){

        $result = null;

        $adapter = GlobalAdapterFeature::getStaticAdapter();
        $connection = $adapter->getDriver()->getConnection();

        $connection->beginTransaction();
        try {
            $result = $this->myTable->deleteRecord($id, $auth);
            $connection->commit();
        } catch (\Exception $e) {
            echo($e->getMessage());
            exit();
            $connection->rollback();
        }

        return $result;

    }

//********************************************************************************

    public function provideReference($columName1, $columName2)
    {

        $result = null;

        $adapter = GlobalAdapterFeature::getStaticAdapter();
        $connection = $adapter->getDriver()->getConnection();

        $connection->beginTransaction();
        try {
            $result = $this->myTable->provideReference($columName1, $columName2);
            $connection->commit();
        } catch (\Exception $e) {
            echo($e->getMessage());
            exit();
            $connection->rollback();
        }

        return $result;
    }

//********************************************************************************
    
}