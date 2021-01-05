@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Register Student</div>

                    <div class="card-body">
                        <form method="POST" action="{{route('students.store')}}" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group row">
                                <label for="first_name" class="col-md-4 col-form-label text-md-right"> First Name</label>

                                <div class="col-md-6">
                                    <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name') }}" required autocomplete="first_name" autofocus>

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
                                    <input id="middle_name" type="text" class="form-control @error('middle_name') is-invalid @enderror" name="middle_name" value="{{ old('middle_name') }}" required autocomplete="middle_name" autofocus>

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
                                    <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}" required autocomplete="last_name" autofocus>

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
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"  name="email" value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
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
                                        <option value="1">Boy</option>
                                        <option value="2">Girl</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="religion" class="col-md-4 col-form-label text-md-right">Religion</label>

                                <div class="col-md-6">
                                    <input id="religion" type="text"  class="form-control @error('religion') is-invalid @enderror" name="religion" value="{{ old('religion') }}" required autocomplete="religion" autofocus>

                                    @error('religion')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="date_of_birthday" class="col-md-4 col-form-label text-md-right">Date of Birth  Day</label>

                                <div class="col-md-6">
                                    <input id="date_of_birthday" type="date"  class="form-control @error('date_of_birthday') is-invalid @enderror" name="date_of_birthday" value="{{ old('date_of_birthday') }}" required autocomplete="date_of_birthday" autofocus>

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
                                        <option>choose ...</option>
                                        @foreach($stages as $stage)
                                            <option value="{{$stage->id}}">{{ __($stage->name)}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="level" class="col-md-4 col-form-label text-md-right">Level</label>

                                <div class="col-md-6">
                                    <select id="level" name="level" class="form-control">
                                        <option>choose ...</option>

                                    </select>
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="student_picture" class="col-md-4 col-form-label text-md-right">{{__('labels.student_picture')}}</label>

                                <div class="col-md-6">
                                    <input id="student_picture" type="file" class="form-control @error('student_picture') is-invalid @enderror" name="student_picture" value="{{ old('student_picture') }}" required autocomplete="student_picture" autofocus>

                                    @error('student_picture')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="birth_certificate" class="col-md-4 col-form-label text-md-right">{{__('labels.birth_certificate')}}</label>

                                <div class="col-md-6">
                                    <input id="birth_certificate" type="file" class="form-control @error('birth_certificate') is-invalid @enderror" name="birth_certificate" value="{{ old('birth_certificate') }}" required autofocus>

                                    @error('birth_certificate')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="notes" class="col-md-4 col-form-label text-md-right">Notes</label>

                                <div class="col-md-6">
                                    <input id="notes" type="text" class="form-control @error('notes') is-invalid @enderror" name="notes" value="{{ old('notes') }}" placeholder="(optional)" autocomplete="notes" autofocus>

                                    @error('notes')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            {{--------
                            <div class="form-group row">
                                <label for="additional" class="col-md-4 col-form-label text-md-right">{{__('labels.addtional_files')}}  {{__('labels.optional')}} </label>

                                <div class="col-md-6">
                                    <input id="additional" type="file" class="form-control @error('additional') is-invalid @enderror" name="additional" value="{{ old('father_last_name') }}"  autocomplete="additional" autofocus>

                                    @error('additional')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
-------}}
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Save
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
