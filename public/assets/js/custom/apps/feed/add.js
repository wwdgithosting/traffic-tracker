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
                    'organization_name': {
						validators: {
							notEmpty: {
								message: 'Organization name is required'
							}
						}
					},
                    'partner': {
						validators: {
							notEmpty: {
								message: 'partner name is required'
							}
						}
					},
                    'feed_title': {
						validators: {
							notEmpty: {
								message: 'feed title is required'
							}
						}
					},
                    'limit': {
						validators: {
							notEmpty: {
								message: 'URL limit is required'
							}
						}
					},
                    'fallback_feed_url': {
						validators: {
							notEmpty: {
								message: 'Fallback_feed_url limit is required'
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
       /* $(form.querySelector('[name="country"]')).on('change', function() {
            // Revalidate the field when an option is chosen
            validator.revalidateField('country');
        });*/

		// Action buttons
		submitButton.addEventListener('click', function (e) {
			e.preventDefault();

			// Validate form before submit
			if (validator) {
				validator.validate().then(function (status) {
					console.log('validated!');
                    console.log(navigator.languages[1],);
                    console.log(navigator);
					if (status == 'Valid') {
						submitButton.setAttribute('data-kt-indicator', 'on');
                        var feed_urls=[];
                        
                        
                        // var feed_url=form.querySelectorAll('.feed_url');
                        // var feed_url_limit=form.querySelectorAll('.feed_url_limit');
                        // var feed_sub_ids=form.querySelectorAll('.sub_id');
                        var indexes=form.querySelector('[name="count_index"]').value.split(',');
                        console.log(indexes);
                        if($('#kt_modal_sub_id_limit').is(':checked')){
                            console.log('on');
                        }else{
                            console.log('off');
                        }

                        for(let i=0;i<indexes.length;i++){        
                            var sub_id=[];                   
                            $('.sub_id_'+indexes[i]).each(function(k){
                               
                                let subObj=[];
                                console.log($(this).val());
                                
                                
                                    $('.sub_id_limit_'+indexes[i]).each(function(j){
                                        console.log($(this).val());
                                       
                                            subObj.push({'feed_url_index':i,'limit':$(this).val()})
                                       
                                       
                                    })
    
                               
                                sub_id.push({'sub_id':$(this).val(),subObj});
                            })
                           
                            feed_urls.push({'urls':$('.feed_url_'+indexes[i]).val(),'limit':$('.feed_url_limit_'+indexes[i]).val(),'sub_id':sub_id})


                        }
                        console.log('feed_urls',feed_urls);
                        console.log('sub_id',sub_id);
                        // for (let i = 0; i < feed_url.length; i++) {
                        //     feed_urls.push({'urls':feed_url[i].value,'limit':feed_url_limit[i].value,'sub_id':feed_sub_ids[i].value});
                        //     //console.log(feed_urls);
                        //   }
                          console.log(feed_urls);
						// Disable submit button whilst loading
						//submitButton.disabled = true;
                      

						axios.post("feed-store", {
                            organization_name: form.querySelector('[name="organization_name"]').value,
                            partner: form.querySelector('[name="partner"]').value,
                            feed_title: form.querySelector('[name="feed_title"]').value,
							limit: form.querySelector('[name="limit"]').value,
							notes: form.querySelector('[name="description"]').value,
                            feeds: feed_urls,
                            sub_id:sub_id,
                            fallback_feed_url:form.querySelector('[name="fallback_feed_url"]').value,
                            sid_limit:($('#kt_modal_sub_id_limit').is(':checked')) ? 1:0 ,
                            randomise:($('#kt_modal_randonisation').is(':checked')) ? 1:0 ,
                            latency_test:($('#kt_modal_latency_test').is(':checked')) ? 1:0 ,
                            ip_limit:($('#kt_modal_ip_limit').is(':checked')) ? 1:0 ,
                            feed_url_waterfall:($('#kt_modal_feed_url_waterfall').is(':checked')) ? 1:0 ,
                            browser_language:navigator.languages[1],
                            os:navigator.userAgentData.platform,
                            device:(!navigator.userAgentData.mobile)? 'Desktop':'Mobile',
                            browser:navigator.userAgentData.brands[2].brand,
                            feed_id:form.querySelector('[name="feed_id"]').value,
                        }).then(function (response) {
                            console.log(response);
                            if (response.data.status) {
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
                    location.reload(true);			
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
        });

		closeButton.addEventListener('click', function(e){
			e.preventDefault();

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
                    location.reload(true);			
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
		})
    }

    return {
        // Public functions
        init: function () {
            // Elements
            modal = new bootstrap.Modal(document.querySelector('#kt_modal_add_feeds'));

            form = document.querySelector('#kt_modal_add_feeds_form');
            submitButton = form.querySelector('#kt_modal_add_feeds_submit');
            cancelButton = form.querySelector('#kt_modal_add_feeds_cancel');
			closeButton = form.querySelector('#kt_modal_add_feeds_close');

            handleForm();
        }
    };
}();

// On document ready
KTUtil.onDOMContentLoaded(function () {
	KTModalCustomersAdd.init();
});