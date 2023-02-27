@extends('layout.employee')
@section('content')

    <div class="performance-statistics">
         <div class="row">
              <div class="col-md-6">
            <div class="punchout-panel">
               
                         <h3>{{ \Carbon\Carbon::now()->format('h:i A') }}</h3>
                @if(auth()->user()->shiftAttendance(request()->shift_id)->isNotEmpty())
                   
                        <form method="POST" action="{{ route('employee-punch-out') }}">
                            @csrf
                            <input type="hidden" name="shift_id" value="{{request()->shift_id}}">
                            <input type="hidden" name="punch_in_location" value="{{$userLocation->location_name}}">
                            <input class="btn-punch" type="submit" value="Punch Out">
                        </form>
                   
                    @else
                    
                        <a href="javascript:void(0)" class="btn-punch showAttendance"><img src="{{asset('assets/img/clicking-img.png')}}">Punch In</a>
                   
                    @endif
                    
                    <p><img src="{{asset('assets/img/placeholder.png')}}">{{$userLocation->location_name}}</p>
                    <label for="shift_id">Select Your Shift : </label>
                       <select name="shift_id" class="form-control" id="shift_id">
                           <option value="">----Select Shift---</option>
                           
                           @forelse($shifts as $shift)
                           @php
                            $shiftId= auth()->user()->shiftAttendanceComplete($shift->id)->isNotEmpty() ? $shift->id : '';
                           @endphp
                           <option value=" {{$shift->id}}" {{(auth()->user()->current_shift==$shift->id) ? 'selected' : ''}} @if($shiftId && $shiftId==$shift->id) disabled @endif>{{$shift->shift_title.'['.$shift->start_time.'-'.$shift->end_time.']'}}</option>
                           @empty
                           @endforelse
                       </select>.
                    <ul class="timesheet-li">
                        <li>
                            <span><img src="{{asset('assets/img/time.png')}}"></span>
                            @if(is_null($attendance))
                            
                            <b>{{ \Carbon\Carbon::now()->format('h:i A') }}</b>
                            <h6>Punch In</h6>
                            @else
                                <b>{{ \Carbon\Carbon::parse($attendance->punch_in_time)->format('h:i A') }}</b>
                                <h6>Punched In</h6>
                            @endif
                            
                        </li>
                        <li>
                            @if(!is_null($attendance) && empty($attendance->punch_out_time))
                            <span><img src="{{asset('assets/img/time.png')}}"></span>
                            <b>{{ \Carbon\Carbon::now()->format('h:i A') }}</b>
                            <h6>Punch Out</h6>
                            @endif
                        </li>
                    </ul>
                    </div>
                    </div>
                    <div class="col-md-6">
                          <div class="edit-user-ful-row">
            <form enctype="multipart/form-data" class="basic-form" method="post" action="{{ route('employee-punch-in') }}">
                @csrf
                <input type="hidden" name="punch_in_location" value="{{$userLocation->location_name}}">
                <input type="hidden" id="att_shift_id" name="shift_id" value="{{request()->shift_id}}">
                <div class="row d-none snapshot">
                    <div class="col-md-6">
                        <div id="my_camera"></div>
                        <br />
                        <input type="button" value="Take Snapshot" class="btn btn-warning btn-sm" onClick="take_snapshot()">

                        <input type="hidden" name="snapshot" class="image-tag">
                        @error('snapshot')
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
            </form>
        </div>
                    </div>
                </div>
               
            </div>
        
      
        <div class="text-center mt-2">
            {{-- <a href="{{ route('employee-punch') }}" class="btn btn-lg btn-primary showAttendance">Mark Attendance</a> --}}

        </div>
    </div>

@endsection
@push('scripts')
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/additional-methods.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.min.js"></script>
<script src="{{ asset('assets/js/add-employee.js') }}"></script>
<script>
    Webcam.set({
        width: 200,
        height: 200,
        image_format: 'jpeg',
        jpeg_quality: 90
    });
    Webcam.attach('#my_camera');
    function take_snapshot() {
        Webcam.snap( function(data_uri) {
            $(".image-tag").val(data_uri);
            document.getElementById('results').innerHTML = '<img class="w-100" src="'+data_uri+'"/>';
        } );
    }
    $('#shift_id').change(function(){
        $('#att_shift_id').val($(this).val());
    })
</script>
@endpush
