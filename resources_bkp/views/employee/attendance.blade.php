@php
$int='';
$name=auth()->user()->fullName;
$words=explode(' ',$name);
if(count($words) > 0){
$int= mb_strtoupper(mb_substr($words[0], 0, 1, 'UTF-8') .
mb_substr(end($words), 0, 1, 'UTF-8'),
'UTF-8');
}

@endphp
@extends('layout.employee')
@section('content')
<form>
    <div class="performance-statistics">
        @csrf
        <div class="row model-profile-row align-items-center">
            <div class="col-lg-2">
                <div class="model-profile" style="text-align: center;line-height: 6rem;font-size: xxx-large">
                    @if(auth()->user()->profile_image!='')
                    <img src="{{  asset('uploads/photos/'.auth()->user()->profile_image) }}">
                    @else
                    {{$int}}
                    @endif
                </div>
            </div>
            <div class="col-lg-8">
                <div class="model-profile-text">
                    <h3>{{ auth()->user()->fullName }}</h3>
                    <p>#{{ auth()->user()->usercode }}</p>
                    <h5>{{ auth()->user()->userType ? auth()->user()->userType->user_type_name : '' }}</h5>
                </div>

            </div>
        </div>
        <div class="p-info">
            <ul>
                <li>Phone No.</li>
                <li><b>{{ auth()->user()->phone }}</b></li>
            </ul>
            <ul>
                <li>Email.</li>
                <li><b>{{ auth()->user()->email }}</b></li>
            </ul>
            <ul>
                <li>Reporting Officer.</li>
                <li><b>{{auth()->user()->manager ? auth()->user()->manager->user->fullName : '' }} <img src="{{asset('assets/img/whatsapp.png')}}" /></b></li>
            </ul>
            <ul>
                <li>Work Location.</li>
                <li><b>{{auth()->user()->locations ? auth()->user()->locations->first()->location->location_name : '' }}</b></li>
            </ul>

        </div>
        <label for="shift_id">Select Your Shift : </label>
        <select name="shift_id" class="form-control" id="shift_id">
            <option value="">----Select Shift---</option>

            @forelse($shifts as $shift)
            @php
            $shiftId= auth()->user()->shiftAttendanceComplete($shift->id)->isNotEmpty() ? $shift->id : '';
            @endphp
            <option value="{{$shift->id}}" {{(auth()->user()->current_shift==$shift->id) ? 'selected' : ''}} @if($shiftId && $shiftId==$shift->id) disabled @endif>{{$shift->shift_title.'['.$shift->start_time.'-'.$shift->start_time.']'}}</option>
            @empty
            @endforelse
        </select>
        <!--{{ auth()->user()->todayAttendancePunchOut }}-->
        <div class="text-left mt-2">

            <a href="{{ route('employee-punch',['shift_id'=>auth()->user()->current_shift]) }}" class="btn btn-lg gradient-btn showAttendance">Mark Attendance</a><br>
            <span id="att-msg"></span>
        </div>
    </div>
</form>
<style>
    .inactive {
        background
    }
</style>
@endsection
@push('scripts')
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/additional-methods.min.js"></script>
<script src="{{ asset('assets/js/add-employee.js') }}"></script>
<script>
    $(document).ready(function() {
        if ($.trim($("#shift_id").val()) == '') {
            console.log($("#shift_id").val());
            $('.showAttendance').addClass('pe-none');

            $('#att-msg').html('You have given your attendance today for this selected shift.Please change your shift and punch in next.');
        } else {
            $('.showAttendance').removeClass('pe-none');
            $('#att-msg').html('');
            // $('.showAttendance').prop('disabled', false);
        }
    });
    /* $('#shift_id').change(function(){
         if($(this).val()!= ''){
             $('.showAttendance').toggleClass('pe-none');
            
             $('#att-msg').html('You have given your attendance today for this selected shift.Please change your shift and punch in next.');
         }
         // var oldShift='{{auth()->user()->current_shift}}';
         // var curShift=$(this).val();
         // if(oldShift!=curShift){
         //      removeClass('pe-none');  
         // }else{
         //   $('.showAttendance').addClass('pe-none');   
         // }
      
     });*/
    var id;

    var original_link = "{{env('APP_URL')}}/employee/punch";
    $('#shift_id').on('change', function() {
        $('.showAttendance').attr('href', original_link);
        id = $(this).val();
        $('.showAttendance').removeClass('pe-none');
        $('#att-msg').html('');
        var new_href = $('.showAttendance').attr('href') + '/' + id;
        console.log(new_href);
        $('.showAttendance').attr('href', new_href);
    });
</script>

@endpush