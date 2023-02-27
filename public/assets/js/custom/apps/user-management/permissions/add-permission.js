"use strict";

// Class definition
var KTUsersAddPermission = function () {
    // Shared variables
    const element = document.getElementById('kt_modal_add_permission');
    const form = element.querySelector('#kt_modal_add_permission_form');
    const modal = new bootstrap.Modal(element);

    // Init add schedule modal
    var initAddPermission = () => {

        // Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
        var validator = FormValidation.formValidation(
            form,
            {
                fields: {
                    'permission_name': {
                        validators: {
                            notEmpty: {
                                message: 'Permission name is required'
                            }
                        }
                    },
                    'permission_url': {
                        validators: {
                            notEmpty: {
                                message: 'Permission URL is required'
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

        // Close button handler
        const closeButton = element.querySelector('[data-kt-permissions-modal-action="close"]');
        closeButton.addEventListener('click', e => {
            e.preventDefault();
            var emptyVal=$("#kt_modal_add_permission_form input").filter(function () {
                return $.trim($(this).val()).length == 0
            }).length;

           
          
            console.log(emptyVal)
            if(emptyVal < 2){
            Swal.fire({
                text: "Are you sure you would like to close?",
                icon: "warning",
                showCancelButton: true,
                buttonsStyling: false,
                confirmButtonText: "Yes, close it!",
                cancelButtonText: "No, return",
                customClass: {
                    confirmButton: "btn btn-primary",
                    cancelButton: "btn btn-active-light"
                }
            }).then(function (result) {
                if (result.value) {
                    form.reset(); 
                    modal.hide(); // Hide modal				
                }
            });
        }else{
            form.reset(); 
            modal.hide(); // Hide modal	 
        }
        });

        // Cancel button handler
        const cancelButton = element.querySelector('[data-kt-permissions-modal-action="cancel"]');
        cancelButton.addEventListener('click', e => {
            e.preventDefault();
            var emptyVal=$("#kt_modal_add_permission_form input").filter(function () {
                return $.trim($(this).val()).length == 0
            }).length;

           
          
            console.log(emptyVal)
            if(emptyVal < 2){
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
                    form.reset(); // Reset form	
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
            form.reset(); 
            modal.hide(); // Hide modal	 
        }
        });

        // Submit button handler
        const submitButton = element.querySelector('[data-kt-permissions-modal-action="submit"]');
        submitButton.addEventListener('click', function (e) {
            // Prevent default button action
            e.preventDefault();

            // Validate form before submit
            if (validator) {
                validator.validate().then(function (status) {
                    console.log('validated!');

                    if (status == 'Valid') {
                        // Show loading indication
                        submitButton.setAttribute('data-kt-indicator', 'on');

                        // Disable button to avoid multiple click 
                        submitButton.disabled = true;

                        axios.post("menu-store", {
                            title: form.querySelector('[name="permission_name"]').value,
                            url: form.querySelector('[name="permission_url"]').value
                        }).then(function (response) {
                            console.log(response.data);
                            if (response.data.status) {
                                form.querySelector('[name="permission_name"]').value = "";
                                form.querySelector('[name="permission_url"]').value = "";
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
                            Swal.fire({
                                text: "Sorry, looks like there are some errors detected, please try again.",
                                icon: "error",
                                buttonsStyling: false,
                                confirmButtonText: "Ok, got it!",
                                customClass: {
                                    confirmButton: "btn btn-primary"
                                }
                            });
                        });
                    } else {
                        // Show popup warning. For more info check the plugin's official documentation: https://sweetalert2.github.io/
                        Swal.fire({
                            text: "Sorry, looks like there are some errors detected, please try again.",
                            icon: "error",
                            buttonsStyling: false,
                            confirmButtonText: "Ok, got it!",
                            customClass: {
                                confirmButton: "btn btn-primary"
                            }
                        });
                    }
                });
            }
        });
    }

    return {
        // Public functions
        init: function () {
            initAddPermission();
        }
    };
}();

// On document ready
KTUtil.onDOMContentLoaded(function () {
    KTUsersAddPermission.init();
});