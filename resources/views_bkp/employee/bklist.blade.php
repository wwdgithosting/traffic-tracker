@extends('layout.app')
@section('content')
<section class="section dashboard">
    <div class="row">
      <div class="col-lg-12 col-sm-12 col-12">
        <div class="performance-statistics row">
          <div class="col-lg-6">
            <div class="search-bar">
              <form class="search-form d-flex align-items-center" method="POST" action="#">
                <input type="text" name="query" placeholder="Search" title="Enter search keyword">
                <button type="submit" title="Search"><i class="bi bi-search"></i></button>
              </form>
            </div>
          </div>
          <div class="col-lg-6 performance-statistics-butn"> <a href="{{route('employee-add')}}">
            <button type="button" class="btn btn-primary employee-butn"><i class="bi bi-plus-lg"></i> Add Employee </button>
            </a>
            <button type="button" class="btn btn-primary employee-butn" data-bs-toggle="modal" data-bs-target="#basicModal" ><i class="bi bi-box-arrow-in-left"></i> Import Users</button>
            
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
               <div class="table-responsive">
                  <table id="allEmployeeTable" class="table table-bordered table-striped">
                     <thead>
                        <tr>
                           <th scope="col">Employee ID</th>
                           <th scope="col">Image</th>
                           <th scope="col">Name</th>
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
               <div class="table-responsive">
                  <table id="permanentEmployeeTable" class="table table-bordered table-striped">
                     <thead>
                        <tr>
                           <th scope="col">Employee ID</th>
                           <th scope="col">Image</th>
                           <th scope="col">Name</th>
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
               <div class="table-responsive">
                  <table id="contructualEmployeeTable" class="table table-bordered table-striped">
                     <thead>
                        <tr>
                           <th scope="col">Employee ID</th>
                           <th scope="col">Image</th>
                           <th scope="col">Name</th>
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
               <div class="table-responsive">
                  <table id="thirdPartyEmployeeTable" class="table table-bordered table-striped">
                     <thead>
                        <tr>
                           <th scope="col">Employee ID</th>
                           <th scope="col">Image</th>
                           <th scope="col">Name</th>
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
              <h5>Import users with your own file</h5>
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
                <li><span><i class="bi bi-dot"></i></span>Lorem ipsum dolor sit amet, consectetur adipiscing Sed do eiusmod</li>
                <li><span><i class="bi bi-dot"></i></span>tempor incididunt ut labore Dolore magna aliqua. </li>
                <li><span><i class="bi bi-dot"></i></span>Ut enim ad minim veniam Quis nostrud exercitation</li>
                <li><span><i class="bi bi-dot"></i></span>ullamco laboris nisi ut aliquip Commodo consequat.</li>
                <li><span><i class="bi bi-dot"></i></span>Duis aute irure dolor in repreh.</li>
              </ul>
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
    
    
    
    
    
    <div class="modal right fade" id="basicModal2" tabindex="-1">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body right-model-inner">
            <h3>Edit User</h3>
            <div class="row model-profile-row">
              <div class="col-lg-2 model-profile"> <img src="assets/img/messages-1.jpg"> </div>
              <div class="col-lg-8 model-profile-text">
                <h3>Farhan Fauzan</h3>
                <p>#12345</p>
                <h5>Operator at Production</h5>
              </div>
            </div>
            <div class="edit-user-ful-row">
              <div class="row">
                <div class="col-lg-6 col-12">
                  <p>Phone No.</p>
                  <h4>9234567890</h4>
                </div>
                <div class="col-lg-6 col-12">
                  <p>Email</p>
                  <h4>email@gmail.com</h4>
                </div>
              </div>
            </div>
            <div class="right-model-inner-row">
              <h5>model-profile-row</h5>
              <form>
                <select class="form-select" aria-label="Default select example">
                  <option selected="">Abhishek Mohanty</option>
                  <option value="1">One</option>
                  <option value="2">Two</option>
                  <option value="3">Three</option>
                </select>
              </form>
            </div>
            <div class="right-model-inner-row">
              <h5>Select Role</h5>
              <form>
                <select class="form-select" aria-label="Default select example">
                  <option selected="">Operator at Production</option>
                  <option value="1">One</option>
                  <option value="2">Two</option>
                  <option value="3">Three</option>
                </select>
              </form>
            </div>
          </div>
          <div class="modal-footer">
            <div class="text-left add-emply-butn-row">
              <button type="submit" class="btn btn-primary add-emply-submit-butn">Submit</button>
              <button type="reset" class="btn btn-secondary add-emply-cancel">Cancel</button>
            </div>
          </div>
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
                  <p >Phone No.</p>
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
    
    
    
    
  </section>

