
var $j = jQuery.noConflict();
function submitQuestionForm(form_name)
{
	var obj=document.getElementsByName('ansId');
	var flag=1;
	//alert("length:"+obj.length);
	
	for(var i=0;i < obj.length;i++)
	{
		if(obj[i].checked)
		{
			//alert(document.getElementById("correctOption").value);
			if(obj[i].value!=document.getElementById("correctOption").value)
			{
				alert("No this is not correct, please select the right one");
			}
			else
			{
				if(document.getElementById("historyCount").value<= parseInt(document.getElementById("xmlArrayCount").value)-1 && document.getElementById("questionCount").value < parseInt(document.getElementById("qCount").value)-1)
				{
					document.getElementById("questionCount").value=parseInt(document.getElementById("questionCount").value)+1;
					document.forms[form_name.name].action="test-questions";
					document.forms[form_name.name].submit();
				}	
				else
				{
					document.getElementById("historyCount").value=parseInt(document.getElementById("historyCount").value)+1;
					document.getElementById("questionCount").value=1;
					document.forms[form_name.name].action="test-questions";
					document.forms[form_name.name].submit();
				}
			}//end of else
		}//end of if
	}//end of for
}

function clone()
{ 
	var container = document.getElementById('adminMainField');
	var fieldset=document.createElement('fieldset');
	fieldset.id="fld[]";
	fieldset.name="fld[]";
		
	var hiddenInput=document.createElement('input');
	hiddenInput.type="hidden";
	hiddenInput.id="count[]";
	hiddenInput.name="count[]";
	hiddenInput.value=Count;
	
	fieldset.appendChild(hiddenInput);
	
		
	var fieldTable=document.createElement('table');
	fieldTable.className="filedTbl";
	
	var tr=document.createElement('tr');
	tr.id="QDescrow_"+Count;

	var admincmsTdA=document.createElement('td');
	admincmsTdA.className="padding_td";
	admincmsTdA.id="tdDesc"+Count;
	admincmsTdA.vAlign="top";
			
	var admincmsLabel=document.createElement('label');
	admincmsLabel.className="headBold";
	admincmsLabel.innerHTML="Question Description:";
							
	admincmsTdA.appendChild(admincmsLabel);	
	tr.appendChild(admincmsTdA);	
						
		
	var admincmsTdB=document.createElement('td');
					
	var admincmsTxtarea=document.createElement('textarea');
	admincmsTxtarea.type='text';
	admincmsTxtarea.id="questionTxt"+Count;
	admincmsTxtarea.name="questionTxt"+Count;
	admincmsTxtarea.rows='5';
	admincmsTxtarea.cols='70';
				
	admincmsTdB.appendChild(admincmsTxtarea);	
	tr.appendChild(admincmsTdB);	
	fieldTable.appendChild(tr);
		   
	
	var trB=document.createElement('tr');
	trB.id="Optionrow_"+Count;

	var admincmsTdC=document.createElement('td');
	admincmsTdC.className="padding_td";
	admincmsTdC.id="tdOpt"+Count;
		
	var admincmsLabelA=document.createElement('label');
	admincmsLabelA.className="headBold";
	admincmsLabelA.innerHTML="";
			
	admincmsTdC.appendChild(admincmsLabelA);	
	trB.appendChild(admincmsTdC);	   
				
	var admincmsTdD=document.createElement('td');	
	admincmsTdD.id="AddTextOptionField"+Count;
	admincmsTdD.class="padding_td";
						
	var admincmsBtn=document.createElement('input');
	admincmsBtn.type='button';
	admincmsBtn.id="OptionBtn"+Count;
	admincmsBtn.className="OptionBtn"+Count;
	admincmsBtn.value='Add Option';

			   
	admincmsBtn.addEventListener('click',function()
	{						
		var br = document.createElement('br');
		document.getElementById(admincmsTdD.id).appendChild(br);
		var br = document.createElement('br');
		document.getElementById(admincmsTdD.id).appendChild(br);
		var textbox = document.createElement('input');
		textbox.type='text';
		textbox.id="optionTxt"+hiddenInput.value+"[]";
		textbox.name="optionTxt"+hiddenInput.value+"[]";
		document.getElementById(admincmsTdD.id).appendChild(textbox);
		document.getElementById('txtBoxHdn').value=textbox.id;				
		
	});
						
						
	admincmsTdD.appendChild(admincmsBtn);	
	
	var admincmsRemoveBtn=document.createElement('input');
	admincmsRemoveBtn.type='button';
	admincmsRemoveBtn.id="OptionRemoveBtn"+Count;
	admincmsRemoveBtn.className="OptionRemoveBtn"+Count;
	admincmsRemoveBtn.value='Remove Option';
	
	admincmsRemoveBtn.addEventListener('click',function()
	{	
		if(document.getElementById(admincmsTdD.id)!= 0)
		{
			var contentID = document.getElementById(admincmsTdD.id);
			contentID.removeChild();
		}
	
	});
		
	admincmsTdD.appendChild(admincmsRemoveBtn);	
	
	trB.appendChild(admincmsTdD);	
				
	fieldTable.appendChild(trB);
	
	var trC=document.createElement('tr');
	trC.id="Correctrow_"+Count;

	var admincmsTdE=document.createElement('td');
	admincmsTdE.className="padding_td";
	admincmsTdE.id="CorrectAnsTd"+Count;
							
	var admincmsLabelB=document.createElement('label');
	admincmsLabelB.className="headBold";
	admincmsLabelB.innerHTML="Correct Answer:";
	admincmsLabelB.vAlign="top";
	admincmsTdE.appendChild(admincmsLabelB);	
	
	trC.appendChild(admincmsTdE);	
						
	var admincmsTdF=document.createElement('td');	
	admincmsTdF.id="AddTextCorrectField"+Count;
	admincmsTdF.class="padding_td";
						
	var admincmsTxt=document.createElement('input');
	admincmsTxt.type='text';
	admincmsTxt.id="CorrectAnsTxt"+Count;
	admincmsTxt.name="CorrectAnsTxt"+Count;
						
	admincmsTdF.appendChild(admincmsTxt);	
	trC.appendChild(admincmsTdF);	
	fieldTable.appendChild(trC);
			
	fieldset.appendChild(fieldTable);	
	container.appendChild(fieldset);
	Count++;
}
function submitAdminCmeniForm(baseurl, action, op, form)
{
	
	document.getElementById('op').value=op;
	var formName = form.name;
	
	if(op=='save')
	{	
		document.body.style.cursor='progress';
		document.forms[formName].action=baseurl+action;
		document.forms[formName].submit();
	}
	
}
