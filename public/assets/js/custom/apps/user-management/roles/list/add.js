"use strict";

// Class definition
var KTUsersAddRole = function () {
    // Shared variables
    const element = document.getElementById('kt_modal_add_role');
    const form = element.querySelector('#kt_modal_add_role_form');
    const modal = new bootstrap.Modal(element);

    // Init add schedule modal
    var initAddRole = () => {

        // Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
        var validator = FormValidation.formValidation(
            form,
            {
                fields: {
                    'role_name': {
                        validators: {
                            notEmpty: {
                                message: 'Role name is required'
                            }
                        }
                    },
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
        const closeButton = element.querySelector('[data-kt-roles-modal-action="close"]');
        closeButton.addEventListener('click', e => {
            e.preventDefault();
            var emptyVal=$("#kt_modal_add_role_form input").filter(function () {
                return $.trim($(this).val()).length == 0
            }).length;
            console.log(emptyVal);
            if(emptyVal==0){

           
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
                    modal.hide(); // Hide modal				
                } 
            });
        }else{
            modal.hide();  
        }
        });

        // Cancel button handler
        const cancelButton = element.querySelector('[data-kt-roles-modal-action="cancel"]');
        cancelButton.addEventListener('click', e => {
            e.preventDefault();
            var emptyVal=$("#kt_modal_add_role_form input").filter(function () {
                return $.trim($(this).val()).length == 0
            }).length;
            console.log(emptyVal);
            if(emptyVal==0){
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
            form.reset(); // Reset form	
                    modal.hide(); // Hide modal	
        }
        });

         // Submit button handler
         const submitButton = element.querySelector('[data-kt-roles-modal-action="submit"]');
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
                          var val = [];
                        //  $('.kt_roles_select').each(function(i){
                        //     val[i] = $(this).val();
                        //   })
                        var textinputs = form.querySelectorAll('input[type=checkbox]'); 
                        var i=0;
                        var empty = [].filter.call( textinputs, function( el ) {
                           if(el.checked){
                            val[i]=el.value;
                            console.log(el.value);
                            i++;
                           }
                        });
                        console.log(val);
                         axios.post("role-store", {
                            role_name: form.querySelector('[name="role_name"]').value,
                            menu_id: val
                        }).then(function (response) {
                            console.log(response.data);
                            if (response.data.status) {
                                form.querySelector('[name="role_name"]').value = "";
                                //form.querySelector('[name="menu_id"]').value = "";
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

    // Select all handler
    const handleSelectAll = () =>{
        // Define variables
        const selectAll = form.querySelector('#kt_roles_select_all');
        const allCheckboxes = form.querySelectorAll('[type="checkbox"]');

        // Handle check state
        selectAll.addEventListener('change', e => {

            // Apply check state to all checkboxes
            allCheckboxes.forEach(c => {
                c.checked = e.target.checked;
            });
        });
    }

    return {
        // Public functions
        init: function () {
            initAddRole();
            handleSelectAll();
        }
    };
}();

// On document ready
KTUtil.onDOMContentLoaded(function () {
    KTUsersAddRole.init();
});