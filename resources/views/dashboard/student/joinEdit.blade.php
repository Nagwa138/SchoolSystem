@extends('layouts.app')


@section('content')

    <!----  start container -->

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-11">
                <div class="card">
                    <div class="card-header">
                        <h3>Edit Request from Student : {{$user->name}} </h3>
                    </div>
                    <form  method="POST" action="{{route('studentRequests.update' , $user->id)}}" >
                        @csrf
                        {{method_field('PUT')}}
                    <div class="card-body row justify-content-center align-items-center">
                        <div class="col-md-8 ">
                            <div class="about-box">

                                <div class="form-group row">
                                    <label for="first_name" class="col-md-4 col-form-label text-md-right"> First Name</label>

                                    <div class="col-md-6">
                                        <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{$user->student->first_name}}" required autocomplete="first_name" autofocus>

                                        @error('first_name')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="middle_name" class="col-md-4 col-form-label text-md-right">Middle Name</label>

                                    <div class="col-md-6">
                                        <input id="middle_name" type="text" class="form-control @error('middle_name') is-invalid @enderror" name="middle_name" value="{{$user->student->middle_name}}" required autocomplete="middle_name" autofocus>

                                        @error('middle_name')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="last_name" class="col-md-4 col-form-label text-md-right"> Last Name</label>

                                    <div class="col-md-6">
                                        <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{$user->student->last_name}}" required autocomplete="last_name" autofocus>

                                        @error('last_name')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="email" class="col-md-4 col-form-label text-md-right"> {{ __('labels.email') }}</label>

                                    <div class="col-md-6">
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"  name="email" value="{{$user->email}}" required autocomplete="email">

                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="date_of_birthday" class="col-md-4 col-form-label text-md-right">Date of Birth  Day</label>

                                    <div class="col-md-6">
                                        <input id="date_of_birthday" type="date"  class="form-control @error('date_of_birthday') is-invalid @enderror" name="date_of_birthday" value="{{$user->student->date_of_birthday}}" required autocomplete="date_of_birthday" autofocus>

                                        @error('date_of_birthday')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="stage" class="col-md-4 col-form-label text-md-right">Stage</label>

                                    <div class="col-md-6">
                                        <select id="stage" name="stage" class="form-control">
                                            @foreach($stages as $stage)
                                                @if($stage->id == $user->student->level->stage->id)
                                                    <option value="{{$stage->id}}" selected>{{ __($stage->name)}}</option>
                                                    @else
                                                    <option value="{{$stage->id}}">{{ __($stage->name)}}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="level" class="col-md-4 col-form-label text-md-right">Level</label>

                                    <div class="col-md-6">
                                        <select id="level" name="level_id" class="form-control">
                                            <option value="{{$user->student->level_id}}">{{$user->student->level->name}}</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="religion" class="col-md-4 col-form-label text-md-right">Religion</label>

                                    <div class="col-md-6">
                                        <input id="religion" type="text"  class="form-control @error('religion') is-invalid @enderror" name="religion" value="{{$user->student->religion}}" required autocomplete="religion" autofocus>

                                        @error('religion')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="gender" class="col-md-4 col-form-label text-md-right">Gender</label>

                                    <div class="col-md-6">
                                        <select name="gender" class="form-control">
                                            @if($user->student->gender ==1)
                                                <option value="1" selected>Boy</option>
                                            @else
                                                <option value="1" >Boy</option>
                                            @endif
                                                @if($user->student->gender ==2)
                                                    <option value="2" selected>Girl</option>
                                                @else
                                                    <option value="2">Girl</option>
                                                    @endif
                                        </select>
                                    </div>
                                </div>

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
                    <div class="card-footer">
                        <button type="submit" class="btn btn-xs btn-primary">
                            Save
                        </button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <!----  end container -->


@endsection


@section('script')

    <script>
        $(document).ready(function()
        {
            $('#stage').on('change' , function () {
                let value = $(this).val();
                $.ajax({
                    method  : "GET",
                    url : "../../getLevels/" + value,
                    success:function(data) {
                        console.log(data.data);
                        var levels = ' ';
                        for(var i = 0; i< data.data.length; i++ ) {
                            levels += '<option value="' + data.data[i]['id'] + '">';
                            levels += data.data[i]['name'];
                            levels += '</option>';
                        }
                        $('#level').html(levels);
                    }
                })
            })

        })
    </script>
@endsection

