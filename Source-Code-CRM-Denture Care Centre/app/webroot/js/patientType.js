function loadType(){
	dentureCheck();
        latexCheck();
        allergiesCheck();
        medicalCheck();
        medicineCheck();
      var selectBox=document.getElementById('PatientPatientType');
    len = selectBox.length;
      i = 0;

for (i = 0; i < len; i++) {
if (selectBox[i].selected) {
       if(selectBox[i].value=='1')
	{
	    	$('divDeposit1').hide(); 
			$('divDeposit2').hide();
			$('divDeposit3').hide();
             $('divDentist').hide(); 
             $('divGP').hide(); 
             $('divVoucher').hide(); 
             $('divMedicare').hide(); 
             $('divDVA').hide();
             $('divSignature').hide();
                        
             return false;
	}
	else if(selectBox[i].value=='2')
	{
             $('divDeposit1').appear(); 
			 $('divDeposit2').appear();
			 $('divDeposit3').appear();
             $('divDentist').appear(); 
             $('divGP').hide(); 
             $('divVoucher').hide(); 
             $('divMedicare').hide(); 
             $('divDVA').hide();
             $('divSignature').appear();
            
             return false;
	}
	else if(selectBox[i].value=='3')
	{
	    	$('divDeposit1').hide(); 
			$('divDeposit2').hide();
			$('divDeposit3').hide();
             $('divDentist').appear(); 
             $('divGP').appear(); 
             $('divVoucher').appear(); 
             $('divMedicare').appear(); 
             $('divDVA').hide();
             $('divSignature').appear();
          
             return false;
	}
        else if(selectBox[i].value=='DVA')
	{
	    	$('divDeposit1').hide(); 
			$('divDeposit2').hide();
			$('divDeposit3').hide();
             $('divDentist').appear(); 
             $('divGP').hide(); 
             $('divVoucher').hide(); 
             $('divMedicare').hide(); 
             $('divDVA').appear();
             $('divSignature').appear();
             
             return false;
	}
        else if(selectBox[i].value=='VDS')
	{
	    	$('divDeposit1').hide(); 
			$('divDeposit2').hide();
			$('divDeposit3').hide(); 
             $('divDentist').appear(); 
             $('divGP').hide(); 
             $('divVoucher').appear(); 
             $('divMedicare').hide(); 
             $('divDVA').hide();
             $('divSignature').appear();
            
             return false;
	}
} 
}
}

function accordings() {


var selectBox=document.getElementById('PatientPatientType');
len = selectBox.length;
i = 0;

for (i = 0; i < len; i++) {
if (selectBox[i].selected) {
       if(selectBox[i].value=='1')
	{
             $('divDeposit1').hide(); 
			$('divDeposit2').hide();
			$('divDeposit3').hide();
             $('divDentist').hide(); 
             $('divGP').hide(); 
             $('divVoucher').hide(); 
             $('divMedicare').hide(); 
             $('divDVA').hide();
             $('divSignature').hide();
                        
             return false;
	}
	else if(selectBox[i].value=='2')
	{
             $('divDeposit1').appear(); 
	     $('divDeposit2').appear(); 
	     $('divDeposit3').appear(); 
             $('divDentist').appear(); 
             $('divGP').hide(); 
             $('divVoucher').hide(); 
             $('divMedicare').hide(); 
             $('divDVA').hide();
             $('divSignature').appear();
            
             return false;
	}
	else if(selectBox[i].value=='3')
	{
	    	$('divDeposit1').hide(); 
			$('divDeposit2').hide();
			$('divDeposit3').hide();
             $('divDentist').appear(); 
             $('divGP').appear(); 
             $('divVoucher').appear(); 
             $('divMedicare').appear(); 
             $('divDVA').hide();
             $('divSignature').appear();
          
             return false;
	}
        else if(selectBox[i].value=='4')
	{
	    	$('divDeposit1').hide(); 
			$('divDeposit2').hide();
			$('divDeposit3').hide();
             $('divDentist').appear(); 
             $('divGP').hide(); 
             $('divVoucher').hide(); 
             $('divMedicare').hide(); 
             $('divDVA').appear();
             $('divSignature').appear();
             
             return false;
	}
        else if(selectBox[i].value=='5')
	{
	    	$('divDeposit1').hide(); 
			$('divDeposit2').hide();
			$('divDeposit3').hide();
             $('divDentist').appear(); 
             $('divGP').hide(); 
             $('divVoucher').appear(); 
             $('divMedicare').hide(); 
             $('divDVA').hide();
             $('divSignature').appear();
            
             return false;
	}
} 
}
}
function dentureCheck()
{
	var checkbox=document.getElementById('PatientHasCurrentDentures');
	if(checkbox.checked)
        {     
        	
        	document.getElementById('PatientCurrentDenturesAge').disabled=false;
        	document.getElementById('PatientCurrentDenturesProblem').disabled=false;
        	document.getElementById('PatientCurrentDenturesAge').focus();
        }
        else
        {
        	
        	document.getElementById('PatientCurrentDenturesAge').disabled=true;
        	document.getElementById('PatientCurrentDenturesProblem').disabled=true;
        }
	
}
function latexCheck()
{
	var checkbox=document.getElementById('PatientHasLatexAllergic');
	if(checkbox.checked)
        {     
        	
        	document.getElementById('PatientLatexAllergicDetails').disabled=false;
        	document.getElementById('PatientLatexAllergicDetails').focus();
        }
        else
        {
        	
        	document.getElementById('PatientLatexAllergicDetails').disabled=true;
        }
	
}
function allergiesCheck()
{
	var checkbox=document.getElementById('PatientHasOtherAllergies');
	if(checkbox.checked)
        {     
        	
        	document.getElementById('PatientOtherAllergiesDetails').disabled=false;
        	document.getElementById('PatientOtherAllergiesDetails').focus();
        }
        else
        {
        	
        	document.getElementById('PatientOtherAllergiesDetails').disabled=true;
        }
	
}
function medicalCheck()
{
	var checkbox=document.getElementById('PatientHasMedicalConditions');
	if(checkbox.checked)
        {     
        	
        	document.getElementById('PatientMedicalConditionsDetails').disabled=false;
        	document.getElementById('PatientMedicalConditionsDetails').focus();
        }
        else
        {
        	
        	document.getElementById('PatientMedicalConditionsDetails').disabled=true;
        }
	
}
function medicineCheck()
{
	var checkbox=document.getElementById('PatientHasMedicines');
	if(checkbox.checked)
        {     
        	
        	document.getElementById('PatientMedicinesDetails').disabled=false;
        	document.getElementById('PatientMedicinesDetails').focus();
        }
        else
        {
        	
        	document.getElementById('PatientMedicinesDetails').disabled=true;
        }
	
}

function depositValidation()
{
        var sign=1; 	
	var selectBox=document.getElementById('PatientPatientType');
	var x=document.getElementById('PatientDeposit').value;
	
	i = 0;
	len = selectBox.length;
	/*
		for (i = 0; i < len; i++) {
		if (selectBox[i].selected) {
			if(selectBox[i].value=='2'){
				if(x== null|| x=="")
			        {
			         alert("Please fill in the deposit amount.");
			         return false;
			        }
			}
		}
	}
	*/
	
	var validateNeed=0;
	for (i = 0; i < len; i++) {
		if (selectBox[i].selected) {
			if(selectBox[i].value=='2'){
				validateNeed=1;
			}
		}
	}
	if(validateNeed==1)
	{
		if(x== null|| x=="")
                {
	           alert("Please fill in the deposit amount.");
	           sign=0;	          
	        }
	}
	return sign;
	
}
