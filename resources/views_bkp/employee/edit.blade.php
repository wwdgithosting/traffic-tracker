@extends('layout.app')
@section('content')

<form enctype="multipart/form-data" class="basic-form" id="basic-form" method="post" action="{{ route('employee-update',$user->id) }}">
    <div class="performance-statistics">
        @csrf
        <div class="add-employee">
            <h2>Basic Information</h2>
            <div class="row">
                <div class="col-lg-5">
                    <div class="row mb-3">
                        <label for="inputEmail3" class="col-sm-4 col-form-label">First Name<span class="text-danger">*</span></label>
                        <div class="col-sm-8">
                            <input type="text" name="name" value="{{ $user->name }}" class="form-control">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputEmail3" class="col-sm-4 col-form-label">Last Name</label>
                        <div class="col-sm-8">
                            <input type="text" name="last_name" value="{{ $user->last_name }}" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="row mb-3">
                        <label for="inputEmail3" class="col-sm-4 col-form-label">Nick Name</label>
                        <div class="col-sm-8">
                            <input type="text" name="nick_name" value="{{ $user->nick_name }}" class="form-control">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-4 col-form-label">Designation<span class="text-danger">*</span></label>
                        <div class="col-sm-8">
                            <select class="form-select" name="designation_id" aria-label="">
                                <option value="">Please select your designation</option>
                                @forelse ($designations as $designation)
                                <option value="{{ $designation->id }}" @if($user->designation_id==$designation->id) selected @endif>{{ $designation->name }}</option>
                                @empty

                                @endforelse
                            </select>
                        </div>
                    </div>
                </div>

                <div class="col-lg-5">
                    <div class="row mb-3">
                        <label for="inputEmail3" class="col-sm-4 col-form-label">Reporting Manager<span class="text-danger">*</span></label>
                        <div class="col-sm-8">
                            <select class="form-select" name="reporting_manager_id" aria-label="">
                                <option value="">Select Manager</option>
                                @forelse ($managers as $manager)
                                <option value="{{ $manager->id }}" @if($user->manager && $user->manager->reporting_manager_id == $manager->id) selected @endif>{{ $manager->fullname }}</option>
                                @empty
                                @endforelse
                            </select>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-4 col-form-label">Location<span class="text-danger">*</span></label>
                        <div class="col-sm-8">
                            <select class="form-select" name="location_id" aria-label="" id="location_id">
                                <option value="">Please select your location</option>
                                @forelse ($locations as $location)
                                <option value="{{ $location->id}}" @if( $user->location_id == $location->id) selected @endif>{{ $location->location_name.','.$location->address }}</option>
                                @empty

                                @endforelse
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-4 col-form-label">Shift<span class="text-danger">*</span></label>
                        <div class="col-sm-8">
                            <select class="form-select" name="user_shift_id" aria-label="" id="user_shift_id" required>

                                <option value="">Please select your Shift </option>
                                @forelse ($shiftTypes as $result)
                                <option value="{{ $result->id}}" @if($user->current_shift == $result->id) selected @endif>{{ $result->shift_title }}</option>
                                @empty

                                @endforelse

                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-4 col-form-label">User Type<span class="text-danger">*</span></label>
                        <div class="col-sm-8">
                            <select class="form-select" name="user_type_id" aria-label="" id="user_type_id" required>

                                <option value="">Please select Usertype</option>
                                @forelse ($userTypes as $result)
                                <option value="{{ $result->id}}" @if($user->user_type_id == $result->id) selected @endif>{{ $result->user_type_name }}</option>
                                @empty

                                @endforelse

                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-4 col-form-label">Employment Type<span class="text-danger">*</span></label>
                        <div class="col-sm-8">
                            <select class="form-select" name="emp_type_id" aria-label="employment type">
                                <option value="">Select Employment Type</option>
                                @forelse ($empTypes as $usertype )
                                <option value="{{ $usertype->id }}" @if($user->emp_type_id == $result->id) selected @endif>{{ $usertype->emp_type_name }}</option>
                                @empty

                                @endforelse
                            </select>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        {{-- <div class="add-employee">
                <h2>Work Information</h2>
                <div class="row">
                    <div class="col-lg-5">
                        <div class="row mb-3">
                            <label for="inputEmail3" class="col-sm-4 col-form-label">Date of Joining*</label>
                            <div class="col-sm-8">
                                <input type="date" name="join_date" class="form-control">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-4 col-form-label">Designation*</label>
                            <div class="col-sm-8">
                                <select class="form-select" name="designation" aria-label="">
                                    <option value="">Please select your designation</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="row mb-3 add-emp-2row">
                            <label class="col-sm-4 col-form-label">Role*</label>
                            <div class="col-sm-8">
                                <select class="form-select" name="role" aria-label="role">
                                    <option value="">Please select your role</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-4 col-form-label">Employment Type*</label>
                            <div class="col-sm-8">
                                <select class="form-select" name="emp_type" aria-label="employment type">
                                    <option value="">Select Employment Type</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-4 col-form-label">Employee Status*</label>
                            <div class="col-sm-8">
                                <select class="form-select" name="emp_status" aria-label="">
                                    <option value="">Select employee status</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2"> </div>
                </div>
            </div> --}}
        {{-- <div class="add-employee">
                <h2>Hierarchy Information*</h2>
                <div class="row">
                    <div class="col-lg-5">
                        <div class="row mb-3">
                            <label class="col-sm-4 col-form-label">Reporting Manager*</label>
                            <div class="col-sm-8">
                                <select class="form-select" name="reporting_manager_id" aria-label="">
                                    <option value="">Select Manager</option>
                                    @forelse ($managers as $manager)
                                        <option value="{{ $manager->id }}">{{ $manager->fullname }}</option>
        @empty
        @endforelse
        </select>
    </div>
    </div>
    </div>
    <div class="col-lg-5">
        <div class="row mb-3">
            <label class="col-sm-4 col-form-label">HOD</label>
            <div class="col-sm-8">
                <select class="form-select" name="hod" aria-label="">
                    <option value="">Select Hod</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                </select>
            </div>
        </div>
    </div>
    <div class="col-lg-2"> </div>
    </div>
    </div> --}}
    {{-- <div class="add-employee">
                <h2>Personal Details</h2>
                <div class="row">
                    <div class="col-lg-5">
                        <div class="row mb-3">
                            <label class="col-sm-4 col-form-label">Gender*</label>
                            <div class="col-sm-8">
                                <select class="form-select" name="gender" aria-label="">
                                    <option value="">Select Gender</option>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                    <option value="transgender">Transgender</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputEmail3" class="col-sm-4 col-form-label">PAN</label>
                            <div class="col-sm-8">
                                <input type="text" name="pan" class="form-control" >
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="row mb-3">
                            <label class="col-sm-4 col-form-label">Marital Status</label>
                            <div class="col-sm-8">
                                <select class="form-select" name="marital_status" aria-label="">
                                    <option value="">Select Marital Status</option>
                                    <option value="single">Single</option>
                                    <option value="married">Married</option>
                                    <option value="divorced">Divorced</option>
                                    <option value="widowed">Widowed</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputEmail3" class="col-sm-4 col-form-label">Aadhaar</label>
                            <div class="col-sm-8">
                                <input type="number" name="aadhar" class="form-control" >
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2"> </div>
                </div>
            </div> --}}
    {{-- <div class="add-employee">
                <h2>Present Address</h2>
                <div class="row">
                    <div class="col-lg-5">
                        <div class="row mb-3">
                            <label for="inputPassword" class="col-sm-4 col-form-label">Address Line 1</label>
                            <div class="col-sm-8">
                                <textarea class="form-control present_address_ad1" name="present_address[address_line_1]" style="height: 50px"></textarea>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-4 col-form-label">City</label>
                            <div class="col-sm-8">
                                <select class="form-select" name="present_address[city]" aria-label="city">
                                    <option value="">Select City</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="row mb-3">
                            <label for="line_1" class="col-sm-4 col-form-label">Address Line 2</label>
                            <div class="col-sm-8">
                                <textarea class="form-control" name="present_address[address_line_2]" style="height: 50px" name="line_1"></textarea>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputEmail3" class="col-sm-4 col-form-label">Postal Code</label>
                            <div class="col-sm-8">
                                <input type="text" name="present_address[postal_code]" class="form-control" >
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
                                <textarea class="form-control permanent_address_ad1" name="permanent_address[address_line_1]" style="height: 50px"></textarea>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-4 col-form-label">City</label>
                            <div class="col-sm-8">
                                <select class="form-select" name="permanent_address[city]" aria-label="">
                                    <option value="">Open this select menu</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="row mb-3">
                            <label for="inputPassword" class="col-sm-4 col-form-label">Address Line 2</label>
                            <div class="col-sm-8">
                                <textarea class="form-control" name="permanent_address[address_line_2]" style="height: 50px"></textarea>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputEmail3" class="col-sm-4 col-form-label">Postal Code</label>
                            <div class="col-sm-8">
                                <input type="number" name="permanent_address[postal_code]" class="form-control" >
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
                                        <td><input type="text" class="form-control" ></td>
                                        <td><input type="text" class="form-control" ></td>
                                        <td><input type="date" class="form-control"></td>
                                        <td><input type="date" class="form-control"></td>
                                        <td><input type="text" class="form-control" ></td>
                                        <td>
                                            <select class="form-select" aria-label="">
                                                <option selected="">Open this select menu</option>
                                                <option value="1">One</option>
                                                <option value="2">Two</option>
                                                <option value="3">Three</option>
                                            </select>
                                        </td>
                                        <td>
                                            <div class="row">

                                                <a href="javascript:void(0)" class="add-experience-btn">
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
                                        <td><input type="text" class="form-control" ></td>
                                        <td><input type="text" class="form-control" ></td>
                                        <td><input type="text" class="form-control" ></td>
                                        <td><input type="date" class="form-control"></td>
                                        <td>
                                            <div class="row">

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
            </div> --}}
    </div>
    <div class="text-left add-emply-butn-row">
        <button type="submit" class="btn btn-primary add-emply-submit-butn">Submit</button>
        <button type="reset" class="btn btn-secondary add-emply-cancel">Cancel</button>
        <a href="{{url('/employee/list')}}" class="btn btn-info">Back</a>
    </div>
