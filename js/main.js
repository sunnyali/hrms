	$(function(){
				//Vertical Menu Sub Tabs
				
				$(function() {
				$(".subs").hide();
	       		$(".super").click(function() {
	       			$(".subs").toggle();
	       			return false;
	       				});
				});

				// Datepicker For Date of Birth
				$('.dob').datepicker({
					showOn: "button",
		            buttonImage: "../../images/extra/calendar.jpg",
		            buttonImageOnly: true,
					maxDate: '-18Y',
      				changeMonth: true,
      				changeYear: true,
      				yearRange: '-80:-18',
      				dateFormat: 'yy-mm-dd',
				});
				// Datepiker For Expire/Future Date's
				$('.exp_date').datepicker({
					showOn: "button",
		            buttonImage: "../../images/extra/calendar.jpg",
		            buttonImageOnly: true,
					minDate: +1,
					changeMonth: true,
					changeYear: true,
					dateFormat: 'yy-mm-dd',
    			});
				// Datepiker For Previous Date's
				$('.predate').datepicker({
					showOn: "button",
		            buttonImage: "../../images/extra/calendar.jpg",
		            buttonImageOnly: true,
					maxDate: 0,
					changeMonth: true,
					changeYear: true,
					dateFormat: 'yy-mm-dd',
    			});
			});