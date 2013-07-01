<?php

/**
 * Add your description here
 *
 * @author <YOUR NAME HERE>
 * @copyright ZF model generator
 * @license http://framework.zend.com/license/new-bsd     New BSD License
 */

class Admin_Model_QuestionMapper {

    /**
     * $_dbTable - instance of Admin_Model_DbTable_Question
     *
     * @var Admin_Model_DbTable_Question     
     */
    protected $_dbTable;

    /**
     * finds a row where $field equals $value
     *
     * @param string $field
     * @param mixed $value
     * @param Admin_Model_Question $cls
     */     
    public function findOneByField($field, $value, $cls)
    {
            $table = $this->getDbTable();
            $select = $table->select();

            $row = $table->fetchRow($select->where("{$field} = ?", $value));
            if (0 == count($row)) {
                    return;
            }

            $cls->setQuestionId($row->question_id)
		->setQuestionDesc($row->question_desc)
		->setHistoryId($row->history_id);
	    return $cls;
    }


    /**
     * returns an array, keys are the field names.
     *
     * @param new Admin_Model_Question $cls
     * @return array
     *
     */
    public function toArray($cls) {
        $result = array(
        
            'question_id' => $cls->getQuestionId(),
            'question_desc' => $cls->getQuestionDesc(),
            'history_id' => $cls->getHistoryId(),
                    
        );
        return $result;
    }

    /**
     * finds rows where $field equals $value
     *
     * @param string $field
     * @param mixed $value
     * @param Admin_Model_Question $cls
     * @return array
     */
    public function findByField($field, $value, $cls)
    {
		  
            $table = $this->getDbTable();
            $select = $table->select();
            $result = array();

            $rows = $table->fetchAll($select->where("{$field} = ?", $value));
			
            foreach ($rows as $row) {
                    $cls=new Admin_Model_Question();
                    $result[]=$cls;
                    $cls->setQuestionId($row->question_id)
		->setQuestionDesc($row->question_desc)
		->setHistoryId($row->history_id);
            }
		
            return $result;
    }
    
    /**
     * sets the dbTable class
     *
     * @param Admin_Model_DbTable_Question $dbTable
     * @return Admin_Model_QuestionMapper
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
     * @return Admin_Model_DbTable_Question     
     */
    public function getDbTable()
    {
        if (null === $this->_dbTable) {
            $this->setDbTable('Admin_Model_DbTable_Question');
        }
        return $this->_dbTable;
    }

    /**
     * saves current row
     *
     * @param Admin_Model_Question $cls
     *
     */
     
    public function save(Admin_Model_Question $cls,$ignoreEmptyValuesOnUpdate=true)
    {
        if ($ignoreEmptyValuesOnUpdate) {
            $data = $cls->toArray();
            foreach ($data as $key=>$value) {
                if (is_null($value) or $value == '')
                    unset($data[$key]);
            }
        }

        if (null === ($id = $cls->getQuestionId())) {
            unset($data['question_id']);
            $id=$this->getDbTable()->insert($data);
            $cls->setQuestionId($id);
        } else {
            if ($ignoreEmptyValuesOnUpdate) {
             $data = $cls->toArray();
             foreach ($data as $key=>$value) {
                if (is_null($value) or $value == '')
                    unset($data[$key]);
                }
            }

            $this->getDbTable()->update($data, array('question_id = ?' => $id));
        }
    }

    /**
     * finds row by primary key
     *
     * @param int $id
     * @param Admin_Model_Question $cls
     */

    public function find($id, Admin_Model_Question $cls)
    {
        $result = $this->getDbTable()->find($id);
        if (0 == count($result)) {
            return;
        }

        $row = $result->current();

        $cls->setQuestionId($row->question_id)
		->setQuestionDesc($row->question_desc)
		->setHistoryId($row->history_id);
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
            $entry = new Admin_Model_Question();
            $entry->setQuestionId($row->question_id)
                  ->setQuestionDesc($row->question_desc)
                  ->setHistoryId($row->history_id)
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
                    $entry = new Admin_Model_Question();
                    $entry->setQuestionId($row->question_id)
                          ->setQuestionDesc($row->question_desc)
                          ->setHistoryId($row->history_id)
                          ->setMapper($this);
                    $entries[] = $entry;
            }
            return $entries;
    }

}