@push('scripts')
<script>
   $(document).ready(function() {
      loadAllEmployee()
   })
   $(document).on('click','#permanent-employee-tab',function() {
      loadPermananentEmployee()
   })
   $(document).on('click','#contructual-employee-tab',function() {
      loadContructualEmployee()
   })
   $(document).on('click','#third-party-employee-tab',function() {
      loadThirdPartyEmployee()
   })
   $(document).on('click','.exit_btn',function(argument) {
      let empId = $(this).attr('data-emp-id')
      $.ajax({
              url: baseUrl+'employee/get-details',
              type:'POST',
              data:{_token,empId},
              dataType:"JSON",
              success: function(data){
                  if(data.status){
                      $('#e_emp_id').text('#'+data.data.usercode)
                      $('#e_email').text(data.data.email)
                      $('#e_phone').text(data.data.phone)
                      $('#e_present_location').val(data.data.location_name)
                      if(data.data.profile_image!=''){
                        $('#e_emp_img').attr('src',baseUrl+'uploads/photos/'+data.data.profile_image)
                      }else{
                        $('#e_emp_img').attr('src',baseUrl+'assets/img/no-img-available.png')
                      }
                      $('#e_emp_designation').text(data.data.user_type_name+' at '+data.data.department_name)
                      $('#e_user_id').val(data.data.id)
                      $('#e_company_id').val(data.data.company_id)
                      $('#e_emp_name').text(data.data.username)

                    $('#employeeExit').modal('show')

                  }
               
              }
            })
   })
   $(document).on('click','.transfer_btn',function(argument) {
      let empId = $(this).attr('data-emp-id')
      $.ajax({
              url: baseUrl+'employee/get-details',
              type:'POST',
              data:{_token,empId},
              dataType:"JSON",
              success: function(data){
                  if(data.status){
                      $('#t_emp_id').text('#'+data.data.usercode)
                      $('#t_email').text(data.data.email)
                      $('#t_phone').text(data.data.phone)
                      $('#t_present_location').val(data.data.location_name)
                      if(data.data.profile_image!=''){
                        $('#t_emp_img').attr('src',baseUrl+'uploads/photos/'+data.data.profile_image)
                      }else{
                        $('#t_emp_img').attr('src',baseUrl+'assets/img/no-img-available.png')
                      }
                      $('#t_emp_designation').text(data.data.user_type_name+' at '+data.data.department_name)
                      $('#t_user_id').val(data.data.id)
                      $('#t_company_id').val(data.data.company_id)
                      $('#t_emp_name').text(data.data.username)

                    $('#employeeTransferModal').modal('show')

                  }
               
              }
            })

   })
   const loadAllEmployee = ()=>{
      var dataTable = $('#allEmployeeTable').DataTable({
         dom: 'Bfrtip',
            processing: true,
            serverSide: true,
            searching:  false,
            ajax: {
              url: baseUrl+'employee/get-all-employee',
              type:'POST',
              data: function(data){
               data._token       = _token
               
              }
          },
            columns: [
                 { data: 'usercode' },
                 { data: 'image' },
                 { data: 'name' },
                 { data: 'user_type_name' },
                 { data: 'department_name'},
                 { data: 'location_name' },
                 { data: 'reporting_manager_name' },
                 { data: 'emp_type_name' },
                 { data: 'status' },
                 { data: 'action' },
             ],
            columnDefs: [
            { orderable: false, targets: [1,6,8,9] }
         ],
         
        })
   }
   const loadPermananentEmployee = ()=>{
      $('#permanentEmployeeTable').DataTable().destroy()
      var dataTable = $('#permanentEmployeeTable').DataTable({
         dom: 'Bfrtip',
            processing: true,
            serverSide: true,
            searching:  false,
            ajax: {
              url: baseUrl+'employee/get-permanent-employee',
              type:'POST',
              data: function(data){
               data._token       = _token
               
              }
          },
            columns: [
                 { data: 'usercode' },
                 { data: 'image' },
                 { data: 'name' },
                 { data: 'user_type_name' },
                 { data: 'department_name'},
                 { data: 'location_name' },
                 { data: 'reporting_manager_name' },
                 { data: 'emp_type_name' },
                 { data: 'status' },
                 { data: 'action' },
             ],
            columnDefs: [
            { orderable: false, targets: [1,6,8,9] }
         ],
         
        })
   }
   const loadContructualEmployee = ()=>{
      $('#contructualEmployeeTable').DataTable().destroy()
      var dataTable = $('#contructualEmployeeTable').DataTable({
         dom: 'Bfrtip',
            processing: true,
            serverSide: true,
            searching:  false,
            ajax: {
              url: baseUrl+'employee/get-contructual-employee',
              type:'POST',
              data: function(data){
               data._token       = _token
               
              }
          },
            columns: [
                 { data: 'usercode' },
                 { data: 'image' },
                 { data: 'name' },
                 { data: 'user_type_name' },
                 { data: 'department_name'},
                 { data: 'location_name' },
                 { data: 'reporting_manager_name' },
                 { data: 'emp_type_name' },
                 { data: 'status' },
                 { data: 'action' },
             ],
            columnDefs: [
            { orderable: false, targets: [1,6,8,9] }
         ],
         
        })
   }
   const loadThirdPartyEmployee = ()=>{
      $('#thirdPartyEmployeeTable').DataTable().destroy()
      var dataTable = $('#thirdPartyEmployeeTable').DataTable({
         dom: 'Bfrtip',
            processing: true,
            serverSide: true,
            searching:  false,
            ajax: {
              url: baseUrl+'employee/get-third-party-employee',
              type:'POST',
              data: function(data){
               data._token       = _token
               
              }
          },
            columns: [
                 { data: 'usercode' },
                 { data: 'image' },
                 { data: 'name' },
                 { data: 'user_type_name' },
                 { data: 'department_name'},
                 { data: 'location_name' },
                 { data: 'reporting_manager_name' },
                 { data: 'emp_type_name' },
                 { data: 'status' },
                 { data: 'action' },
             ],
            columnDefs: [
            { orderable: false, targets: [1,6,8,9] }
         ],
         
        })
   }
</script>
@endpush
@endsection