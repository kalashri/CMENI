<?php
require_once('MainModel.php');

/**
 * Add your description here
 *
 * @author <YOUR NAME HERE>
 * @copyright ZF model generator
 * @license http://framework.zend.com/license/new-bsd     New BSD License
 */
 
class Admin_Model_Question extends MainModel
{

    /**
     * mysql var type int(11)
     *
     * @var int     
     */
    protected $_QuestionId;
    
    /**
     * mysql var type varchar(255)
     *
     * @var string     
     */
    protected $_QuestionDesc;
    
    /**
     * mysql var type int(11)
     *
     * @var int     
     */
    protected $_HistoryId;
    

    

function __construct() {
    $this->setColumnsList(array(
    'question_id'=>'QuestionId',
    'question_desc'=>'QuestionDesc',
    'history_id'=>'HistoryId',
    ));
}

	
    
    /**
     * sets column question_id type int(11)     
     *
     * @param int $data
     * @return Admin_Model_Question     
     *
     **/

    public function setQuestionId($data)
    {
        $this->_QuestionId=$data;
        return $this;
    }

    /**
     * gets column question_id type int(11)
     * @return int     
     */
     
    public function getQuestionId()
    {
        return $this->_QuestionId;
    }
    
    /**
     * sets column question_desc type varchar(255)     
     *
     * @param string $data
     * @return Admin_Model_Question     
     *
     **/

    public function setQuestionDesc($data)
    {
        $this->_QuestionDesc=$data;
        return $this;
    }

    /**
     * gets column question_desc type varchar(255)
     * @return string     
     */
     
    public function getQuestionDesc()
    {
        return $this->_QuestionDesc;
    }
    
    /**
     * sets column history_id type int(11)     
     *
     * @param int $data
     * @return Admin_Model_Question     
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
     * returns the mapper class
     *
     * @return Admin_Model_QuestionMapper
     *
     */

    public function getMapper()
    {
        if (null === $this->_mapper) {
            $this->setMapper(new Admin_Model_QuestionMapper());
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
        if (!$this->getQuestionId())
            throw new Exception('Primary Key does not contain a value');
        return $this->getMapper()->getDbTable()->delete('question_id = '.$this->getQuestionId());
    }

}

