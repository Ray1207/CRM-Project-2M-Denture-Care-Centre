<?php echo $this->Html->css('reset'); ?>
<?php echo $this->Html->css('bootstrap.min'); ?>

    <!--
	<link rel='stylesheet' type='text/css' href='http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.9/themes/base/jquery-ui.css' />
	-->
	 <link rel='stylesheet' type='text/css' href='http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.9/themes/base/jquery-ui.css' />	 
        <?php echo $this->Html->css('jquery.weekcalendar'); ?>
        <?php echo $this->Html->css('demo'); ?>
        <?php echo $this->Html->css('default'); ?>
									
	 <!-- <link rel='stylesheet' type='text/css' href='../skins/default.css' /> -->
	   
    <script type='text/javascript' src='http://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js'></script>
    <script type='text/javascript' src='http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.9/jquery-ui.min.js'></script>

  
  <?php echo $this->Html->script('date'); ?>
  <?php echo $this->Html->script('jquery.weekcalendar'); ?>
  <?php echo $this->Html->script('rosterCalendar'); ?>
    <?php echo $this->Html->script('jquery.qtip-1.0.0-rc3.min.js'); ?>
	<style>
	
	.ui-combobox {
		
		position: relative;
		display: inline-block;
	}
	.ui-combobox-toggle {
		position: absolute;
		top: 0;
		bottom: 0;
		margin-left: -1px;
		padding: 0;
		height:28px;
		/* adjust styles for IE 6/7 */
		*height: 1.7em;
		*top: 0.1em;
	}
	.ui-combobox-input {
		margin: 0;
		padding: 0.3em;
		
	}
	.ui-autocomplete-input{
		
	}
	#patcient{
		display:none;
	}
	form {
           margin: 0 -21px 18px;
        }
        #lblInicator{
        	margin-top:0px !important;
        	color:red;
        	font-style:italic;
        }
        #lblTechnician{
        	display:inline !important;
        	margin-left:10px;
        	font-weight:bold;
        }
        #lbl1{
        	display:inline !important;
        }
        .wc-cal-event{
        	right: 5px !important;
        }
	</style>
	<script>
	(function( $ ) {
		$.widget( "ui.combobox", {
			_create: function() {
				var input,
					self = this,
					select = this.element.hide(),
					selected = select.children( ":selected" ),
					value = selected.val() ? selected.text() : "",
					wrapper = this.wrapper = $( "<span>" )
						.addClass( "ui-combobox" )
						.insertAfter( select );

				input = $( "<input id='inputPatient' name='patient'>" )
					.appendTo( wrapper )
					.val( value )
					
					.addClass( "patientTest" )
					.autocomplete({
						delay: 0,
						minLength: 0,
						source: function( request, response ) {
							var matcher = new RegExp( $.ui.autocomplete.escapeRegex(request.term), "i" );
							response( select.children( "option" ).map(function() {
								var text = $( this ).text();
								var value=$( this ).val();
								if ( this.value && ( !request.term || matcher.test(text) ) )
									return {
										label: text.replace(
											new RegExp(
												"(?![^&;]+;)(?!<[^<>]*)(" +
												$.ui.autocomplete.escapeRegex(request.term) +
												")(?![^<>]*>)(?![^&;]+;)", "gi"
											), "<strong>$1</strong>" ),
										id: value,
										value: text,
										option: this
									};
							}) );
						},
						select: function( event, ui ) {
							ui.item.option.selected = true;
							self._trigger( "selected", event, {
								item: ui.item.option
							});
							$('#patcient').val(ui.item.id);							
						},
						change: function( event, ui ) {
							if ( !ui.item ) {
								var matcher = new RegExp( "^" + $.ui.autocomplete.escapeRegex( $(this).val() ) + "$", "i" ),
									valid = false;
								select.children( "option" ).each(function() {
									if ( $( this ).text().match( matcher ) ) {
										this.selected = valid = true;
										return false;
									}
								});
								if ( !valid ) {
									// remove invalid value, as it didn't match anything
									$( this ).val( "" );
									select.val( "" );
									input.data( "autocomplete" ).term = "";
									return false;
								}
							}
						}
					})
					.addClass( "ui-widget ui-widget-content ui-corner-left" );

				input.data( "autocomplete" )._renderItem = function( ul, item ) {
					return $( "<li></li>" )
						.data( "item.autocomplete", item )
						.append( "<a id='patientBtn'>" + item.label + "</a>" )
						.appendTo( ul );
				};

				$( "<a>" )
					.attr( "tabIndex", -1 )
					.attr( "title", "Show All Items" )
					.appendTo( wrapper )
					.button({
						icons: {
							primary: "ui-icon-triangle-1-s"
						},
						text: false
					})
					.removeClass( "ui-corner-all" )
					.addClass( "ui-corner-right ui-combobox-toggle" )
					.click(function() {
						// close if already visible
						if ( input.autocomplete( "widget" ).is( ":visible" ) ) {
							input.autocomplete( "close" );
							return;
						}

						// work around a bug (likely same cause as #5265)
						$( this ).blur();

						// pass empty string as value to search for, displaying all results
						input.autocomplete( "search", "" );
						input.focus();
					});
			},
			dd: function(value) {
                                this.element.val(value);
                                this.input.val(value);
    },
			destroy: function() {
				this.wrapper.remove();
				this.element.show();
				$.Widget.prototype.destroy.call( this );
			}
		});
	})( jQuery );

	$(function() {
		$( "#combobox" ).combobox();
		$( "#toggle" ).click(function() {
		  $( "#combobox" ).toggle();			
		});
		$("#datepicker").datepicker({
       		       dateFormat : 'DD, d MM, yy'
	       });
	       $(".checkbox").qtip({
                      content: '1.Check it to close auto techncian look-up and enable all the techncians.<br> 2.Uncheck it to open auto techncian look-up.',
                      position: {
                                adjust: {
                                       x: -190,
                                       Y:-100
                                 }
                      },
                      style: { 
                      	    left:  150,
                            width: 290,
                            padding: 5,
                            background: '#A2D959',
                            color: 'white',
                            textAlign: 'center',
                            border: {
                            width: 7,
                            radius: 5,
                            color: '#A2D959'
                            },
                    tip: 'topLeft',
                    name: 'dark'
                  }
              });
               
               
	});
	

	
	
	</script>
 <div id="location">
  <?php echo $this->Html->image ('HomeIcon.png', array ('alt'=>'Current location', 'id'=>'locationLogo', 'border'=>'0')); ?> 
 </div>
 <div id="currentLocation">Current location: <?php echo $this->Html->link ('Appointment',''); ?> </div>

