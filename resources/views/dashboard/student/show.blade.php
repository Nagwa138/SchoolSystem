@extends('layouts.app')


@section('content')

    <!----  start container -->

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-11">
                <div class="card">
                    <div class="card-header">
                        <h3>View Student  {{$user->name}}  Data</h3>
                    </div>

                    <div class="card-body row justify-content-center align-items-center">
                        <div class="col-md-8 ">
                            <div class="about-box">
                                <span style="font-weight: bold"> Student first Name :</span><br>
                                <span>{{$user->student->first_name}}</span><br><br>

                                <span style="font-weight: bold"> Student Middle Name :</span><br>
                                <span>{{$user->student->middle_name}}</span><br><br>

                                <span style="font-weight: bold"> Student Last Name :</span><br>
                                <span>{{$user->student->last_name}}</span><br><br>

                                <span style="font-weight: bold"> E-mail :</span><br>
                                <span>{{$user->email}}</span><br><br>

                                <span style="font-weight: bold"> Date of Birthday :</span><br>
                                <span>{{$user->student->date_of_birthday}}</span><br><br>

                                <span style="font-weight: bold"> Religion :</span><br>
                                <span>{{$user->student->religion}}</span><br><br>

                                <span style="font-weight: bold"> Gender :</span><br>
                                @if($user->student->gender ==1)
                                    <span>Boy</span><br><br>
                                @endif
                                @if($user->student->gender ==2)
                                    <span>Girl</span><br><br>
                                @endif

                                @if($user->student->notes)
                                    <span style="font-weight: bold"> Notes :</span><br>
                                    <span>{{$user->student->notes}}</span><br><br>
                                @endif

                                <span style="font-weight: bold"> Status :</span><br>
                                @if($user->activated == 1)
                                    <span>Active </span><br><br>
                                @endif
                                @if($user->activated == -1)
                                    <span>Disabled </span><br><br>
                                @endif
                                @if($user->activated == 0)
                                    <a href="{{url('acceptStudent' , $user->id)}}">
                                        <button class="btn btn-xs btn-success">
                                            Accept Student
                                        </button>
                                    </a>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-4 flex-column justify-content-center centered">
                            @foreach($files as $file)
                                @if($file->filetype_id == 3)
                                    <span style="font-weight: bold">Student Picture</span><br><br><br>
                                    <img src="{{asset('uploads/students/' . $user->id .'/student_picture/'. $file->file)}}" width="200" height="200"><br><br><br>
                                @endif
                                @if($file->filetype_id == 5)
                                    <span style="font-weight: bold">Student birth certificate</span><br><br><br>
                                    <img src="{{asset('uploads/students/' . $user->id .'/birth_certificate/'. $file->file)}}" width="200" height="200"><br><br><br>
                                @endif
                            @endforeach
                        </div>

                    </div>
                    <div id="options" class="card-footer">
                        <a href="{{route('students.index')}}">
                            <button class="btn btn-xs btn-primary">
                                Back
                            </button>
                        </a>
                        <a href="{{route('parents.show' , $user->student->parent->user_id)}}">
                            <button class="btn btn-xs btn-success">
                                View Parent Data
                            </button>
                        </a>

                        <a href="">
                            <button class="btn btn-xs btn-dark">
                                Send Message
                            </button>
                        </a>

                        @if($user->activated == 1)
                        <a href="{{ url('students/destroy' , $user->id) }}" class="float-right">
                            <button class="btn btn-xs btn-danger">
                                Disable
                            </button>
                        </a>
                        @endif

                        @if($user->activated == -1)
                        <a href="{{ url('students/enable' , $user->id) }}" class="float-right">
                            <button class="btn btn-xs btn-success">
                                Enable
                            </button>
                        </a>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>


    <!----  end container -->


@endsection
