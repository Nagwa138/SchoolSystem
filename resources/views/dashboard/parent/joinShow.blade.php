@extends('layouts.app')


@section('content')

    <!----  start container -->

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-11">
                <div class="card">
                    <div class="card-header">
                        <h3>Join Request from Parent : {{$user->name}} </h3>
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
                                <span style="font-weight: bold"> Father first Name :</span><br>
                                <span>{{$user->parent->father_first_name}}</span><br><br>

                                <span style="font-weight: bold"> Father Middle Name :</span><br>
                                <span>{{$user->parent->father_middle_name}}</span><br><br>

                                <span style="font-weight: bold"> Father Last Name :</span><br>
                                <span>{{$user->parent->father_last_name}}</span><br><br>

                                <span style="font-weight: bold"> E-mail :</span><br>
                                <span>{{$user->email}}</span><br><br>

                                @if($user->parent->mother_first_name)
                                    <span style="font-weight: bold"> Mother first Name :</span><br>
                                    <span>{{$user->parent->mother_first_name}}</span><br><br>
                                @endif

                                @if($user->parent->mother_middle_name)
                                    <span style="font-weight: bold"> Mother Middle Name :</span><br>
                                    <span>{{$user->parent->mother_middle_name}}</span><br><br>
                                @endif

                                @if($user->parent->mother_last_name)
                                    <span style="font-weight: bold"> Mother Last Name :</span><br>
                                    <span>{{$user->parent->mother_last_name}}</span><br><br>
                                @endif

                                <span style="font-weight: bold"> Father Phone Number :</span><br>
                                <span>{{$user->parent->father_phone_number}}</span><br><br>

                                @if($user->parent->mother_phone_number)
                                    <span style="font-weight: bold"> Mother Phone Number :</span><br>
                                    <span>{{$user->parent->mother_phone_number}}</span><br><br>
                                @endif

                                <span style="font-weight: bold"> Number of Children :</span><br>
                                <span>{{$user->parent->number_of_children}}</span><br><br>

                                @if($user->parent->father_national_id)
                                    <span style="font-weight: bold"> Father National ID :</span><br>
                                    <span>{{$user->parent->father_national_id}}</span><br><br>
                                @endif

                            </div>
                        </div>
                        <div class="col-md-4 flex-column justify-content-center centered">
                            @foreach($files as $file)
                                @if($file->filetype_id == 2)
                                    <span style="font-weight: bold">Father Picture</span><br><br><br>
                                    <img src="{{asset('uploads/parents/' . $user->id .'/father_picture/'. $file->file)}}" width="200" height="200"><br><br><br>
                                @endif
                                    @if($file->filetype_id == 1)
                                        <span style="font-weight: bold">Father Identify Card</span><br><br><br>
                                        <img src="{{asset('uploads/parents/' . $user->id .'/father_identify_card/'. $file->file)}}" width="200" height="200"><br><br><br>
                                    @endif
                            @endforeach
                        </div>

                    </div>
                    <div id="options" class="card-footer">
                        @if($user->activated == 0)
                            <a href="{{url('acceptParent' , $user->id)}}">
                                <button class="btn btn-xs btn-success">
                                    Accept Parent
                                </button>
                            </a>
                         @endif
                        <a href="{{url('sendNoteForParent')}}">
                            <button class="btn btn-xs btn-dark">
                                Send Note to Parent
                            </button>
                        </a>
                        @foreach($students as $student)
                            @if($student->student->parent_id == $user->parent->id)
                                <a href="{{route('studentRequests.show' , $student->id)}}" class="float-right" style="margin-left:5px">
                                    <button class="btn btn-xs btn-primary">
                                        Student Number {{$num +1}}
                                    </button>
                                </a>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!----  end container -->


@endsection
