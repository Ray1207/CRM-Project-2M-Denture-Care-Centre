$(document).ready(function(){
	
		$("#btnNewJobTitle").click(function(){
				var id=$("#txtClinicId").val();
				$.get("/review/JobTitles/add",
			        function(data){
				  $("#divAjax").html(data);
				});
				$("#divTable").fadeOut("1000");
				return false;
		});        		
});

        