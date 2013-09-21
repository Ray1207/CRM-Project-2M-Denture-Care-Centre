$(document).ready(function(){
				
		$("#btnNew").click(function(){
				var id=$("#txtPatientId").val();
				$.get("/review/clinical_notes/add"+"/"+id,
			        function(data){
				  $("#divAjax").html(data);
				});
				$("#divTable").fadeOut("1000");
				return false;
		});
		
               		
});

        