</form>
@endsection
@push('scripts')
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/additional-methods.min.js"></script>
<script src="{{ asset('assets/js/add-employee.js') }}"></script>
<script>
    // $(document).ready(function(){
    //     @if($user->locations) 
    //     var url='<?php /* echo url('/employee/location-based-shift',$user->locations[0]->location_id) */ ?>';
    //         var html='';
    //       $('#user_shift_id').html(' ');
    //       var curShift='{{$user->current_shift}}';
    //       var selected='';
    //     $.ajax({
    //        type:'GET',
    //        url:url,
    //        data:'_token = <?php /* echo csrf_token() */ ?>',
    //        success:function(data) {
    //            console.log(data);
    //            for(let i=0;i<data.length;i++){
    //                if(data[i].id == curShift){
    //                    selected='selected';
    //                }else{
    //                  selected='';  
    //                }
    //                html+='<option value="'+ data[i].id +'" '+ selected +' >'+ data[i].shift_title +'</option>';
    //            }
    //            $('#user_shift_id').append(html);
    //          // $("#msg").html(data.msg);
    //        }
    //     });
    // @endif         
    // })
    //          $('#location_id').change(function(){
    //               var url='<?php /* echo url('/employee/location-based-shift/') */ ?>/'+$(this).val();
    //                 var html='';
    //               $('#user_shift_id').html(' ');
    //             $.ajax({
    //                type:'GET',
    //                url:url,
    //                data:'_token = <?php /* echo csrf_token() */ ?>',
    //                success:function(data) {
    //                    console.log(data);
    //                    for(let i=0;i<data.length;i++){
    //                        html+='<option value="'+ data[i].id +'">'+ data[i].shift_title +'</option>';
    //                    }
    //                    $('#user_shift_id').append(html);
    //                  // $("#msg").html(data.msg);
    //                }
    //             });

    //          }) 
    //       
</script>
@endpush