<div id="content">
<?php echo $this->Session->flash(); ?>
  <form>
  <p><label class="lblLine" for="datepicker" >Date: </label> <input type="text" id="datepicker">
  <label class="lblLine" for="selectClinic">Clinic: </label>           
  <?php   echo $this->Form->input('clinic', array('id'=>'selectClinic','label'=>false,'type'=>'select','div'=>false,'options'=>$clinics));?>
   <button id="btnSaveSettings" class="btn btn-success" type="button">Go</button>
   </p>
  </form>
 

	<div id='calendar'></div>
	<div id="event_edit_container">
		<form>
			<input type="hidden" />
			<ul>
				<li>
					<span>Date: </span><span class="date_holder"></span> 
					
				</li>
				<li>
					<input type="hidden" name="id"/>
				</li>
				<li>
					<label for="title">Title: </label><input type="text" name="title" />
				</li>
				        
					<?php   echo $this->Form->input('combobox', array('label'=>'Patient:','type'=>'select','div'=>false,'name'=>'patient','options'=>$patients));?>
                                        <?php   echo $this->Form->input('patcient', array('label'=>false,'type'=>'select','Hidden'=>'Hidden','div'=>false,'name'=>'patient','options'=>$patients));?>
					
				</li>
				<li>
					<label for="start">Start Time: </label><select name="start"><option value="">Select Start Time</option></select>
				</li>
				<li>
					<label for="end">End Time: </label><select name="end"><option value="">Select End Time</option></select>
				</li>
				<li id="liTech" style="margin-top:15px;margin-bottom:15px;">
				<label id='lbl1'>Technician: </label><label id="lblTechnician"></label>
				</li>
				<li>
					<?php   echo $this->Form->input('technician_id', array('label'=>'Available Technicians:','type'=>'select','name'=>'technician','options'=>$technicians));?>
					<label id="lblInicator" style="display:none;">No available technician in this time interval.</label>
				</li>
				<li>
				   <label class="checkbox"  id="enableTech">
                                          <input type="checkbox" id="checkValue"> Enable all technicians
                                   </label>
				</li>
				<li>
					<label for="body">Additional Information: </label><textarea name="body"></textarea>
				</li>
				
			</ul>
			<div class="ui-widget">
</div>
		</form>
	</div>
	

</div>






