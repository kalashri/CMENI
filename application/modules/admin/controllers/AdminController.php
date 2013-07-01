<?php 

class Admin_AdminController extends Zend_Controller_Action
{

    public function init()
    {
      
    }

	public function testQuestionsAction()
	{
		$xml = simplexml_load_file("note.xml");		
		$xmlArray = @json_decode(@json_encode($xml),1);	
		//echo "<pre>";print_r($xmlArray);	exit;
		for($i=1 ; $i < count($xmlArray['history']) ; $i++) //Loop for histories
		{
			$history = $xmlArray['history'][$i];			
			for($j=0 ; $j < count($history['question']) ; $j++)   //Loop for questions
			{
				for($k=0 ; $k < count($question['option']) ; $k++)
				{
					$option = $question['option'][$k];					
				}
			}					
		}	
		if(isset($_POST['historyCount']))
		{
			$historyCount=$_POST['historyCount'];
			$questionCount=$_POST['questionCount'];
			$this->view->historyCount=$_POST['historyCount'];
			$this->view->questionCount=$_POST['questionCount'];
			$this->view->xmlArrayCount=count($xmlArray['history']);	
			$this->view->correctOption=$_POST['correctOption'];
			//echo $_POST['correctOption'];
			$this->view->qCount=count($xmlArray['history'][$historyCount]['question']);
			 
			if($historyCount<(count($xmlArray['history'])) || $questionCount<(count($xmlArray['history'][$historyCount]['question'])))
			{	
				$history = $xmlArray['history'][$historyCount];
				$this->view->history=$history['history_desc'];
				$question = $history['question'][$questionCount];
				$this->view->question=$question['quest_desc'];	
				$this->view->optionArray=$question['option'];
				$this->view->correctOption=$question['correct_option'];
			}
		    else
		    {
				$this->_redirect("admin/admin/certificate");
			}
		}//endof if
		else
		{
			$this->view->xmlArrayCount=count($xmlArray['history']);	
			$this->view->historyCount=1; 
			$this->view->questionCount=1; 
			$this->view->optionCount=1;
			$history = $xmlArray['history'][1];
			$this->view->history=$history['history_desc'];
			$question = $history['question'];
			$this->view->qCount=count($question);
			$this->view->optionArray=$question[1]['option'];
			$this->view->correctOption=$question[1]['correct_option'];
			$this->view->question=$question[1]['quest_desc'];
		  } //end of else
	} //end of function

	public function certificateAction()
	{  
		if(isset($_POST['Email']) && isset($_POST['Name']))
		{				
			include("C:/Program Files/Apache Software Foundation/Apache2.2/htdocs/CMENI/PHPMailer/class.phpmailer.php"); 
			define('GUSER', 'kalashri.aundhkar@drivedge.com'); // GMail username
			define('GPWD', 'nandanabhi'); // GMail passwor	
			if($_POST['Email']==null)
			{ 
				echo "\nNo Certificate to send"; exit; 
			}
			$Name=$_POST['Name'];
			$emailAdd=$_POST['Email'];

			global $error,$Strmsg;
			$mail = new PHPMailer();  // create a new object
			$mail->IsSMTP(); // enable SMTP
			$mail->SMTPDebug = 1;  // debugging: 1 = errors and messages, 2 = messages only
			$mail->SMTPAuth = true;  // authentication enabled
			//$mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for GMail
			$mail->Host = 'mail.drivedge.com';
			$mail->Port = 25; 
			$mail->Username = GUSER;  
			$mail->Password = GPWD;       
			$mail->SetFrom('kalashriaundhkar@gmail.com', 'CMENI Team');
			$mail->Subject = "Certificate from CMENI Team";			
			$mail->IsHTML(true);
			$mail->Body ="Dear \n".$Name."Congratulations! You have passed the test.";


			$mail->AddAddress(trim($emailAdd));
			
			if(!$mail->Send()) 
			{
				$msg = 'Error occured while sending mail to: '.$Name; 
				 $this->_redirect("admin/admin/blank/msg/".$msg);
			}
			else 
			{
				$msg = 'Message sent to: '.$Name; 
				$this->_redirect("admin/admin/blank/msg/".$msg);
			}
		}		
	}

	public function blankAction()
	{
		$this->view->msg= $this->_getParam('msg');
	}

	public function admincmeniAction()
    { 
		$doc = new DOMDocument();
		$doc->formatOutput = true; 
		if(isset($_POST['count']))
		{   
		    $count=$_POST['count']; 
		    $history=$_POST['historyTxt'];
		    
		    
			$root = $doc->createElement('root');
			
			$history_dummy = $doc->createElement('history');
			$root->appendChild($history_dummy);
			
			$history = $doc->createElement('history');
		
			$hist_desc=$doc->createElement('history_desc');
			$hist_desc->nodeValue=$_POST['historyTxt'];
			$history->appendChild($hist_desc);
			
			$que_dummy= $doc->createElement('question');
			$history->appendChild($que_dummy);
			for($j=0;$j<count($count);$j++)
			{ 
				$question=$_POST["questionTxt".$j];
				$que= $doc->createElement('question');
				$que_desc= $doc->createElement('quest_desc');
				$que_desc->nodeValue=$_POST["questionTxt".$j];
				$que->appendChild($que_desc);						
			
				$option=$_POST["optionTxt".$j];
				$correctAns=$_POST["CorrectAnsTxt".$j];
			  
				for($i=0;$i<count($option);$i++)
				{
					$opt= $doc->createElement('option');
					$opt->nodeValue=$option[$i];
					$que->appendChild($opt);
				}	
				$correct_opt= $doc->createElement('correct_option');
				$correct_opt->nodeValue=$_POST["CorrectAnsTxt".$j];
				$que->appendChild($correct_opt);
						
				$history->appendChild($que);
				$root->appendChild($history);  
		   }		   
		   $doc->appendChild($root);
		   $doc->save('note.xml');    
		}
	}
}   

