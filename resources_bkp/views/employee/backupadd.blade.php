@extends('layout.app2')
@section('content')
 @if($errors->any())
    {{ implode('', $errors->all('<div>:message</div>')) }}
@endif
    <form enctype="multipart/form-data" class="basic-form" id="basic-form" method="post" action="{{ route('employee-save') }}" >
        <div class="performance-statistics">
            @csrf
            <div class="add-employee">
                <h2>Basic Information</h2>
                <div class="row">
                    <div class="col-md-6">
                        <div id="my_camera"></div>
                        <br />
                        <input type=button value="Take Snapshot" onClick="take_snapshot()">

                        <input type="hidden" name="snapshot" class="image-tag">
                        @error('image')
                            Please take a snapshot to proceed
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <div id="results">Your captured image will appear here...</div>
                    </div>
                    <div class="col-md-12 text-center">
                        <br />
                        <button class="btn btn-success">Submit</button>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-5">
                        <div class="row mb-3">
                            <label for="inputEmail3" class="col-sm-4 col-form-label">Employee Id*</label>
                            <div class="col-sm-8">
                                <input type="text" value="{{ old('usercode') }}" name="usercode" class="form-control">
                            </div>
                            @error('usercode')
                                {{ $message }}
                            @enderror
                        </div>
                        <div class="row mb-3">
                            <label for="inputEmail3" class="col-sm-4 col-form-label">First Name*</label>
                            <div class="col-sm-8">
                                <input type="text" name="name" value="{{ old('name') }}" class="form-control" >
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputEmail3" class="col-sm-4 col-form-label">Last Name*</label>
                            <div class="col-sm-8">
                                <input type="text" name="last_name" value="{{ old('last_name') }}" class="form-control" >
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="row mb-3">
                            <label for="inputEmail3" class="col-sm-4 col-form-label">Nick Name*</label>
                            <div class="col-sm-8">
                                <input type="text" name="nick_name" value="{{ old('nick_name') }}"  class="form-control" >
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputEmail3" class="col-sm-4 col-form-label">Email address*</label>
                            <div class="col-sm-8">
                                <input type="email" name="email" value="{{ old('email') }}" class="form-control" >
                            </div>
                            @error('email')
                                {{ $message }}
                            @enderror
                        </div>
                        <div class="row mb-3">
                            <label for="phone" class="col-sm-4 col-form-label">Phone No*</label>
                            <div class="col-sm-8">
                                <input type="number" value="{{ old('phone') }}" name="phone" class="form-control" id="phone" >
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="upload-img-box">
                            <div class="upload-img-box-icon"> <i class="bi bi-box-arrow-up"></i>
                                <input class="form-control" name="profile_picture" type="file" id="formFile">
                            </div>
                            <h3>Upload Profile Photo*</h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="add-employee">
                <h2>Work Information</h2>
                <div class="row">
                    <div class="col-lg-5">
                        <div class="row mb-3">
                            <label for="inputEmail3" class="col-sm-4 col-form-label">Date of Joining*</label>
                            <div class="col-sm-8">
                                <input type="date" name="joined_at" value="{{ old('joined_at') }}" class="form-control">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-4 col-form-label">Department*</label>
                            <div class="col-sm-8">
                                <select class="form-select" name="department_id" aria-label="department">
                                    <option value="">Please select a department</option>
                                    @forelse ($departments as $department)
                                        <option value="{{ $department->id }}" @if (old('department_id')== $department->id) selected @endif>{{ $department->department_name }}</option>
                                    @empty

                                    @endforelse
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-4 col-form-label">Location*</label>
                            <div class="col-sm-8">
                                <select class="form-select" name="location_id" aria-label="" id="location_id">
                                    <option value="">Please select your location</option>
                                    @forelse ($locations as $location)
                                        <option value="{{ $location->id}}" @if(old('location_id')== $location->id ) selected @endif>{{ $location->location_name.','.$location->address }}</option>
                                    @empty

                                    @endforelse
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-4 col-form-label">Role*</label>
                            <div class="col-sm-8">
                                <select class="form-select" name="user_type_id" aria-label="">
                                    <option value="">Please select your role</option>
                                    @forelse ($userTypes as $designation)
                                        <option value="{{ $designation->id }}" @if(old('user_type_id')== $designation->id ) selected @endif>{{ $designation->user_type_name }}</option>
                                    @empty

                                    @endforelse
                                </select>
                            </div>
                        </div>
                       
                    </div>
                    <div class="col-lg-5">
                        {{-- <div class="row mb-3 add-emp-2row">
                            <label class="col-sm-4 col-form-label">Role*</label>
                            <div class="col-sm-8">
                                <select class="form-select" name="role" aria-label="role">
                                    <option value="">Please select your role</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>
                            </div>
                        </div> --}}
                        <div class="row mb-3">
                            <label class="col-sm-4 col-form-label">Employment Type*</label>
                            <div class="col-sm-8">
                                <select class="form-select" name="emp_type_id" aria-label="employment type">
                                    <option value="">Select Employment Type</option>
                                    @forelse ($empTypes as $usertype )
                                        <option value="{{ $usertype->id }}" @if(old('emp_type_id')== $usertype->id ) selected @endif>{{ $usertype->emp_type_name }}</option>
                                    @empty

                                    @endforelse
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-4 col-form-label">Employee Status*</label>
                            <div class="col-sm-8">
                                <select class="form-select" name="emp_status" aria-label="">
                                    <option value="">Select employee status</option>
                                    <option value="1" @if(old('emp_status')== '1' ) selected @endif>Active</option>
                                    <option value="2" @if(old('emp_status')== '2' ) selected @endif>Ex-employee</option>
                                    <option value="3" @if(old('emp_status')== '3' ) selected @endif>Transffered</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">

                            <label class="col-sm-4 col-form-label">Employee Designation*</label>

                            <div class="col-sm-8">

                                <select class="form-select" name="designation_id" aria-label="">

                                    <option value="">Select employee designation</option>

                                    @forelse ($designations as $designation)

                                        <option value="{{ $designation->id }}">{{ $designation->name }}</option>

                                    @empty



                                    @endforelse

                                    {{-- <option value="1" @if(old('emp_status')== '1' ) selected @endif>Active</option>

                                    <option value="2" @if(old('emp_status')== '2' ) selected @endif>Ex-employee</option>

                                    <option value="3" @if(old('emp_status')== '3' ) selected @endif>Transffered</option> --}}

                                </select>

                            </div>

                        </div>
                         <div class="row mb-3">
                            <label class="col-sm-4 col-form-label">Shift*</label>
                            <div class="col-sm-8">
                                <select class="form-select" name="current_shift" aria-label="" id="user_shift_id">
                                    <option value="">Please select your Shift </option>
                                   
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2"> </div>
                </div>
            </div>
            <div class="add-employee">
                <h2>Hierarchy Information*</h2>
                <div class="row">
                    <div class="col-lg-5">
                        <div class="row mb-3">
                            <label class="col-sm-4 col-form-label">Reporting Manager*</label>
                            <div class="col-sm-8">
                                <select class="form-select" name="reporting_manager_id" aria-label="">
                                    <option value="">Select Manager</option>
                                    @forelse ($managers as $manager)
                                        <option value="{{ $manager->id }}" @if(old('reporting_manager_id')== $manager->id ) selected @endif>{{ $manager->fullname }}</option>
                                        @empty
                                    @endforelse
                                </select>
                            </div>
                        </div>
                    </div>
                   {{-- <div class="col-lg-5">
                        <div class="row mb-3">
                            <label class="col-sm-4 col-form-label">HOL</label>
                            <div class="col-sm-8">
                                <select class="form-select" name="hol_id" aria-label="">
                                    <option value="">Select Hol</option>
                                     @forelse ($hols as $hol)
                                        <option value="{{ $hol->id }}" @if(old('hol_id')== $hol->id ) selected @endif>{{ $hol->fullname }}</option>
                                        @empty
                                    @endforelse
                                </select>
                            </div>
                        </div>
                    </div> --}}
                    <div class="col-lg-2"> </div>
                </div>
            </div>
            <div class="add-employee">
                <h2>Personal Details</h2>
                <div class="row">
                    <div class="col-lg-5">
                        <div class="row mb-3">
                            <label class="col-sm-4 col-form-label">Gender*</label>
                            <div class="col-sm-8">
                                <select class="form-select" name="gender" aria-label="">
                                    <option value="">Select Gender</option>
                                    <option value="male" @if(old('gender')== 'male' ) selected @endif>Male</option>
                                    <option value="female" @if(old('gender')== 'female' ) selected @endif>Female</option>
                                    <option value="other" @if(old('gender')== 'other' ) selected @endif>Transgender</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputEmail3" class="col-sm-4 col-form-label">PAN</label>
                            <div class="col-sm-8">
                                <input type="text" name="pan" value="{{ old('pan') }}" class="form-control text-uppercase">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="row mb-3">
                            <label class="col-sm-4 col-form-label">Marital Status</label>
                            <div class="col-sm-8">
                                <select class="form-select" name="marital_status" aria-label="">
                                    <option value="">Select Marital Status</option>
                                    <option value="single" @if(old('marital_status')== 'single' ) selected @endif >Single</option>
                                    <option value="married" @if(old('marital_status')== 'married' ) selected @endif >Married</option>
                                    <option value="divorced" @if(old('marital_status')== 'divorced' ) selected @endif >Divorced</option>
                                    <option value="widowed" @if(old('marital_status')== 'widowed' ) selected @endif>Widowed</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputEmail3" class="col-sm-4 col-form-label">Aadhaar</label>
                            <div class="col-sm-8">
                                <input type="number" name="aadhar_no" value="{{ old('aadhar_no') }}" class="form-control" >
                            </div>
                        </div>
                    </div>
                    {{-- <div class="col-lg-2"> </div> --}}
                </div>
            </div>
            <div class="add-employee">
                <h2>Present Address</h2>
                <div class="row">
                    <div class="col-lg-5">
                        <div class="row mb-3">
                            <label for="inputPassword" class="col-sm-4 col-form-label">Address Line 1</label>
                            <div class="col-sm-8">
                                <textarea class="form-control present_address_ad1" name="present_address[address_line_1]" value="{{ old('present_address.address_line_1') }}" style="height: 50px"></textarea>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-4 col-form-label">City</label>
                            <div class="col-sm-8">
                                <select class="form-select present_address_city" name="present_address[city]" aria-label="city">
                                    <option value="">Select City</option>
                                    @forelse ($cities as $city)
                                        <option value="{{ $city->id }}" @if (old('present_address.city')== $city->id) selected @endif> {{ $city->city }} </option>
                                    @empty

                                    @endforelse
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="row mb-3">
                            <label for="line_1" class="col-sm-4 col-form-label">Address Line 2</label>
                            <div class="col-sm-8">
                                <textarea class="form-control present_address_ad2" name="present_address[address_line_2]" value="{{ old('present_address.address_line_2') }}" style="height: 50px" name="line_1"></textarea>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputEmail3" class="col-sm-4 col-form-label">Postal Code</label>
                            <div class="col-sm-8">
                                <input type="text" value="{{ old('present_address.postal_code') }}" name="present_address[postal_code]" class="form-control present_address_postal_code" >
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2"> </div>
                </div>
            </div>
            <div class="add-employee">
                <h2>Permanent Address</h2>
                <div class="row">
                    <div class="col-12">
                        <div class="form-check mb-4">
                            <label class="form-check-label" for="spa"> Same as Present Address </label>
                            <input class="form-check-input" type="checkbox" id="spa">
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="row mb-3">
                            <label for="inputPassword" class="col-sm-4 col-form-label">Address Line 1</label>
                            <div class="col-sm-8">
                                <textarea class="form-control permanent_address_ad1" name="permanent_address[address_line_1]" value="{{ old('permanent_address.address_line_1') }}" style="height: 50px"></textarea>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-4 col-form-label">City</label>
                            <div class="col-sm-8">
                                <select class="form-select permanent_address_city" name="permanent_address[city]" aria-label="">
                                    <option value="">Please Select City</option>
                                    @forelse ($cities as $city)
                                        <option value="{{ $city->id }}" @if (old('permanent_address.city')== $city->id) selected @endif > {{ $city->city }} </option>
                                    @empty

                                    @endforelse
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="row mb-3">
                            <label for="inputPassword" class="col-sm-4 col-form-label">Address Line 2</label>
                            <div class="col-sm-8">
                                <textarea class="form-control permanent_address_ad2" name="permanent_address[address_line_2]" value="{{ old('permanent_address.address_line_2') }}" style="height: 50px"></textarea>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputEmail3" class="col-sm-4 col-form-label">Postal Code</label>
                            <div class="col-sm-8">
                                <input type="number" value="{{ old('permanent_address.postal_code') }}" name="permanent_address[postal_code]" class="form-control permanent_address_postal_code" >
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2"> </div>
                </div>
            </div>
            <div class="add-employee">
                <h2>Work Experience</h2>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <thead>
                                    <tr>
                                        <th scope="col">Previous Company</th>
                                        <th scope="col">Job Title</th>
                                        <th scope="col">From Date</th>
                                        <th scope="col">To Date</th>
                                        <th scope="col">Job Description</th>
                                        <th scope="col">Relevant</th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="add-work">
                                        <td><input type="text" name="work_exp[0][previous_company_name]" class="form-control prev_company" ></td>
                                        <td><input type="text" name="work_exp[0][job_title]" class="form-control job_title" ></td>
                                        <td><input type="date" name="work_exp[0][join_date]" class="form-control join_date"></td>
                                        <td><input type="date" name="work_exp[0][leave_date]" class="form-control leave_date"></td>
                                        <td><input type="text" name="work_exp[0][job_description]" class="form-control job_description" ></td>
                                        <td>
                                            <select class="form-select relevant_exp" name="work_exp[0][relevant_exp]" aria-label="">
                                                <option value="">Relevant Experience</option>
                                                <option value="1">One</option>
                                                <option value="2">Two</option>
                                                <option value="3">Three</option>
                                            </select>
                                        </td>
                                        <td>
                                            <div class="row">
                                                {{-- <a href="javascript:void(0)" class="delete-experience-btn">
                                                    <i class="bi bi-basket-fill blue-icon" ></i>
                                                </a> --}}
                                                <a href="javascript:void(0)" class="add-experience-btn" data-index="1">
                                                    <i class="bi bi-plus-circle green-icon"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="add-employee">
                <h2>Education Details</h2>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <thead>
                                    <tr>
                                        <th scope="col">Institute Name</th>
                                        <th scope="col">Degree/Diploma</th>
                                        <th scope="col">Specialization</th>
                                        <th scope="col">Date of Completion</th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class ="education-row">
                                        <td><input type="text" name="education[0][institute_name]" class="form-control institute_name" ></td>
                                        <td><input type="text" class="form-control degree" name="education[0][degree]" ></td>
                                        <td><input type="text" class="form-control specilazition" name="education[0][specilazition]"></td>
                                        <td><input type="date" name="education[0][pass_year]" class="form-control pass_year"></td>
                                        <td>
                                            <div class="row">
                                                {{-- <a href="javascript:void(0)" class="delete-education-btn"><i class="bi bi-basket-fill blue-icon"></i></a> --}}
                                                <a href="javascript:void(0)" class="add-education-btn"><i class="bi bi-plus-circle green-icon"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="text-left add-emply-butn-row">
            <button type="submit" class="btn btn-primary add-emply-submit-butn">Submit</button>
            <button type="reset" class="btn btn-secondary add-emply-cancel">Cancel</button>
        </div>
    </form>
@endsection
@push('scripts')
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/additional-methods.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.min.js"></script>
<script src="{{ asset('assets/js/add-employee.js') }}"></script>
<script>
    Webcam.set({
        width: 490,
        height: 350,
        image_format: 'jpeg',
        jpeg_quality: 90
    });
    Webcam.attach( '#my_camera' );
    function take_snapshot() {
        Webcam.snap( function(data_uri) {
            $(".image-tag").val(data_uri);
            document.getElementById('results').innerHTML = '<img src="'+data_uri+'"/>';
        } );
    }
</script>
<script>
         $('#location_id').change(function(){
              var url='<?php echo url('/employee/location-based-shift/') ?>/'+$(this).val();
                var html='';
              $('#user_shift_id').html(' ');
            $.ajax({
               type:'GET',
               url:url,
               data:'_token = <?php echo csrf_token() ?>',
               success:function(data) {
                   console.log(data);
                   for(let i=0;i<data.length;i++){
                       html+='<option value="'+ data[i].id +'">'+ data[i].shift_title +'</option>';
                   }
                   $('#user_shift_id').append(html);
                 // $("#msg").html(data.msg);
               }
            });
             
         }) 
      </script>
@endpush
