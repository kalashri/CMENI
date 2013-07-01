<?php
require_once('MainModel.php');

/**
 * Add your description here
 *
 * @author <YOUR NAME HERE>
 * @copyright ZF model generator
 * @license http://framework.zend.com/license/new-bsd     New BSD License
 */
 
class Admin_Model_History extends MainModel
{

    /**
     * mysql var type int(11)
     *
     * @var int     
     */
    protected $_HistoryId;
    
    /**
     * mysql var type varchar(255)
     *
     * @var string     
     */
    protected $_HistoryDesc;
    

    

function __construct() {
    $this->setColumnsList(array(
    'history_id'=>'HistoryId',
    'history_desc'=>'HistoryDesc',
    ));
}

	
    
    /**
     * sets column history_id type int(11)     
     *
     * @param int $data
     * @return Admin_Model_History     
     *
     **/

    public function setHistoryId($data)
    {
        $this->_HistoryId=$data;
        return $this;
    }

    /**
     * gets column history_id type int(11)
     * @return int     
     */
     
    public function getHistoryId()
    {
        return $this->_HistoryId;
    }
    
    /**
     * sets column history_desc type varchar(255)     
     *
     * @param string $data
     * @return Admin_Model_History     
     *
     **/

    public function setHistoryDesc($data)
    {
        $this->_HistoryDesc=$data;
        return $this;
    }

    /**
     * gets column history_desc type varchar(255)
     * @return string     
     */
     
    public function getHistoryDesc()
    {
        return $this->_HistoryDesc;
    }
    
    /**
     * returns the mapper class
     *
     * @return Admin_Model_HistoryMapper
     *
     */

    public function getMapper()
    {
        if (null === $this->_mapper) {
            $this->setMapper(new Admin_Model_HistoryMapper());
        }
        return $this->_mapper;
    }


    /**
     * deletes current row by deleting a row that matches the primary key
     * 
     * @return int
     */

    public function deleteRowByPrimaryKey()
    {
        if (!$this->getHistoryId())
            throw new Exception('Primary Key does not contain a value');
        return $this->getMapper()->getDbTable()->delete('history_id = '.$this->getHistoryId());
    }

}

