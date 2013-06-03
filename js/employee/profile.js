$(document).ready(function(){
	
		// Add Classes to Dropdown Menu
		$('#menu ul li:nth-child(3)').addClass("current");
		$('#menu ul li:nth-child(3) ul li:nth-child(1)').addClass("selected");
		
		// Add selected class to side menu
		$('#sidenav li:nth-child(1)').addClass("selected");

		function personal_disable() {
      		$(".ed_personal").attr('disabled',true);
      		$('#dob').removeClass("dob");
      		$("#sbt_personal").hide();
			$("#btn_personal").show();
		}
		
		function cnic_disable() {
      		$(".ed_cnic").attr('disabled',true);
      		$("#sbt_cnic").hide();
			$("#btn_cnic").show();
		}
		function driving_disable() {
      		$(".ed_driving").attr('disabled',true);
      		$("#sbt_driving").hide();
			$("#btn_driving").show();
		}
		function passport_disable() {
      		$(".ed_passport").attr('disabled',true);
      		$("#sbt_passport").hide();
			$("#btn_passport").show();
		}
		
		personal_disable();
		cnic_disable();
		driving_disable();
		passport_disable();
		
		$('#btn_personal').click(function() {
  						
			$(".ed_personal").attr('disabled',false);

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

	    	$("#btn_personal").hide();
	    	$("#sbt_personal").show();
	    	cnic_disable();
			driving_disable();
			passport_disable();
  		    return false;
  		});
		
		$('#btn_cnic').click(function() {
  						
			$(".ed_cnic").attr('disabled',false);
	    	$("#btn_cnic").hide();
	    	$("#sbt_cnic").show();
	    	personal_disable();
			driving_disable();
			passport_disable();
  		    return false;
  		});	
		
		$('#btn_driving').click(function() {
  						
			$(".ed_driving").attr('disabled',false);
	    	$("#btn_driving").hide();
	    	$("#sbt_driving").show();
	    	personal_disable();
			cnic_disable();
			passport_disable();
  		    return false;
  		});	
		
		$('#btn_passport').click(function() {
  						
			$(".ed_passport").attr('disabled',false);
	    	$("#btn_passport").hide();
	    	$("#sbt_passport").show();
	    	personal_disable();
			cnic_disable();
			driving_disable();
  		    return false;
  		});	
		
});