<?php
require_once('MainModel.php');

/**
 * Add your description here
 *
 * @author <YOUR NAME HERE>
 * @copyright ZF model generator
 * @license http://framework.zend.com/license/new-bsd     New BSD License
 */
 
class Admin_Model_Answer extends MainModel
{

    /**
     * mysql var type int(11)
     *
     * @var int     
     */
    protected $_AnswerId;
    
    /**
     * mysql var type int(11)
     *
     * @var int     
     */
    protected $_QuestionId;
    
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
    protected $_Options;
    
    /**
     * mysql var type int(11)
     *
     * @var int     
     */
    protected $_Flag;
    

    

function __construct() {
    $this->setColumnsList(array(
    'answer_id'=>'AnswerId',
    'question_id'=>'QuestionId',
    'history_id'=>'HistoryId',
    'options'=>'Options',
    'flag'=>'Flag',
    ));
}

	
    
    /**
     * sets column answer_id type int(11)     
     *
     * @param int $data
     * @return Admin_Model_Answer     
     *
     **/

    public function setAnswerId($data)
    {
        $this->_AnswerId=$data;
        return $this;
    }

    /**
     * gets column answer_id type int(11)
     * @return int     
     */
     
    public function getAnswerId()
    {
        return $this->_AnswerId;
    }
    
    /**
     * sets column question_id type int(11)     
     *
     * @param int $data
     * @return Admin_Model_Answer     
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
     * sets column history_id type int(11)     
     *
     * @param int $data
     * @return Admin_Model_Answer     
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
     * sets column options type varchar(255)     
     *
     * @param string $data
     * @return Admin_Model_Answer     
     *
     **/

    public function setOptions($data)
    {
        $this->_Options=$data;
        return $this;
    }

    /**
     * gets column options type varchar(255)
     * @return string     
     */
     
    public function getOptions()
    {
        return $this->_Options;
    }
    
    /**
     * sets column flag type int(11)     
     *
     * @param int $data
     * @return Admin_Model_Answer     
     *
     **/

    public function setFlag($data)
    {
        $this->_Flag=$data;
        return $this;
    }

    /**
     * gets column flag type int(11)
     * @return int     
     */
     
    public function getFlag()
    {
        return $this->_Flag;
    }
    
    /**
     * returns the mapper class
     *
     * @return Admin_Model_AnswerMapper
     *
     */

    public function getMapper()
    {
        if (null === $this->_mapper) {
            $this->setMapper(new Admin_Model_AnswerMapper());
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
        if (!$this->getAnswerId())
            throw new Exception('Primary Key does not contain a value');
        return $this->getMapper()->getDbTable()->delete('answer_id = '.$this->getAnswerId());
    }

}

