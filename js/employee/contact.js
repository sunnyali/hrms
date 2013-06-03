$(document).ready(function(){
		
		// Add Classes to Dropdown Menu
		$('#menu ul li:nth-child(3)').addClass("current");
		$('#menu ul li:nth-child(3) ul li:nth-child(1)').addClass("selected");
		
		// Add selected class to side menu
		$('#sidenav li:nth-child(2)').addClass("selected");

		function contact_disable() {
      		$(".ed_contact").attr('disabled',true);
      		$("#sbt_contact").hide();
			$("#btn_contact").show();
		}
		
		function econtact_disable() {
      		$(".ed_econtact").attr('disabled',true);
      		$("#sbt_econtact").hide();
			$("#btn_econtact").show();
		}
		
		contact_disable();
		econtact_disable();
		
		
		$('#btn_contact').click(function() {
  						
			$(".ed_contact").attr('disabled',false);
	    	$("#btn_contact").hide();
	    	$("#sbt_contact").show();
	    	econtact_disable();
			driving_disable();
			passport_disable();
  		    return false;
  		});
		
		$('#btn_econtact').click(function() {
  						
			$(".ed_econtact").attr('disabled',false);
	    	$("#btn_econtact").hide();
	    	$("#sbt_econtact").show();
	    	contact_disable();
			driving_disable();
			passport_disable();
  		    return false;
  		});	
	
});