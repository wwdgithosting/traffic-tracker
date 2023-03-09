"use strict";

// Class definition
var KTModalCustomersAdd = function () {
    var submitButton;
    var cancelButton;
	var closeButton;
    var validator;
    var form;
    var modal;

    // Init form inputs
    var handleForm = function () {
        // Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
		validator = FormValidation.formValidation(
			form,
			{
				fields: {
                    'name': {
						validators: {
							notEmpty: {
								message: 'name is required'
							}
						}
					},
                    'organizations': {
						validators: {
							notEmpty: {
								message: 'organizations is required'
							}
						}
					}
				},
				plugins: {
					trigger: new FormValidation.plugins.Trigger(),
					bootstrap: new FormValidation.plugins.Bootstrap5({
						rowSelector: '.fv-row',
                        eleInvalidClass: '',
                        eleValidClass: ''
					})
				}
			}
		);

		// Revalidate country field. For more info, plase visit the official plugin site: https://select2.org/
        $(form.querySelector('[name="country"]')).on('change', function() {
            // Revalidate the field when an option is chosen
            validator.revalidateField('country');
        });

		// Action buttons
		submitButton.addEventListener('click', function (e) {
			e.preventDefault();

			// Validate form before submit
			if (validator) {
				validator.validate().then(function (status) {
					console.log('validated!');

					if (status == 'Valid') {
						submitButton.setAttribute('data-kt-indicator', 'on');

						// Disable submit button whilst loading
						//submitButton.disabled = true;

						axios.post("partner-store", {
                            org_id: $("#organizations").val(),
                            partners_name: form.querySelector('[name="name"]').value,
                            partners_id: form.querySelector('[name="partnerid"]').value,
			
                        }).then(function (response) {
                            console.log(response);
                            if (response.data.status) {
                                // form.querySelector('[name="role_name"]').value=" ";
                                // form.querySelector('[name="email"]').value=" ";
								// form.querySelector('[name="address"]').value=" ";
                                Swal.fire({
                                    text: response.data.message,
                                    icon: "success",
                                    buttonsStyling: false,
                                    confirmButtonText: "Ok, got it!",
                                    customClass: {
                                        confirmButton: "btn btn-primary"
                                    }
                                }).then(function (result) {

                                    form.reset(); // Reset form	
                                    modal.hide(); // Hide modal	
                                    location.reload(true);

                                });                               

                            } else {
                                // Show error popup. For more info check the plugin's official documentation: https://sweetalert2.github.io/
                                Swal.fire({
                                    text: response.data.message,
                                    icon: "error",
                                    buttonsStyling: false,
                                    confirmButtonText: "Ok, got it!",
                                    customClass: {
                                        confirmButton: "btn btn-primary"
                                    }
                                });
                            }
                        }).catch(function (error) {
							console.log(error);
                            Swal.fire({
                                text: "Sorry, looks like there are some errors detected, please try again.",
                                icon: "error",
                                buttonsStyling: false,
                                confirmButtonText: "Ok, got it!1111",
                                customClass: {
                                    confirmButton: "btn btn-primary"
                                }
                            });
                        });   						
					} else {
						Swal.fire({
							text: "Sorry, looks like there are some errors detected, please try again.",
							icon: "error",
							buttonsStyling: false,
							confirmButtonText: "Ok, got it!2222",
							customClass: {
								confirmButton: "btn btn-primary"
							}
						});
					}
				});
			}
		});

        cancelButton.addEventListener('click', function (e) {
            e.preventDefault();
            var emptyVal=$("#kt_modal_add_customer_form input").filter(function () {
                return $.trim($(this).val()).length == 0
            }).length;
            console.log(emptyVal);
            if(emptyVal < 1){
            Swal.fire({
                text: "Are you sure you would like to cancel?",
                icon: "warning",
                showCancelButton: true,
                buttonsStyling: false,
                confirmButtonText: "Yes, cancel it!",
                cancelButtonText: "No, return",
                customClass: {
                    confirmButton: "btn btn-primary",
                    cancelButton: "btn btn-active-light"
                }
            }).then(function (result) {
                if (result.value) {
                    $('#org_id').val(0);
                    document.querySelector('#kt_modal_add_customer_form').reset(); // Reset form	
                    modal.hide(); // Hide modal				
                } else if (result.dismiss === 'cancel') {
                    Swal.fire({
                        text: "Your form has not been cancelled!.",
                        icon: "error",
                        buttonsStyling: false,
                        confirmButtonText: "Ok, got it!",
                        customClass: {
                            confirmButton: "btn btn-primary",
                        }
                    });
                }
            });
        }else{
            $('#org_id').val('0');
            document.querySelector('#kt_modal_add_customer_form').reset(); // Reset form	
            modal.hide(); // Hide modal				
        }
        });

		closeButton.addEventListener('click', function(e){
			e.preventDefault();
            var emptyVal=$("#kt_modal_add_customer_form input").filter(function () {
                return $.trim($(this).val()).length == 0
            }).length;
            console.log(emptyVal);
            if(emptyVal < 3){
            Swal.fire({
                text: "Are you sure you would like to cancel?",
                icon: "warning",
                showCancelButton: true,
                buttonsStyling: false,
                confirmButtonText: "Yes, cancel it!",
                cancelButtonText: "No, return",
                customClass: {
                    confirmButton: "btn btn-primary",
                    cancelButton: "btn btn-active-light"
                }
            }).then(function (result) {
                if (result.value) {
                   // form.querySelector('[name="org_id"]').value="0";
                    $('#org_id').val('0');
                    document.querySelector('#kt_modal_add_customer_form').reset(); // Reset form	
                    modal.hide(); // Hide modal				
                } else if (result.dismiss === 'cancel') {
                    Swal.fire({
                        text: "Your form has not been cancelled!.",
                        icon: "error",
                        buttonsStyling: false,
                        confirmButtonText: "Ok, got it!",
                        customClass: {
                            confirmButton: "btn btn-primary",
                        }
                    });
                }
            });
            }else{
                $('#org_id').val('0');
                document.querySelector('#kt_modal_add_customer_form').reset(); // Reset form	
                modal.hide(); // Hide modal				
            }
		})
    }

    return {
        // Public functions
        init: function () {
            // Elements
            modal = new bootstrap.Modal(document.querySelector('#kt_modal_add_customer'));

            form = document.querySelector('#kt_modal_add_customer_form');
            submitButton = form.querySelector('#kt_modal_add_customer_submit');
            cancelButton = form.querySelector('#kt_modal_add_customer_cancel');
			closeButton = form.querySelector('#kt_modal_add_customer_close');

            handleForm();
        }
    };
}();

// On document ready
KTUtil.onDOMContentLoaded(function () {
	KTModalCustomersAdd.init();
});