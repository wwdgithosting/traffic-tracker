"use strict";

// Class definition
var KTUsersAddUser = function () {
    // Shared variables
    const element = document.getElementById('kt_modal_add_user');
    const form = element.querySelector('#kt_modal_add_user_form');
    const modal = new bootstrap.Modal(element);

    // Init add schedule modal
    var initAddUser = () => {

        // Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
        var validator = FormValidation.formValidation(
            form,
            {
                fields: {
                    'firstname': {
                        validators: {
                            notEmpty: {
                                message: 'First name is required'
                            }
                        }
                    },
                    'lastname': {
                        validators: {
                            notEmpty: {
                                message: 'Last name is required'
                            }
                        }
                    },
                    'email': {
                        validators: {
                            notEmpty: {
                                message: 'Valid email address is required'
                            }
                        }
                    },
                    'company': {
                        validators: {
                            notEmpty: {
                                message: 'Company/Organization is required'
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

        // Submit button handler
        const submitButton = element.querySelector('[data-kt-users-modal-action="submit"]');
        submitButton.addEventListener('click', e => {
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
                        var textinputs = form.querySelectorAll('input[type=radio]');
                        var i = 0;
                        var roles;
                        var empty = [].filter.call(textinputs, function (el) {
                            if (el.checked) {
                                roles = el.value;
                                console.log(el.value);
                                i++;
                            }
                        });

                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        });
                        var formData = new FormData(form);
                        $.ajax({
                            type: 'POST',
                            url: "http://127.0.0.1:8000/user-store",
                            data: formData,
                            cache: false,
                            contentType: false,
                            processData: false,
                            success: (data) => {
                                console.log(data);
                                if (data.status) {
                                    Swal.fire({
                                        text: data.message,
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
                                    Swal.fire({
                                        text: data.message,
                                        icon: "error",
                                        buttonsStyling: false,
                                        confirmButtonText: "Ok, got it!",
                                        customClass: {
                                            confirmButton: "btn btn-primary"
                                        }
                                    }).then(function (result) {

                                        submitButton.disabled = false;

                                    });
                                }

                            },
                            error: function (data) {
                                Swal.fire({
                                    text: data.message,
                                    icon: "error",
                                    buttonsStyling: false,
                                    confirmButtonText: "Ok, got it!",
                                    customClass: {
                                        confirmButton: "btn btn-primary"
                                    }
                                }).then(function (result) {

                                    submitButton.disabled = false;

                                });
                            }
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

        // Cancel button handler
        const cancelButton = element.querySelector('[data-kt-users-modal-action="cancel"]');
        cancelButton.addEventListener('click', e => {
            e.preventDefault();
            let validate = false;
            /*$('.form-control').each(function(i){
                console.log(i);
                if($(this).val()!=''){
                    validate=true;
                }
            })*/
            let i = 0;

            var emptyVal = $("#kt_modal_add_user_form input").filter(function () {
                return $.trim($(this).val()).length == 0
            }).length;

            var emptyVal1 = $("#kt_modal_add_user_form select").filter(function () {
                return $.trim($(this).val()).length == 0
            }).length;
            var emptyVal = emptyVal + emptyVal1;
            console.log(emptyVal)
            if (emptyVal > 1 && emptyVal < 6) {

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
                        element.querySelector('#kt_modal_add_user_form').reset();	
                        var imageUrl ='public/assets/media/avatars/blank.png';
                        $('.image-input-wrapper').removeAttr("style");
                        $('.image-input-wrapper').css("background-image", "url(" + imageUrl + ")");
                        $('input[type=radio]').removeAttr('checked');
                        modal.hide();
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
            } else {
                form.reset(); // Reset form		
                element.querySelector('#kt_modal_add_user_form').reset();	
                var imageUrl ='public/assets/media/avatars/blank.png';
                $('.image-input-wrapper').removeAttr("style");
                $('.image-input-wrapper').css("background-image", "url(" + imageUrl + ")");
                $('input[type=radio]').removeAttr('checked');
                modal.hide();
            }

        });

        // Close button handler
        const closeButton = element.querySelector('[data-kt-users-modal-action="close"]');
        closeButton.addEventListener('click', e => {
            e.preventDefault();

            var emptyVal = $("#kt_modal_add_user_form input").filter(function () {
                return $.trim($(this).val()).length == 0
            }).length;

            var emptyVal1 = $("#kt_modal_add_user_form select").filter(function () {
                return $.trim($(this).val()).length == 0
            }).length;
            var emptyVal = emptyVal + emptyVal1;
            console.log(emptyVal)
            if (emptyVal > 1 && emptyVal < 6) {

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
                    element.querySelector('#kt_modal_add_user_form').reset();	
                    var imageUrl ='public/assets/media/avatars/blank.png';
                    $('.image-input-wrapper').removeAttr("style");
                    $('.image-input-wrapper').css("background-image", "url(" + imageUrl + ")");
                    $('input[type=radio]').removeAttr('checked');
                    modal.hide();
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
        } else {

            form.reset(); // Reset form		
            element.querySelector('#kt_modal_add_user_form').reset();	
            var imageUrl ='public/assets/media/avatars/blank.png';
            $('.image-input-wrapper').removeAttr("style");
			$('.image-input-wrapper').css("background-image", "url(" + imageUrl + ")");
            $('input[type=radio]').removeAttr('checked');
            modal.hide();
        }
        });
    }

    return {
        // Public functions
        init: function () {
            initAddUser();
        }
    };
}();

// On document ready
KTUtil.onDOMContentLoaded(function () {
    KTUsersAddUser.init();
});