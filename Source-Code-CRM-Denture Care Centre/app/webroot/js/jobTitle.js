function accordings() {


var selectBox=document.getElementById('UserJobTitle');
len = selectBox.length;
i = 0;

for (i = 0; i < len; i++) {
if (selectBox[i].selected) {
       if(selectBox[i].value=='Administrator' || selectBox[i].value=='Super Admin')
	{
             $('insurance').hide(); 
             $('provider').hide(); 
             $('police').hide(); 
             $('reg').hide(); 
                        
             return false;
	}
	else if(selectBox[i].value=='Technician' || selectBox[i].value=='Super Technician')
	{
             $('insurance').appear(); 
             $('provider').appear(); 
             $('police').appear(); 
             $('reg').appear(); 
            
             return false;
	}
} 
}
}
function loadType() {


var selectBox=document.getElementById('UserJobTitle');
len = selectBox.length;
i = 0;

for (i = 0; i < len; i++) {
if (selectBox[i].selected) {
       if(selectBox[i].value=='Administrator' || selectBox[i].value=='Super Admin')
	{
             $('insurance').hide(); 
             $('provider').hide(); 
             $('police').hide(); 
             $('reg').hide(); 
                        
             return false;
	}
	else if(selectBox[i].value=='Technician' || selectBox[i].value=='Super Technician')
	{
             $('insurance').appear(); 
             $('provider').appear(); 
             $('police').appear(); 
             $('reg').appear(); 
            
             return false;
	}
} 
}
}