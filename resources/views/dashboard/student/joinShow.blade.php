@extends('layouts.app')


@section('content')

    <!----  start container -->

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-11">
                <div class="card">
                    <div class="card-header">
                        <h3>Join Request from Student : {{$user->name}} </h3>
                    </div>

                    @if($user->activated == 1)
                        <div class="alert alert-success" role="alert" style="margin: 10px">Accepted</div>
                    @endif
                    @if($user->activated == -1)
                        <div class="alert alert-danger" role="alert" style="margin: 10px">Disabled</div>
                    @endif
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

                                <span style="font-weight: bold"> Stage :</span><br>
                                <span>{{$user->student->level->stage->name}}</span><br><br>

                                <span style="font-weight: bold"> Level :</span><br>
                                <span>{{$user->student->level->name}}</span><br><br>

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
                         @if($user->activated == 0)
                            <a href="{{url('acceptStudent' , $user->id)}}">
                                <button class="btn btn-xs btn-success">
                                    Accept Student
                                </button>
                            </a>
                          @endif
                             <a href="{{url('/admin/resetStudent')}}">
                                 <button class="btn btn-xs btn-outline-primary">
                                     Ask to reset some Data
                                 </button>
                             </a>
                             <a href="{{route('chats.edit' , $user->student->parent->user->id)}}">
                                <button class="btn btn-xs btn-dark">
                                    Send Message to Parent
                                </button>
                            </a>

                             <a href="{{route('studentRequests.edit' , $user->id)}}">
                                 <button class="btn btn-xs btn-light btn-outline-success">
                                     Edit Student Data
                                 </button>
                             </a>
                            <a href="{{route('parentRequests.index')}}">
                                <button type="button" class="btn btn-xs btn-primary float-right">
                                    Back to Join Requests
                                </button>
                            </a>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!----  end container -->


@endsection
