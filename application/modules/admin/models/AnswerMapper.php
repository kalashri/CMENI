<?php

/**
 * Add your description here
 *
 * @author <YOUR NAME HERE>
 * @copyright ZF model generator
 * @license http://framework.zend.com/license/new-bsd     New BSD License
 */

class Admin_Model_AnswerMapper {

    /**
     * $_dbTable - instance of Admin_Model_DbTable_Answer
     *
     * @var Admin_Model_DbTable_Answer     
     */
    protected $_dbTable;

    /**
     * finds a row where $field equals $value
     *
     * @param string $field
     * @param mixed $value
     * @param Admin_Model_Answer $cls
     */     
    public function findOneByField($field, $value, $cls)
    {
            $table = $this->getDbTable();
            $select = $table->select();

            $row = $table->fetchRow($select->where("{$field} = ?", $value));
            if (0 == count($row)) {
                    return;
            }

            $cls->setAnswerId($row->answer_id)
		->setQuestionId($row->question_id)
		->setHistoryId($row->history_id)
		->setOptions($row->options)
		->setFlag($row->flag);
	    return $cls;
    }


    /**
     * returns an array, keys are the field names.
     *
     * @param new Admin_Model_Answer $cls
     * @return array
     *
     */
    public function toArray($cls) {
        $result = array(
        
            'answer_id' => $cls->getAnswerId(),
            'question_id' => $cls->getQuestionId(),
            'history_id' => $cls->getHistoryId(),
            'options' => $cls->getOptions(),
            'flag' => $cls->getFlag(),
                    
        );
        return $result;
    }

    /**
     * finds rows where $field equals $value
     *
     * @param string $field
     * @param mixed $value
     * @param Admin_Model_Answer $cls
     * @return array
     */
    public function findByField($field, $value, $cls)
    {
            $table = $this->getDbTable();
            $select = $table->select();
            $result = array();

            $rows = $table->fetchAll($select->where("{$field} = ?", $value));
            foreach ($rows as $row) {
                    $cls=new Admin_Model_Answer();
                    $result[]=$cls;
                    $cls->setAnswerId($row->answer_id)
		->setQuestionId($row->question_id)
		->setHistoryId($row->history_id)
		->setOptions($row->options)
		->setFlag($row->flag);
            }
            return $result;
    }
    
    /**
     * sets the dbTable class
     *
     * @param Admin_Model_DbTable_Answer $dbTable
     * @return Admin_Model_AnswerMapper
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
     * @return Admin_Model_DbTable_Answer     
     */
    public function getDbTable()
    {
        if (null === $this->_dbTable) {
            $this->setDbTable('Admin_Model_DbTable_Answer');
        }
        return $this->_dbTable;
    }

    /**
     * saves current row
     *
     * @param Admin_Model_Answer $cls
     *
     */
     
    public function save(Admin_Model_Answer $cls,$ignoreEmptyValuesOnUpdate=true)
    {
        if ($ignoreEmptyValuesOnUpdate) {
            $data = $cls->toArray();
            foreach ($data as $key=>$value) {
                if (is_null($value) or $value == '')
                    unset($data[$key]);
            }
        }

        if (null === ($id = $cls->getAnswerId())) {
            unset($data['answer_id']);
            $id=$this->getDbTable()->insert($data);
            $cls->setAnswerId($id);
        } else {
            if ($ignoreEmptyValuesOnUpdate) {
             $data = $cls->toArray();
             foreach ($data as $key=>$value) {
                if (is_null($value) or $value == '')
                    unset($data[$key]);
                }
            }

            $this->getDbTable()->update($data, array('answer_id = ?' => $id));
        }
    }

    /**
     * finds row by primary key
     *
     * @param int $id
     * @param Admin_Model_Answer $cls
     */

    public function find($id, Admin_Model_Answer $cls)
    {
        $result = $this->getDbTable()->find($id);
        if (0 == count($result)) {
            return;
        }

        $row = $result->current();

        $cls->setAnswerId($row->answer_id)
		->setQuestionId($row->question_id)
		->setHistoryId($row->history_id)
		->setOptions($row->options)
		->setFlag($row->flag);
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
            $entry = new Admin_Model_Answer();
            $entry->setAnswerId($row->answer_id)
                  ->setQuestionId($row->question_id)
                  ->setHistoryId($row->history_id)
                  ->setOptions($row->options)
                  ->setFlag($row->flag)
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
                    $entry = new Admin_Model_Answer();
                    $entry->setAnswerId($row->answer_id)
                          ->setQuestionId($row->question_id)
                          ->setHistoryId($row->history_id)
                          ->setOptions($row->options)
                          ->setFlag($row->flag)
                          ->setMapper($this);
                    $entries[] = $entry;
            }
            return $entries;
    }

}
