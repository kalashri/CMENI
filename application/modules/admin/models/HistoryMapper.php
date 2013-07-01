<?php

/**
 * Add your description here
 *
 * @author <YOUR NAME HERE>
 * @copyright ZF model generator
 * @license http://framework.zend.com/license/new-bsd     New BSD License
 */

class Admin_Model_HistoryMapper {

    /**
     * $_dbTable - instance of Admin_Model_DbTable_History
     *
     * @var Admin_Model_DbTable_History     
     */
    protected $_dbTable;

    /**
     * finds a row where $field equals $value
     *
     * @param string $field
     * @param mixed $value
     * @param Admin_Model_History $cls
     */     
    public function findOneByField($field, $value, $cls)
    {
            $table = $this->getDbTable();
            $select = $table->select();

            $row = $table->fetchRow($select->where("{$field} = ?", $value));
            if (0 == count($row)) {
                    return;
            }

            $cls->setHistoryId($row->history_id)
		->setHistoryDesc($row->history_desc);
	    return $cls;
    }


    /**
     * returns an array, keys are the field names.
     *
     * @param new Admin_Model_History $cls
     * @return array
     *
     */
    public function toArray($cls) {
        $result = array(
        
            'history_id' => $cls->getHistoryId(),
            'history_desc' => $cls->getHistoryDesc(),
                    
        );
        return $result;
    }

    /**
     * finds rows where $field equals $value
     *
     * @param string $field
     * @param mixed $value
     * @param Admin_Model_History $cls
     * @return array
     */
    public function findByField($field, $value, $cls)
    {
            $table = $this->getDbTable();
            $select = $table->select();
            $result = array();

            $rows = $table->fetchAll($select->where("{$field} = ?", $value));
            foreach ($rows as $row) {
                    $cls=new Admin_Model_History();
                    $result[]=$cls;
                    $cls->setHistoryId($row->history_id)
		->setHistoryDesc($row->history_desc);
            }
            return $result;
    }
    
    /**
     * sets the dbTable class
     *
     * @param Admin_Model_DbTable_History $dbTable
     * @return Admin_Model_HistoryMapper
     * 
     */
    public function setDbTable($dbTable)
    {
        if (is_string($dbTable)) {
            $dbTable = new $dbTable();
        }
        if (!$dbTable instanceof Zend_Db_Table_Abstract) {
            throw new Exception('Invalid table data gateway provided');
        }
        $this->_dbTable = $dbTable;
        return $this;
    }

    /**
     * returns the dbTable class
     * 
     * @return Admin_Model_DbTable_History     
     */
    public function getDbTable()
    {
        if (null === $this->_dbTable) {
            $this->setDbTable('Admin_Model_DbTable_History');
        }
        return $this->_dbTable;
    }

    /**
     * saves current row
     *
     * @param Admin_Model_History $cls
     *
     */
     
    public function save(Admin_Model_History $cls,$ignoreEmptyValuesOnUpdate=true)
    {
        if ($ignoreEmptyValuesOnUpdate) {
            $data = $cls->toArray();
            foreach ($data as $key=>$value) {
                if (is_null($value) or $value == '')
                    unset($data[$key]);
            }
        }

        if (null === ($id = $cls->getHistoryId())) {
            unset($data['history_id']);
            $id=$this->getDbTable()->insert($data);
            $cls->setHistoryId($id);
        } else {
            if ($ignoreEmptyValuesOnUpdate) {
             $data = $cls->toArray();
             foreach ($data as $key=>$value) {
                if (is_null($value) or $value == '')
                    unset($data[$key]);
                }
            }

            $this->getDbTable()->update($data, array('history_id = ?' => $id));
        }
    }

    /**
     * finds row by primary key
     *
     * @param int $id
     * @param Admin_Model_History $cls
     */

    public function find($id, Admin_Model_History $cls)
    {
        $result = $this->getDbTable()->find($id);
        if (0 == count($result)) {
            return;
        }

        $row = $result->current();

        $cls->setHistoryId($row->history_id)
		->setHistoryDesc($row->history_desc);
    }

    /**
     * fetches all rows 
     *
     * @return array
     */
    public function fetchAll()
    {
        $resultSet = $this->getDbTable()->fetchAll();
        $entries   = array();
        foreach ($resultSet as $row) {
            $entry = new Admin_Model_History();
            $entry->setHistoryId($row->history_id)
                  ->setHistoryDesc($row->history_desc)
                              ->setMapper($this);
            $entries[] = $entry;
        }
        return $entries;
    }

    /**
     * fetches all rows optionally filtered by where,order,count and offset
     * 
     * @param string $where
     * @param string $order
     * @param int $count
     * @param int $offset 
     *
     */
    public function fetchList($where=null, $order=null, $count=null, $offset=null)
    {
            $resultSet = $this->getDbTable()->fetchAll($where, $order, $count, $offset);
            $entries   = array();
            foreach ($resultSet as $row)
            {
                    $entry = new Admin_Model_History();
                    $entry->setHistoryId($row->history_id)
                          ->setHistoryDesc($row->history_desc)
                          ->setMapper($this);
                    $entries[] = $entry;
            }
            return $entries;
    }

}
