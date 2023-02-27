@php
 $prev = App\Models\UserWisePreviledge::select('mode_id')->where('menu_id', 1)->where('user_id', auth()->user()->id)->first();
@endphp
@extends('layout.app')
@section('content')
<section class="section dashboard">
  <div class="row">
    <div class="col-lg-12 col-sm-12 col-12">
      <div class="performance-statistics row">
        <div class="col-lg-6">

        </div>
        <div class="col-lg-6 performance-statistics-butn"> <a href="{{route('employee-add')}}">
             @if((auth()->user()->user_type_id!=1))
          @if(is_object($prev) && in_array(12, explode(',', $prev['mode_id'])))
          <button type="button" class="btn btn-primary employee-butn"><i class="bi bi-plus-lg"></i> Add Employee </button>
           @endif
           @else
           <button type="button" class="btn btn-primary employee-butn"><i class="bi bi-plus-lg"></i> Add Employee </button>
          
            @endif
            
          </a>
          @if((auth()->user()->user_type_id!=1))
          @if(is_object($prev) && in_array(12, explode(',', $prev['mode_id'])))
          <button type="button" class="btn btn-primary employee-butn" data-bs-toggle="modal" data-bs-target="#basicModal"><i class="bi bi-box-arrow-in-left"></i> Import Employee</button>
           @endif
           @else
           <button type="button" class="btn btn-primary employee-butn" data-bs-toggle="modal" data-bs-target="#basicModal"><i class="bi bi-box-arrow-in-left"></i> Import Employee</button>
          
            @endif
        </div>
        <div class="col-lg-12 col-sm-12 col-12 mt-5">
          <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item " role="presentation">
              <button class="nav-link active" id="all-employee-tab" data-bs-toggle="tab" data-bs-target="#all-employee" type="button" role="tab" aria-controls="all-employee" aria-selected="true">All Employees</button>
            </li>
            <li class="nav-item" role="presentation">
              <button class="nav-link" id="permanent-employee-tab" data-bs-toggle="tab" data-bs-target="#permanent-employee" type="button" role="tab" aria-controls="permanent-employee" aria-selected="false">Permanant Employees</button>
            </li>
            <li class="nav-item" role="presentation">
              <button class="nav-link" id="contructual-employee-tab" data-bs-toggle="tab" data-bs-target="#contructual-employee" type="button" role="tab" aria-controls="contructual-employee" aria-selected="false">Contractual Employees</button>
            </li>
            <li class="nav-item" role="presentation">
              <button class="nav-link" id="third-party-employee-tab" data-bs-toggle="tab" data-bs-target="#third-party-employee" type="button" role="tab" aria-controls="third-party-employee" aria-selected="false">Third Party Employees</button>
            </li>

          </ul>
          <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="all-employee" role="tabpanel" aria-labelledby="all-employee-tab">
              <div class="row">
                <div class="col-lg-12">
                  <div class="search-bar">
                    <form class="search-form d-flex align-items-center" id="all_search_frm" method="POST" action="#" autocomplete="off">
                      <div class="row">
                        <div class="col-md-4">
                          <div class="mb-3">
                            <input type="name" class="form-control" id="all_f_name" placeholder="Enter first name">
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="mb-3">
                            <input type="name" class="form-control" id="all_l_name" placeholder="Enter last name">
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="mb-3">
                            <input type="text" class="form-control" id="all_usercode" placeholder="Employee Id">
                          </div>
                        </div>
                        
                        <div class="col-md-6">
                          <div class="mb-3">
                            <select name="all_user_location" id="all_user_location" class="form-control">
                              <option value="">--- Select location ---</option>
                              @forelse ($locations as $location)
                              <option value="{{ $location->id }}">{{ $location->location_name }}</option>
                              @empty
                              <option value="">No location found</option>
                              @endforelse
                            </select>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="mb-3">
                            <div class="row">
                              <div class="col-md-6">
                                <input type="button" class="btn btn-info" id="all_serach_btn" value="Search">
                              </div>
                              <div class="col-md-6">
                                <input type="button" class="btn btn-danger" id="all_reset_btn" value="Reset">
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
              <div class="table-responsive">
                <table id="allEmployeeTable" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th scope="col">Employee ID</th>
                      <th scope="col">Image</th>
                      <th scope="col">Name</th>
                      <th scope="col"></th>
                      <th scope="col">Role</th>
                      <th scope="col">Department</th>
                      <th scope="col">Location</th>
                      <th scope="col">Reporting Manager</th>
                      <th scope="col">Employment Type</th>
                      <th scope="col">Status</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  </tbody>
                </table>
              </div>
            </div>
            <div class="tab-pane fade" id="permanent-employee" role="tabpanel" aria-labelledby="permanent-employee-tab">
              <div class="row">
                <div class="col-lg-12">
                  <div class="search-bar">
                    <form class="search-form d-flex align-items-center" id="perma_search_frm" method="POST" action="#" autocomplete="off">
                      <div class="row">
                        <div class="col-md-4">
                          <div class="mb-3">
                            <input type="name" class="form-control" id="perma_f_name" placeholder="Enter first name">
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="mb-3">
                            <input type="name" class="form-control" id="perma_l_name" placeholder="Enter last name">
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="mb-3">
                            <input type="text" class="form-control" id="perma_usercode" placeholder="Employee Id">
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="mb-3">
                            <select name="perma_user_location" id="perma_user_location" class="form-control">
                              <option value="">--- Select location ---</option>
                              @forelse ($locations as $location)
                              <option value="{{ $location->id }}">{{ $location->location_name }}</option>
                              @empty
                              <option value="">No location found</option>
                              @endforelse
                            </select>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="mb-3">
                            <div class="row">
                              <div class="col-md-6">
                                <input type="button" class="btn btn-info" id="perma_serach_btn" value="Search">
                              </div>
                              <div class="col-md-6">
                                <input type="button" class="btn btn-danger" id="perma_reset_btn" value="Reset">
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
              <div class="table-responsive">
                <table id="permanentEmployeeTable" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th scope="col">Employee ID</th>
                      <th scope="col">Image</th>
                      <th scope="col">Name</th>
                      <th scope="col"></th>
                      <th scope="col">Role</th>
                      <th scope="col">Department</th>
                      <th scope="col">Location</th>
                      <th scope="col">Reporting Manager</th>
                      <th scope="col">Employment Type</th>
                      <th scope="col">Status</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  </tbody>
                </table>
              </div>
            </div>
            <div class="tab-pane fade" id="contructual-employee" role="tabpanel" aria-labelledby="contructual-employee-tab">
              <div class="row">
                <div class="col-lg-12">
                  <div class="search-bar">
                    <form class="search-form d-flex align-items-center" id="contra_search_frm" method="POST" action="#" autocomplete="off">
                      <div class="row">
                        <div class="col-md-4">
                          <div class="mb-3">
                            <input type="name" class="form-control" id="contra_f_name" placeholder="Enter first name">
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="mb-3">
                            <input type="name" class="form-control" id="contra_l_name" placeholder="Enter last name">
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="mb-3">
                            <input type="text" class="form-control" id="contra_usercode" placeholder="Employee Id">
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="mb-3">
                            <select name="contra_user_location" id="contra_user_location" class="form-control">
                              <option value="">--- Select location ---</option>
                              @forelse ($locations as $location)
                              <option value="{{ $location->id }}">{{ $location->location_name }}</option>
                              @empty
                              <option value="">No location found</option>
                              @endforelse
                            </select>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="mb-3">
                            <div class="row">
                              <div class="col-md-6">
                                <input type="button" class="btn btn-info" id="contra_serach_btn" value="Search">
                              </div>
                              <div class="col-md-6">
                                <input type="button" class="btn btn-danger" id="contra_reset_btn" value="Reset">
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
              <div class="table-responsive">
                <table id="contructualEmployeeTable" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th scope="col">Employee ID</th>
                      <th scope="col">Image</th>
                      <th scope="col">Name</th>
                      <th scope="col"></th>
                      <th scope="col">Role</th>
                      <th scope="col">Department</th>
                      <th scope="col">Location</th>
                      <th scope="col">Reporting Manager</th>
                      <th scope="col">Employment Type</th>
                      <th scope="col">Status</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  </tbody>
                </table>
              </div>
            </div>
            <div class="tab-pane fade" id="third-party-employee" role="tabpanel" aria-labelledby="third-party-employee-tab">
              <div class="row">
                <div class="col-lg-12">
                  <div class="search-bar">
                    <form class="search-form d-flex align-items-center" id="tp_search_frm" method="POST" action="#" autocomplete="off">
                      <div class="row">
                        <div class="col-md-4">
                          <div class="mb-3">
                            <input type="name" class="form-control" id="tp_f_name" placeholder="Enter first name">
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="mb-3">
                            <input type="name" class="form-control" id="tp_l_name" placeholder="Enter last name">
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="mb-3">
                            <input type="text" class="form-control" id="tp_usercode" placeholder="Employee Id">
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="mb-3">
                            <select name="tp_user_location" id="tp_user_location" class="form-control">
                              <option value="">--- Select location ---</option>
                              @forelse ($locations as $location)
                              <option value="{{ $location->id }}">{{ $location->location_name }}</option>
                              @empty
                              <option value="">No location found</option>
                              @endforelse
                            </select>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="mb-3">
                            <div class="row">
                              <div class="col-md-6">
                                <input type="button" class="btn btn-info" id="tp_serach_btn" value="Search">
                              </div>
                              <div class="col-md-6">
                                <input type="button" class="btn btn-danger" id="tp_reset_btn" value="Reset">
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
              <div class="table-responsive">
                <table id="thirdPartyEmployeeTable" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th scope="col">Employee ID</th>
                      <th scope="col">Image</th>
                      <th scope="col">Name</th>
                      <th scope="col"></th>
                      <th scope="col">Role</th>
                      <th scope="col">Department</th>
                      <th scope="col">Location</th>
                      <th scope="col">Reporting Manager</th>
                      <th scope="col">Employment Type</th>
                      <th scope="col">Status</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>
  <div class="modal right fade" id="basicModal" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form method="post" action="{{route('employee-import')}}" enctype="multipart/form-data">
          @csrf
          <div class="modal-body right-model-inner">
            <h3>Import Users</h3>
            <div class="right-model-inner-row">
              <h5>Import Employee with your own file or <a href="https://hcsassist.com/public/HLLSampleEmployee.xlsx"><strong>download a sample</strong></a></a> to check uploading format</h5>
              <div class="upload-img-box">

                <div class="upload-img-box-icon"> <i class="bi bi-box-arrow-up"></i>
                  <input class="form-control" accept=".xlsx" type="file" id="formFile" name="excel_file">
                </div>
                <h4>Drop or upload your file here</h4>
                <p>(.csv, .xlsx formats supported)</p>
              </div>
            </div>

            <div class="right-model-inner-row">
              <h5>Remember</h5>
              <ul>
                <li><span><i class="bi bi-dot"></i></span>For existing users, system will not update as import is for new employee only.</li>
                <li><span><i class="bi bi-dot"></i></span>Make sure email address and employee ID of users is not duplicated in your file. </li>
                <li><span><i class="bi bi-dot"></i></span>If the  employee ID  matches, duplicates will be automatically skipped.</li>
               
              </ul>
            </div>
          </div>
          <div class="modal-footer">
            <div class="text-left add-emply-butn-row">
              <button type="submit" class="btn btn-primary add-emply-submit-butn">Submit</button>
              <button type="reset" class="btn btn-secondary add-emply-cancel" data-bs-dismiss="modal">Cancel</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>

  <div class="modal right fade" id="employeeTransferModal" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body right-model-inner">
          <h3>Transfer Employee</h3>
          <div class="row model-profile-row">
            <div class="col-lg-2 model-profile"> <img id="t_emp_img" src=""> </div>
            <div class="col-lg-8 model-profile-text">
              <h3 id="t_emp_name"></h3>
              <p id="t_emp_id"></p>
              <h5 id="t_emp_designation"></h5>
            </div>
          </div>
          <div class="edit-user-ful-row">
            <div class="row">
              <div class="col-lg-6 col-12">
                <p>Phone No.</p>
                <h4 id="t_phone"></h4>
              </div>
              <div class="col-lg-6 col-12">
                <p>Email</p>
                <h4 id="t_email"></h4>
              </div>
            </div>
          </div>
          <form method="post" action="{{route('employee-transfer')}}">
            @csrf
            <input type="hidden" name="empId" id="t_user_id">
            <input type="hidden" name="companyId" id="t_company_id">
            <div class="right-model-inner-row">
              <h5>Present Location</h5>
              <input type="text" class="form-control" name="present_location" id="t_present_location" value="" readonly="">
            </div>
            <div class="right-model-inner-row">
              <h5>New Location</h5>
              <select class="form-control" name="location_id" id="location_id">
                <option value="">Choose Location</option>
                @foreach($locations as $result1)
                <option value="{{$result1->id}}">{{$result1->location_name}}</option>
                @endforeach
              </select>
            </div>
        </div>
        <div class="modal-footer">
          <div class="text-left add-emply-butn-row">
            <button type="submit" class="btn btn-primary add-emply-submit-butn">Submit</button>
            <button type="reset" class="btn btn-secondary add-emply-cancel">Cancel</button>
          </div>
        </div>
        </form>
      </div>
    </div>
  </div>



  <div class="modal right fade" id="employeeExit" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body right-model-inner">
          <h3>Employee Exit</h3>
          <div class="row model-profile-row">
            <div class="col-lg-2 model-profile"> <img id="e_emp_img" src=""> </div>
            <div class="col-lg-8 model-profile-text">
              <h3 id="e_emp_name"></h3>
              <p id="e_emp_id"></p>
              <h5 id="e_emp_designation"></h5>
            </div>
          </div>
          <div class="edit-user-ful-row">
            <div class="row">
              <div class="col-lg-6 col-12">
                <p>Phone No.</p>
                <h4 id="e_phone"></h4>
              </div>
              <div class="col-lg-6 col-12">
                <p>Email</p>
                <h4 id="e_email"></h4>
              </div>
            </div>
          </div>
          <form method="post" action="{{route('employee-exit')}}">
            @csrf
            <input type="hidden" name="empId" id="e_user_id">
            <input type="hidden" name="companyId" id="e_company_id">
            <div class="right-model-inner-row">
              <h5>Select Type :</h5>

              <select class="form-control" name="termination_type_id" id="termination_type_id">
                <option value="">Choose Termination Type</option>
                @foreach($teminationTypes as $result1)
                <option value="{{$result1->id}}">{{$result1->termination_type_name}}</option>
                @endforeach
              </select>

            </div>
            <div class="right-model-inner-row">
              <h5>Note :</h5>


              <textarea class="form-control" name="note" style="height: 100px"></textarea>

            </div>
        </div>
        <div class="modal-footer">
          <div class="text-left add-emply-butn-row">
            <button type="submit" class="btn btn-primary add-emply-submit-butn">Submit</button>
            <button type="reset" class="btn btn-secondary add-emply-cancel">Cancel</button>
          </div>
        </div>
        </form>
      </div>
    </div>
  </div>

  <div class="modal right fade" id="employeePriveledge" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body right-model-inner">
          <h3>User Permission</h3>

          <form method="post" action="{{route('employee-prividledgs')}}">
            @csrf
            <input type="hidden" name="empId" id="ep_user_id">

            <div class="right-model-inner-row">
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                <label class="form-check-label" for="inlineCheckbox1">Select All</label>
              </div>
              <div class="prividledgs"></div>
            </div>
        </div>
        <div class="modal-footer">
          <div class="text-left add-emply-butn-row">
            <button type="submit" class="btn btn-primary add-emply-submit-butn">Submit</button>
            <button type="reset" class="btn btn-secondary add-emply-cancel">Cancel</button>
          </div>
        </div>
        </form>
      </div>
    </div>
  </div>




