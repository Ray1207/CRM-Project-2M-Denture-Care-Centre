$(document).ready(function() {
   var $calendar = $('#calendar');
   var id = 10;

   $calendar.weekCalendar({
      displayOddEven:true,
      timeslotsPerHour : 4,
      allowCalEventOverlap : true,
      overlapEventsSeparate: true,
      firstDayOfWeek : 1,
      businessHours :{start: 8, end: 18, limitDisplay: true },
      daysToShow : 5,      
      switchDisplay: {'1 day': 1, '3 next days': 3, 'work week': 5, 'full week': 7},
      title: function(daysToShow) {
			return daysToShow == 1 ? '%date%' : '%start% - %end%';
      },
      height : function($calendar) {
      	      return $(document).height();
      },
      eventRender : function(calEvent, $event) {
         if (calEvent.end.getTime() < new Date().getTime()) {
            $event.css("backgroundColor", "#aaa");
            $event.find(".wc-time").css({
               "backgroundColor" : "#999",
               "border" : "1px solid #888"
            });
         }
      },
      draggable : function(calEvent, $event) {
         return calEvent.readOnly != true;
      },
      resizable : function(calEvent, $event) {
         return calEvent.readOnly != true;
      },
      eventNew : function(calEvent, $event) {
      	      $("#liTech").css("display","none");
         var $dialogContent = $("#event_edit_container");
         resetForm($dialogContent);
         var startField = $dialogContent.find("select[name='start']").val(calEvent.start);
         var endField = $dialogContent.find("select[name='end']").val(calEvent.end);
         var titleField = $dialogContent.find("input[name='title']");
         var bodyField = $dialogContent.find("textarea[name='body']");
         var patientField=$dialogContent.find("select[name='patient']");
         var technicianField=$dialogContent.find("select[name='technician']");
        var patientFieldTest=$dialogContent.find("input[name='patient']").val(calEvent.patient_id);

         $dialogContent.dialog({
            modal: true,
            title: "New Appointment",
            close: function() {
               $dialogContent.dialog("destroy");
               $dialogContent.hide();
               $('#calendar').weekCalendar("removeUnsavedEvents");
               $calendar.weekCalendar('refresh');
            },
            buttons: {
               save : function() {
               	  var appStartTime = startField.val();
                  var appEndTime = endField.val();
                  var apptTitle = titleField.val();
                  var appBody = bodyField.val();
                  var appPatient=patientField.val();
                  var appTechnician=technicianField.val();
    
                  if(apptTitle==null || apptTitle=='' || appPatient==null || appPatient==''|| appTechnician==null || appTechnician=='')
                  {
                  	  alert('Please fill in title, patient and technician.');return false;
                  }
                  $.ajax({
				   type: "POST",
				   url: "/review/appointments/addAppointment",
				   data:{title : apptTitle, start : appStartTime, end : appEndTime, body : appBody, patient_id : appPatient, staff_id : appTechnician, clinic:$("#selectClinic").val() },
				   success: function (data){
				   	  var records = eval(data);
				   	  if(records==0)
				   	  {
				   	  	  alert('Double booking validation failed.\nAppointment can not be saved.\nPlease double check appointment information.');
				   	  }
				   	  else if(records==3)
		                          {
			                      alert('Appointment can not be saved.');
		                            }
				   }				   
				  }); 		  
                  $dialogContent.dialog("close");
                  $calendar.weekCalendar('refresh');
               },
               cancel : function() {
                  $dialogContent.dialog("close");
                  $calendar.weekCalendar('refresh');
               }
            }
         }).show();

         $dialogContent.find(".date_holder").text($calendar.weekCalendar("formatDate", calEvent.start));
         setupStartAndEndTimeFields(startField, endField, calEvent, $calendar.weekCalendar("getTimeslotTimes", calEvent.start));
      },
      eventDrop : function(calEvent, $event) {
        var apptId=calEvent.id.toString();
      	      var startTime=calEvent.start.toString();
      	      var endTime=calEvent.end.toString();
      	      $.post("/review/appointments/dropResizeSaving", { id: apptId, start: startTime, end: endTime},function(data) {
                       var records = eval(data);
		       if(records==0)
		      {
			alert('Double booking validation failed.\nAppointment can not be updated.\nPlease double check appointment information.');
		      }
		      else if(records==2)
		      {
			alert('Technician is not available in this time interval.');
		      }
		      else if(records==3)
		      {
			alert('Appointment can not be saved.');
		      }
              } );
	      $calendar.weekCalendar('refresh');
      },
      eventResize : function(calEvent, $event) {
      	      var apptId=calEvent.id.toString();
      	      var startTime=calEvent.start.toString();
      	      var endTime=calEvent.end.toString();
      	      $.post("/review/appointments/dropResizeSaving", { id: apptId, start: startTime, end: endTime} );
	      $calendar.weekCalendar('refresh');
      },
      eventClick : function(calEvent, $event) {
         $("#liTech").css("display","block");
         if (calEvent.readOnly) {
            return;
         }

         var $dialogContent = $("#event_edit_container");
         resetForm($dialogContent);
         var idField=$dialogContent.find("input[name='id']").val(calEvent.id);
         var startField = $dialogContent.find("select[name='start']").val(calEvent.start);
         var endField = $dialogContent.find("select[name='end']").val(calEvent.end);
         var titleField = $dialogContent.find("input[name='title']").val(calEvent.title);
         var bodyField = $dialogContent.find("textarea[name='body']");        
         bodyField.val(calEvent.body);
         var patientField=$dialogContent.find("select[name='patient']").val(calEvent.patient_id);
         var technicianField=$dialogContent.find("select[name='technician']").val(calEvent.staff_id);
         var patientName=$('#patcient').find(":selected").text();
         var patientFieldTest=$dialogContent.find("input[name='patient']").val(patientName);
         $('#lblTechnician').text(calEvent.techName);

         $dialogContent.dialog({
            modal: true,
            title: "Edit - " + calEvent.title,
            close: function() {
               $dialogContent.dialog("destroy");
               $dialogContent.hide();
               $('#calendar').weekCalendar("removeUnsavedEvents");
            },
            buttons: {
               save : function() {
                  var appId=idField.val();
                  var appStartTime = startField.val();
                  var appEndTime = endField.val();
                  var apptTitle = titleField.val();
                  var appBody = bodyField.val();
                  var appPatient=patientField.val();
                  var appTechnician=technicianField.val();
                  if(apptTitle==null || apptTitle=='' || appPatient==null || appPatient=='')
                  {
                  	  alert('Please fill in title and patient.');
                  	  return false;
                  }
                  $.ajax({
				   type: "POST",
				   url: "/review/appointments/editAppointment",
				   data:{id : appId, title : apptTitle, start : appStartTime, end : appEndTime, body : appBody, patient_id : appPatient, staff_id : appTechnician,clinic:$("#selectClinic").val()},
				   success: function (data){
				   	  var records = eval(data);
				   	  if(records==0)
				   	  {
				   	     alert('Double booking validation failed.\nAppointment can not be updated.\nPlease double check appointment information.');
				   	  }
				   	  else if(records==3)
		                          {
			                     alert('Appointment can not be saved.');
		                          }
				   }
				  }); 
		  $dialogContent.dialog("close");
                  $calendar.weekCalendar('refresh');
               },
               "delete" : function() {
               	       var appId=idField.val();
               	       $.ajax({
				   type: "POST",
				   url: "/review/appointments/deleteAppointment",
				   data:{id : appId},
				   success: function (data){
				   	  var records = eval(data);
				   	  if(records==0)
				   	  {
				   	     alert('Can not delete this appointment.');
				   	  }
				   }
				   
				  }); 
                  $dialogContent.dialog("close");
                  $calendar.weekCalendar('refresh');
               },
               cancel : function() {
                  $dialogContent.dialog("close");
               }
            }
         }).show();

         var startField = $dialogContent.find("select[name='start']").val(calEvent.start);
         var endField = $dialogContent.find("select[name='end']").val(calEvent.end);
         $dialogContent.find(".date_holder").text($calendar.weekCalendar("formatDate", calEvent.start));
         setupStartAndEndTimeFields(startField, endField, calEvent, $calendar.weekCalendar("getTimeslotTimes", calEvent.start));
         $(window).resize().resize(); //fixes a bug in modal overlay size ??

      },
      eventMouseover : function(calEvent, $event) {
      },
      eventMouseout : function(calEvent, $event) {
      },
      noEvents : function() {

      },
      data :  function(start, end, callback) {
      	      $.getJSON("/review/appointments/feed", {
              start: start.getTime(),
              end: end.getTime(),
              clinic: $("#selectClinic").val()
          },  function(result) {
           callback(result);
             // leave margin for each event
             $('div.wc-cal-event').each(function() {
               		    var width= $(this).width();
               		     width=width-10;
               		     $(this).width(width);
               		    
                });
         });
      }
      
   });

   function resetForm($dialogContent) {
      $dialogContent.find("input").val("");
      $dialogContent.find("textarea").val("");
   }
   /*
    * Sets up the start and end time fields in the calendar event
    * form for editing based on the calendar event being edited
    */
   function setupStartAndEndTimeFields($startTimeField, $endTimeField, calEvent, timeslotTimes) {

      $startTimeField.empty();
      $endTimeField.empty();

      for (var i = 0; i < timeslotTimes.length; i++) {
         var startTime = timeslotTimes[i].start;
         var endTime = timeslotTimes[i].end;
         var startSelected = "";
         if (startTime.getTime() === calEvent.start.getTime()) {
            startSelected = "selected=\"selected\"";
         }
         var endSelected = "";
         if (endTime.getTime() === calEvent.end.getTime()) {
            endSelected = "selected=\"selected\"";
         }
         $startTimeField.append("<option value=\"" + startTime + "\" " + startSelected + ">" + timeslotTimes[i].startFormatted + "</option>");
         $endTimeField.append("<option value=\"" + endTime + "\" " + endSelected + ">" + timeslotTimes[i].endFormatted + "</option>");

         $timestampsOfOptions.start[timeslotTimes[i].startFormatted] = startTime.getTime();
         $timestampsOfOptions.end[timeslotTimes[i].endFormatted] = endTime.getTime();

      }
      $endTimeOptions = $endTimeField.find("option");
      $startTimeField.trigger("change");
   }

   var $endTimeField = $("select[name='end']");
   var $endTimeOptions = $endTimeField.find("option");
   var $timestampsOfOptions = {start:[],end:[]};

   //reduces the end time options to be only after the start time options.
   $("select[name='start']").change(function() {
      var startTime = $timestampsOfOptions.start[$(this).find(":selected").text()];
      var currentEndTime = $endTimeField.find("option:selected").val();
      $endTimeField.html(
            $endTimeOptions.filter(function() {
               return startTime < $timestampsOfOptions.end[$(this).text()];
            })
            );

      var endTimeSelected = false;
      $endTimeField.find("option").each(function() {
         if ($(this).val() === currentEndTime) {
            $(this).attr("selected", "selected");
            endTimeSelected = true;
            return false;
         }
      });

      if (!endTimeSelected) {
         //automatically select an end date 2 slots away.
         $endTimeField.find("option:eq(1)").attr("selected", "selected");
      }
      
      
         var mySelect = $('#technician_id');
         $.ajax({
				   type: "POST",
				   url: "/review/availabilities/fetchAvailableTechnicians",
				   data:{appStart : $("select[name='start']").find("option:selected").val(), appEnd : $("select[name='end']").find("option:selected").val()},
				   success: function (data){
				   	if($('#checkValue').attr("checked")==false)
				        {
				   	   mySelect.html('');
				   	  var records = eval(data);
				   	  var recordCount = records.length;
				   	  for (i=0; i<recordCount; i++) {
				   	  	  mySelect.append(
				   	  	  	  $('<option></option>').val(records[i]['id']).html(records[i]['name'])
                                                                                  );
				   	  }
				   	  mySelect.val('4');
				   	  if(recordCount==0)
				   	  {
				   	     $('#lblInicator').css("display","block");	     
				   	  }
				   	  else
				   	  {
				   	    $('#lblInicator').css("display","none");
				   	  }
				      }
				   }
				   
				  }); 
	 
      
   });

   $("select[name='end']").change(function() {
      var startTime = $("select[name='start']").find("option:selected").val();
      var endTime = $("select[name='end']").find("option:selected").val();
      var mySelect = $('#technician_id');
         $.ajax({
				   type: "POST",
				   url: "/review/availabilities/fetchAvailableTechnicians",
				   data:{appStart : startTime, appEnd : endTime},
				   success: function (data){
				    if($('#checkValue').attr("checked")==false)
				        {
				   	   mySelect.html('');
				   	  var records = eval(data);
				   	  var recordCount = records.length;
				   	  for (i=0; i<recordCount; i++) {
				   	  	  mySelect.append(
				   	  	  	  $('<option></option>').val(records[i]['id']).html(records[i]['name'])
                                                                                  );
				   	  }
				   	  mySelect.val('4');
				   	  if(recordCount==0)
				   	  {
				   	     $('#lblInicator').css("display","block");	     
				   	  }
				   	  else
				   	  {
				   	    $('#lblInicator').css("display","none");
				   	  }
				       }   
				   }
				   
				  }); 
       
      
   });
   
   
   
   var $about = $("#about");

   $("#about_button").click(function() {
      $about.dialog({
         title: "About this calendar demo",
         width: 600,
         close: function() {
            $about.dialog("destroy");
            $about.hide();
         },
         buttons: {
            close : function() {
               $about.dialog("close");
            }
         }
      }).show();
   });
   
   $("#btnSaveSettings").click(function() {
   		   $calendar.weekCalendar('refresh');
   		   var mydate= $('#datepicker').val();
   		   if(isNaN(mydate))
   		   {
                      var date = new Date(mydate);
                      $('#calendar').weekCalendar('gotoWeek', date);
               	   }
   		   });
   
   $("#checkValue").change(function() {
      var startTime = $("select[name='start']").find("option:selected").val();
      var endTime = $("select[name='end']").find("option:selected").val();
      var mySelect = $('#technician_id');
      
      if($(this).attr("checked")==true)
      {
      	               $.ajax({
				   type: "POST",
				   url: "/review/users/fetchAllTechnicians",
				   data:{appStart : startTime, appEnd : endTime},
				   success: function (data){
				   	   mySelect.html('');
				   	  var records = eval(data);
				   	  var recordCount = records.length;
				   	  for (i=0; i<recordCount; i++) {
				   	  	  mySelect.append(
				   	  	  	  $('<option></option>').val(records[i]['id']).html(records[i]['name'])
                                                                                  );
				   	  }
				   	  mySelect.val('4');
				   	  if(recordCount==0)
				   	  {
				   	     $('#lblInicator').css("display","block");	     
				   	  }
				   	  else
				   	  {
				   	    $('#lblInicator').css("display","none");
				   	  }
				   }
				   
				  }); 
      }
      else
      {
      	            	      $.ajax({
				   type: "POST",
				   url: "/review/availabilities/fetchAvailableTechnicians",
				   data:{appStart : startTime, appEnd : endTime},
				   success: function (data){
				   	   mySelect.html('');
				   	  var records = eval(data);
				   	  var recordCount = records.length;
				   	  for (i=0; i<recordCount; i++) {
				   	  	  mySelect.append(
				   	  	  	  $('<option></option>').val(records[i]['id']).html(records[i]['name'])
                                                                                  );
				   	  }
				   	  mySelect.val('4');
				   	  if(recordCount==0)
				   	  {
				   	     $('#lblInicator').css("display","block");	     
				   	  }
				   	  else
				   	  {
				   	    $('#lblInicator').css("display","none");
				   	  }
				   }
				   
				  }); 
      }
  });


});
