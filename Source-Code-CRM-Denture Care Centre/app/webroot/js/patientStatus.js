$(document).ready(function(){

		$("#btnNew").click(function(){
				var id=$("#txtClinicId").val();
				$.get("/review/patientStatuses/add",
			        function(data){
				  $("#divAjax").html(data);
				});
				$("#divTable").fadeOut("1000");
				return false;
		});
		
               		
});

        