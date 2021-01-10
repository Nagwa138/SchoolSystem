@extends('layouts.app')


@section('content')

    <!----  start container -->

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-11">
                <div class="card">
                    <div class="card-header">
                        <h3>Ask Parent to Modify Student Data</h3>
                    </div>
                    <form action="" method="post">
                    <div class="card-body">
                        @csrf

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="first_name" id="first_name" {{ old('first_name') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="first_name">
                                        First Name
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="first_name_note" class="col-md-4 col-form-label text-md-right"> Note for reset First Name :</label>

                            <div class="col-md-6">
                                <input id="first_name_note" type="text" placeholder="(optional)" class="form-control @error('first_name_note') is-invalid @enderror" name="first_name_note" value="{{ old('first_name_note') }}"  autocomplete="first_name_note" autofocus>

                                @error('first_name_note')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="middle_name" id="middle_name" {{ old('middle_name') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="middle_name">
                                        Middle Name
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="middle_name_note" class="col-md-4 col-form-label text-md-right"> Note for reset Middle Name :</label>

                            <div class="col-md-6">
                                <input id="middle_name_note" type="text" placeholder="(optional)" class="form-control @error('middle_name_note') is-invalid @enderror" name="middle_name_note" value="{{ old('middle_name_note') }}"  autocomplete="middle_name_note" autofocus>

                                @error('middle_name_note')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="last_name" id="last_name" {{ old('last_name') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="last_name">
                                        Last Name
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="last_name_note" class="col-md-4 col-form-label text-md-right"> Note for reset Last Name :</label>

                            <div class="col-md-6">
                                <input id="last_name_note" type="text" placeholder="(optional)" class="form-control @error('last_name_note') is-invalid @enderror" name="last_name_note" value="{{ old('last_name_note') }}"  autocomplete="last_name_note" autofocus>

                                @error('last_name_note')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>



                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="email" id="email" {{ old('email') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="email">
                                        E-mail
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email_note" class="col-md-4 col-form-label text-md-right"> Note for reset E-mail :</label>

                            <div class="col-md-6">
                                <input id="email_note" type="text" placeholder="(optional)" class="form-control @error('email_note') is-invalid @enderror" name="email_note" value="{{ old('email_note') }}"  autocomplete="email_note" autofocus>

                                @error('email_note')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="gender" id="gender" {{ old('gender') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="gender">
                                        Gender
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="gender_note" class="col-md-4 col-form-label text-md-right"> Note for reset Gender :</label>

                            <div class="col-md-6">
                                <input id="gender_note" type="text" placeholder="(optional)" class="form-control @error('gender_note') is-invalid @enderror" name="gender_note" value="{{ old('gender_note') }}"  autocomplete="gender_note" autofocus>

                                @error('gender_note')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="religion" id="religion" {{ old('religion') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="religion">
                                        Religion
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="religion_note" class="col-md-4 col-form-label text-md-right"> Note for reset Religion :</label>

                            <div class="col-md-6">
                                <input id="religion_note" type="text" placeholder="(optional)" class="form-control @error('religion_note') is-invalid @enderror" name="religion_note" value="{{ old('religion_note') }}"  autocomplete="religion_note" autofocus>

                                @error('religion_note')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="level" id="level" {{ old('level') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="level">
                                        Level
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="level_note" class="col-md-4 col-form-label text-md-right"> Note for reset Level :</label>

                            <div class="col-md-6">
                                <input id="level_note" type="text" placeholder="(optional)" class="form-control @error('level_note') is-invalid @enderror" name="level_note" value="{{ old('level_note') }}"  autocomplete="level_note" autofocus>

                                @error('level_note')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="student_picture" id="student_picture" {{ old('student_picture') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="student_picture">
                                        Student Picture
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="student_picture_note" class="col-md-4 col-form-label text-md-right"> Note for reset Student Picture :</label>

                            <div class="col-md-6">
                                <input id="student_picture_note" type="text" placeholder="(optional)" class="form-control @error('student_picture_note') is-invalid @enderror" name="student_picture_note" value="{{ old('student_picture_note') }}"  autocomplete="student_picture_note" autofocus>

                                @error('student_picture_note')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="birth_certificate" id="birth_certificate" {{ old('birth_certificate') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="birth_certificate">
                                        Student Birth Certificate
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="birth_certificate_note" class="col-md-4 col-form-label text-md-right"> Note for reset Student Birth Certificate :</label>

                            <div class="col-md-6">
                                <input id="birth_certificate_note" type="text" placeholder="(optional)" class="form-control @error('birth_certificate_note') is-invalid @enderror" name="birth_certificate_note" value="{{ old('birth_certificate_note') }}"  autocomplete="birth_certificate_note" autofocus>

                                @error('birth_certificate_note')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>



                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="other" id="other" {{ old('other') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="other">
                                        Other wanted Files
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="other_number" class="col-md-4 col-form-label text-md-right"> Number of Other wanted Files :</label>

                            <div class="col-md-6">
                                <input id="other_number" type="number"  required class="form-control @error('other_number') is-invalid @enderror" name="other_number" value="{{ old('other_number') }}"  autocomplete="other_number" autofocus>

                                @error('other_number')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="other_note" class="col-md-4 col-form-label text-md-right"> Note for Other wanted Files :</label>

                            <div class="col-md-6">
                                <input id="other_note" type="text" class="form-control @error('other_note') is-invalid @enderror" name="other_note" value="{{ old('other_note') }}"  autocomplete="other_note" autofocus>

                                @error('other_note')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                    </div>
                    <div id="options" class="card-footer">
                        <button type="submit" class="btn btn-xs btn-success">
                            send
                        </button>
                        <a href="">
                            <button type="button" class="btn btn-xs btn-primary float-right">
                                Back
                            </button>
                        </a>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <!----  end container -->


@endsection
