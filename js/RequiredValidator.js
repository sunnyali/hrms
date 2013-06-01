 function validate() {

        }
        function formSuccess() {
		
            alert('Success!');
        }

        function formFailure() {
            alert('Failure!');
        }
        jQuery(document).ready(function () {
	
            // binds form submission and fields to the validation engine
            jQuery("#formID").validationEngine({
			
                onFormSuccess: formSuccess,
                onFormFailure: formFailure
            });
        });

        /**
        *
        * @param {jqObject} the field where the validation applies
        * @param {Array[String]} validation rules for this field
        * @param {int} rule index
        * @param {Map} form options
        * @return an error string if validation failed
        */
        function checkHELLO(field, rules, i, options) {
            if (field.val() != "HELLO") {
                // this allows to use i18 for the error msgs
                return options.allrules.validate2fields.alertText;
            }
        }