</section>

@push('scripts')
<script>
  $(document).ready(function() {
    $(document).on('click', '#inlineCheckbox1', function() {
      if ($(this).is(':checked')) {
        $('.menu_item').attr('checked', true);
      } else {
        $('.menu_item').attr('checked', false);
      }
    })
    $(document).on('click', '.btn-permission', function() {
      var html = '';
      $('.prividledgs').html('');
      //  alert($(this).data('emp-id'))
      $('#ep_user_id').val($(this).data('emp-id'));
      $.ajax({
        url: baseUrl + 'menu-add-previledges/',
        type: 'GET',
        data: {
          _token

        },
        dataType: "JSON",
        success: function(data) {
          console.log(data)
          let submenu = '';
          for (let i = 0; i < data.length; i++) {
            let submenu = data[i].operation;
            html += '<div class="row" style="border-bottom:1px solid #000"><div class="col-12"><div class="form-check form-check-inline"><input type="checkbox" class="menu_item form-check-input" name="mainmenu[]" value="' + data[i].id + '"><label class="form-check-label" for="inlineCheckbox1">' + data[i].menu_title + '<lable></div></div>';
            if (submenu.length > 0) {
              for (let s = 0; s < submenu.length; s++) {
                html += '<div class="col-3"><div class="form-check form-check-inline"><input type="checkbox" class="menu_item form-check-input submenu_item" name="submenu[' + data[i].id + '][]" value="' + submenu[s].id + '"><label class="form-check-label" for="inlineCheckbox1">' + submenu[s].mode_title + '<lable></div></div>';
              }
            }
            html += '</div>';
          }

          console.log(html)
          $('.prividledgs').append(html);

          $('#employeePriveledge').modal('show')


        }
      })

    })
    loadAllEmployee()
    $(document).on('click', '.block-employee', function() {
      //alert($(this).data('details'))
      Swal.fire({
        title: 'Are you sure?',
        text: "Do You Want to Block This Employee!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, Block it!'
      }).then((result) => {
        if (result.isConfirmed) {
          window.location.href = $(this).data('url');
        }
      })
    })
    $(document).on('click', '.delete-employee', function() {
      //alert($(this).data('details'))
      Swal.fire({
        title: 'Are you sure?',
        text: "Do You Want to Delete This Employee!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, Delete it!'
      }).then((result) => {
        if (result.isConfirmed) {
          window.location.href = $(this).data('url');
        }
      })
    })
    $(document).on('click', '.approve-employee', function() {
      //alert($(this).data('details'))
      Swal.fire({
        title: 'Are you sure?',
        text: "Do You Want to Approve This Employee!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, Approve it!'
      }).then((result) => {
        if (result.isConfirmed) {
          window.location.href = $(this).data('url');
        }
      })
    })
    $(document).on('click', '.edit-employee', function() {
      //alert($(this).data('details'))
      Swal.fire({
        title: 'Are you sure?',
        text: "Do You Want to Edit This Employee!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, Edit it!'
      }).then((result) => {
        if (result.isConfirmed) {
          window.location.href = $(this).data('url');
        }
      })
    })
  })
  $(document).on('click', '#permanent-employee-tab', function() {
    loadPermananentEmployee()
  })
  $(document).on('click', '#contructual-employee-tab', function() {
    loadContructualEmployee()
  })
  $(document).on('click', '#third-party-employee-tab', function() {
    loadThirdPartyEmployee()

  })
  $(document).on('click', '.exit_btn', function(argument) {
    Swal.fire({
      title: 'Are you sure?',
      text: "Do You Want to Exit This Employee?",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, Proceed!'
    }).then((result) => {
      if (result.isConfirmed) {
        let empId = $(this).attr('data-emp-id')
        $.ajax({
          url: baseUrl + 'employee/get-details',
          type: 'POST',
          data: {
            _token,
            empId
          },
          dataType: "JSON",
          success: function(data) {
            if (data.status) {
              $('#e_emp_id').text('#' + data.data.usercode)
              $('#e_email').text(data.data.email)
              $('#e_phone').text(data.data.phone)
              $('#e_present_location').val(data.data.location_name)
              if (data.data.profile_image != '') {
                $('#e_emp_img').attr('src', baseUrl + 'uploads/photos/' + data.data.profile_image)
              } else {
                $('#e_emp_img').attr('src', baseUrl + 'assets/img/no-img-available.png')
              }
              $('#e_emp_designation').text(data.data.user_type_name + ' at ' + data.data.department_name)
              $('#e_user_id').val(data.data.id)
              $('#e_company_id').val(data.data.company_id)
              $('#e_emp_name').text(data.data.username)

              $('#employeeExit').modal('show')

            }

          }
        })
      } else {
        return false;
      }
    })
  })
  //  $(document).on('click','.exit_btn',function(argument) {
  //     let empId = $(this).attr('data-emp-id')
  //     $.ajax({
  //             url: baseUrl+'employee/get-details',
  //             type:'POST',
  //             data:{_token,empId},
  //             dataType:"JSON",
  //             success: function(data){
  //                 if(data.status){
  //                     $('#e_emp_id').text('#'+data.data.usercode)
  //                     $('#e_email').text(data.data.email)
  //                     $('#e_phone').text(data.data.phone)
  //                     $('#e_present_location').val(data.data.location_name)
  //                     if(data.data.profile_image!=''){
  //                       $('#e_emp_img').attr('src',baseUrl+'uploads/photos/'+data.data.profile_image)
  //                     }else{
  //                       $('#e_emp_img').attr('src',baseUrl+'assets/img/no-img-available.png')
  //                     }
  //                     $('#e_emp_designation').text(data.data.user_type_name+' at '+data.data.department_name)
  //                     $('#e_user_id').val(data.data.id)
  //                     $('#e_company_id').val(data.data.company_id)
  //                     $('#e_emp_name').text(data.data.username)

  //                   $('#employeeExit').modal('show')

  //                 }

  //             }
  //           })
  //  })
  $(document).on('click', '.transfer_btn', function(argument) {
    Swal.fire({
      title: 'Are you sure?',
      text: "Do You Want to Transfer This Employee?",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, Proceed!'
    }).then((result) => {
      if (result.isConfirmed) {
        let empId = $(this).attr('data-emp-id')
        $.ajax({
          url: baseUrl + 'employee/get-details',
          type: 'POST',
          data: {
            _token,
            empId
          },
          dataType: "JSON",
          success: function(data) {
            if (data.status) {
              $('#t_emp_id').text('#' + data.data.usercode)
              $('#t_email').text(data.data.email)
              $('#t_phone').text(data.data.phone)
              $('#t_present_location').val(data.data.location_name)
              if (data.data.profile_image != '') {
                $('#t_emp_img').attr('src', baseUrl + 'uploads/photos/' + data.data.profile_image)
              } else {
                $('#t_emp_img').attr('src', baseUrl + 'assets/img/no-img-available.png')
              }
              $('#t_emp_designation').text(data.data.user_type_name + ' at ' + data.data.department_name)
              $('#t_user_id').val(data.data.id)
              $('#t_company_id').val(data.data.company_id)
              $('#t_emp_name').text(data.data.username)

              $('#employeeTransferModal').modal('show')

            }

          }
        })
      } else {
        return false;
      }
    })
  })
  //  $(document).on('click','.transfer_btn',function(argument) {
  //     let empId = $(this).attr('data-emp-id')
  //     $.ajax({
  //             url: baseUrl+'employee/get-details',
  //             type:'POST',
  //             data:{_token,empId},
  //             dataType:"JSON",
  //             success: function(data){
  //                 if(data.status){
  //                     $('#t_emp_id').text('#'+data.data.usercode)
  //                     $('#t_email').text(data.data.email)
  //                     $('#t_phone').text(data.data.phone)
  //                     $('#t_present_location').val(data.data.location_name)
  //                     if(data.data.profile_image!=''){
  //                       $('#t_emp_img').attr('src',baseUrl+'uploads/photos/'+data.data.profile_image)
  //                     }else{
  //                       $('#t_emp_img').attr('src',baseUrl+'assets/img/no-img-available.png')
  //                     }
  //                     $('#t_emp_designation').text(data.data.user_type_name+' at '+data.data.department_name)
  //                     $('#t_user_id').val(data.data.id)
  //                     $('#t_company_id').val(data.data.company_id)
  //                     $('#t_emp_name').text(data.data.username)

  //                   $('#employeeTransferModal').modal('show')

  //                 }

  //             }
  //           })

  //  })
  $(document).on('click', '#all_serach_btn', function() {
    loadAllEmployee()
  })
  $(document).on('click', '#all_reset_btn', function() {
    $('#all_search_frm')[0].reset()
    loadAllEmployee()
  })

  const loadAllEmployee = () => {
    let fName = lName = emp_id = location_id=""
    $('#allEmployeeTable').DataTable().destroy()
    var dataTable = $('#allEmployeeTable').DataTable({
      dom: 'Bfrtip',
      processing: true,
      serverSide: true,
      searching: false,
      ajax: {
        url: baseUrl + 'employee/get-all-employee',
        type: 'POST',
        data: function(data) {
          if ($('#all_f_name').val() != "") {
            fName = $('#all_f_name').val();
          }
          if ($('#all_l_name').val() != "") {
            lName = $('#all_l_name').val();
          }
          if ($('#all_usercode').val() != "") {
            emp_id = $('#all_usercode').val();
          }
          if ($('#all_user_location').val() != "") {
            location_id = $('#all_user_location').val();
          }
          data._token = _token
          data.name = fName
          data.last_name = lName
          data.emp_id = emp_id
          data.location_id = location_id

        }
      },
      columns: [{
          data: 'usercode'
        },
        {
          data: 'image'
        },
        {
          data: 'name'
        },
        {
          data: 'call'
        },
        {
          data: 'user_type_name'
        },
        {
          data: 'department_name'
        },
        {
          data: 'location_name'
        },
        {
          data: 'reporting_manager_name'
        },
        {
          data: 'emp_type_name'
        },
        {
          data: 'status'
        },
        {
          data: 'action'
        },
      ],
      columnDefs: [{
        orderable: false,
        targets: [1, 3, 6, 8, 9]
      }],

    })
  }
  $(document).on('click', '#perma_serach_btn', function() {
    loadPermananentEmployee()
  })
  $(document).on('click', '#perma_reset_btn', function() {
    $('#perma_search_frm')[0].reset()
    loadPermananentEmployee()
  })
  const loadPermananentEmployee = () => {
    let fName = lName = emp_id = location_id=""
    $('#permanentEmployeeTable').DataTable().destroy()
    var dataTable = $('#permanentEmployeeTable').DataTable({
      dom: 'Bfrtip',
      processing: true,
      serverSide: true,
      searching: false,
      ajax: {
        url: baseUrl + 'employee/get-permanent-employee',
        type: 'POST',
        data: function(data) {
          if ($('#perma_f_name').val() != "") {
            fName = $('#perma_f_name').val();
          }
          if ($('#perma_l_name').val() != "") {
            lName = $('#perma_l_name').val();
          }
          if ($('#perma_usercode').val() != "") {
            emp_id = $('#perma_usercode').val();
          }
          if ($('#perma_user_location').val() != "") {
            location_id = $('#perma_user_location').val();
          }
          data._token = _token
          data.name = fName
          data.last_name = lName
          data.emp_id = emp_id
          data.location_id = location_id
        }
      },
      columns: [{
          data: 'usercode'
        },
        {
          data: 'image'
        },
        {
          data: 'name'
        },
        {
          data: 'call'
        },
        {
          data: 'user_type_name'
        },
        {
          data: 'department_name'
        },
        {
          data: 'location_name'
        },
        {
          data: 'reporting_manager_name'
        },
        {
          data: 'emp_type_name'
        },
        {
          data: 'status'
        },
        {
          data: 'action'
        },
      ],
      columnDefs: [{
        orderable: false,
        targets: [1, 3, 6, 8, 9]
      }],

    })
  }
  $(document).on('click', '#contra_serach_btn', function() {
    loadContructualEmployee()
  })
  $(document).on('click', '#contra_reset_btn', function() {
    $('#contra_search_frm')[0].reset()
    loadContructualEmployee()
  })
  const loadContructualEmployee = () => {
    let fName = lName = emp_id = location_id=""
    $('#contructualEmployeeTable').DataTable().destroy()
    var dataTable = $('#contructualEmployeeTable').DataTable({
      dom: 'Bfrtip',
      processing: true,
      serverSide: true,
      searching: false,
      ajax: {
        url: baseUrl + 'employee/get-contructual-employee',
        type: 'POST',
        data: function(data) {
          if ($('#contra_f_name').val() != "") {
            fName = $('#contra_f_name').val();
          }
          if ($('#contra_l_name').val() != "") {
            lName = $('#contra_l_name').val();
          }
          if ($('#contra_usercode').val() != "") {
            emp_id = $('#contra_usercode').val();
          }
          if ($('#contra_user_location').val() != "") {
            location_id = $('#contra_user_location').val();
          }
          data._token = _token
          data.name = fName
          data.last_name = lName
          data.emp_id = emp_id
          data.location_id = location_id

        }
      },
      columns: [{
          data: 'usercode'
        },
        {
          data: 'image'
        },
        {
          data: 'name'
        },
        {
          data: 'call'
        },
        {
          data: 'user_type_name'
        },
        {
          data: 'department_name'
        },
        {
          data: 'location_name'
        },
        {
          data: 'reporting_manager_name'
        },
        {
          data: 'emp_type_name'
        },
        {
          data: 'status'
        },
        {
          data: 'action'
        },
      ],
      columnDefs: [{
        orderable: false,
        targets: [1, 3, 6, 8, 9]
      }],

    })
  }
  $(document).on('click', '#tp_serach_btn', function() {
    loadThirdPartyEmployee()

  })
  $(document).on('click', '#tp_reset_btn', function() {
    $('#tp_search_frm')[0].reset()
    loadThirdPartyEmployee()
  })
  const loadThirdPartyEmployee = () => {
    let fName = lName = emp_id = location_id=""
    $('#thirdPartyEmployeeTable').DataTable().destroy()
    var dataTable = $('#thirdPartyEmployeeTable').DataTable({
      dom: 'Bfrtip',
      processing: true,
      serverSide: true,
      searching: false,
      ajax: {
        url: baseUrl + 'employee/get-third-party-employee',
        type: 'POST',
        data: function(data) {
          if ($('#tp_f_name').val() != "") {
            fName = $('#tp_f_name').val();
          }
          if ($('#tp_l_name').val() != "") {
            lName = $('#tp_l_name').val();
          }
          if ($('#tp_usercode').val() != "") {
            emp_id = $('#tp_usercode').val();
          }
          if ($('#tp_user_location').val() != "") {
            location_id = $('#tp_user_location').val();
          }
          data._token = _token
          data.name = fName
          data.last_name = lName
          data.emp_id = emp_id
          data.location_id = location_id

        }
      },
      columns: [{
          data: 'usercode'
        },
        {
          data: 'image'
        },
        {
          data: 'name'
        },
        {
          data: 'call'
        },
        {
          data: 'user_type_name'
        },
        {
          data: 'department_name'
        },
        {
          data: 'location_name'
        },
        {
          data: 'reporting_manager_name'
        },
        {
          data: 'emp_type_name'
        },
        {
          data: 'status'
        },
        {
          data: 'action'
        },
      ],
      columnDefs: [{
        orderable: false,
        targets: [1, 3, 6, 8, 9]
      }],

    })
  }
</script>
@endpush
@endsection