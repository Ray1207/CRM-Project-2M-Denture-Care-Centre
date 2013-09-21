$(document).ready(function(){
		$(".test").click(function(){
				var id=this.id;
				$.get("/review/reminders/edit/"+id,
					function(data){
						$("#divAjax").html(data);
				});
				return false;
		});
		
		
		$("#btnNew").click(function(){
				var id = $("#txtClinicId").val();
				var time = $("#txtTime").val();
				$.get("/review/reminders/add/"+time,
			        function(data){
				  $("#divAjax").html(data);
				});
				$("#divTable").fadeOut("1000");
				return false;
		});
		
               		
});

        