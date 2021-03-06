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
      	      return 817;
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
         var $dialogContent = $("#event_edit_container");
         resetForm($dialogContent);
         var startField = $dialogContent.find("select[name='start']").val(calEvent.start);
         var endField = $dialogContent.find("select[name='end']").val(calEvent.end);         
         var bodyField = $dialogContent.find("textarea[name='body']");

         $dialogContent.dialog({
            modal: true,
            title: "New Availability",
            close: function() {
               $dialogContent.dialog("destroy");
               $dialogContent.hide();
               $('#calendar').weekCalendar("removeUnsavedEvents");
            },
            buttons: {
               save : function() {
               	  var appStartTime = startField.val();
                  var appEndTime = endField.val();
                  var appBody = bodyField.val();
                  $.ajax({
				   type: "POST",
				   url: "/review/availabilities/addAvalaibility",
				   data:{belongsTo:$('#technicainId').val(),start : appStartTime, end : appEndTime, body : appBody, clinic:$("#selectClinic").val()}				   
				  }); 
		  
                  $dialogContent.dialog("close");
                  $calendar.weekCalendar('refresh');
               },
               cancel : function() {
                  $dialogContent.dialog("close");
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
      	      $.post("/review/availabilities/dropResizeSaving", { id: apptId, start: startTime, end: endTime} );
	      $calendar.weekCalendar('refresh');
      },
      eventResize : function(calEvent, $event) {
      	      var apptId=calEvent.id.toString();
      	      var startTime=calEvent.start.toString();
      	      var endTime=calEvent.end.toString();
      	      $.post("/review/availabilities/dropResizeSaving", { id: apptId, start: startTime, end: endTime} );
	      $calendar.weekCalendar('refresh');
      },
      eventClick : function(calEvent, $event) {

         if (calEvent.readOnly) {
            return;
         }

         var $dialogContent = $("#event_edit_container");
         resetForm($dialogContent);
         var idField=$dialogContent.find("input[name='id']").val(calEvent.id);
         var startField = $dialogContent.find("select[name='start']").val(calEvent.start);
         var endField = $dialogContent.find("select[name='end']").val(calEvent.end);
         var bodyField = $dialogContent.find("textarea[name='body']");        
         bodyField.val(calEvent.body);

         $dialogContent.dialog({
            modal: true,
            title: "Edit Availability",
            close: function() {
               $dialogContent.dialog("destroy");
               $dialogContent.hide();
               $('#calendar').weekCalendar("removeUnsavedEvents");
            },
            buttons: {
               save : function() {
                  var avId=idField.val();
                  var avStartTime = startField.val();
                  var avEndTime = endField.val();
                  var avBody = bodyField.val();
                  $.ajax({
				   type: "POST",
				   url: "/review/availabilities/editAvailability",
				   data:{id : avId, start : avStartTime, end : avEndTime, body : avBody}
				   
				  }); 
		  $dialogContent.dialog("close");
                  $calendar.weekCalendar('refresh');
               },
               "delete" : function() {
               	       var appId=idField.val();
               	       $.ajax({
				   type: "POST",
				   url: "/review/availabilities/deleteAvailability",
				   data:{id : appId}
				   
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
      	      $.getJSON("/review/availabilities/feed", {
              start: start.getTime(),
              end: end.getTime(),
              techId: $('#technicainId').val(),
              clinic: $("#selectClinic").val()
          },  function(result) {
           callback(result);
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

});
