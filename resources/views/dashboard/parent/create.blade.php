@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Register Parent</div>

                    <div class="card-body">
                        <form method="POST" action="{{route('parents.store')}}" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group row">
                                <label for="father_first_name" class="col-md-4 col-form-label text-md-right"> Father First Name</label>

                                <div class="col-md-6">
                                    <input id="father_first_name" type="text" class="form-control @error('father_first_name') is-invalid @enderror" name="father_first_name" value="{{ old('father_first_name') }}" required autocomplete="father_first_name" autofocus>

                                    @error('father_first_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <input name="token" type="hidden" value="{{ csrf_token() }}">
                            <div class="form-group row">
                                <label for="father_middle_name" class="col-md-4 col-form-label text-md-right">Father Middle Name</label>

                                <div class="col-md-6">
                                    <input id="father_middle_name" type="text" class="form-control @error('father_middle_name') is-invalid @enderror" name="father_middle_name" value="{{ old('father_middle_name') }}" required autocomplete="father_middle_name" autofocus>

                                    @error('father_middle_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="father_last_name" class="col-md-4 col-form-label text-md-right">Father Last Name</label>

                                <div class="col-md-6">
                                    <input id="father_last_name" type="text" class="form-control @error('father_last_name') is-invalid @enderror" name="father_last_name" value="{{ old('father_last_name') }}" required autocomplete="father_last_name" autofocus>

                                    @error('father_last_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="mother_first_name" class="col-md-4 col-form-label text-md-right"> Mother First Name</label>

                                <div class="col-md-6">
                                    <input id="mother_first_name" type="text" placeholder="(Optional)" class="form-control @error('mother_first_name') is-invalid @enderror" name="mother_first_name" value="{{ old('mother_first_name') }}" autocomplete="mother_first_name" autofocus>

                                    @error('mother_first_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="father_middle_name" class="col-md-4 col-form-label text-md-right">Mother Middle Name</label>

                                <div class="col-md-6">
                                    <input id="mother_middle_name" type="text" placeholder="(Optional)" class="form-control @error('mother_middle_name') is-invalid @enderror" name="mother_middle_name" value="{{ old('mother_middle_name') }}"  autocomplete="mother_middle_name" autofocus>

                                    @error('mother_middle_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="mother_last_name" class="col-md-4 col-form-label text-md-right">Mother Last Name</label>

                                <div class="col-md-6">
                                    <input id="mother_last_name" type="text" placeholder="(Optional)" class="form-control @error('mother_last_name') is-invalid @enderror" name="mother_last_name" value="{{ old('mother_last_name') }}"  autocomplete="mother_last_name" autofocus>

                                    @error('mother_last_name')
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
                                <label for="father_phone_number" class="col-md-4 col-form-label text-md-right">   Father Phone Number</label>

                                <div class="col-md-6">
                                    <input id="father_phone_number" type="number" class="form-control @error('father_phone_number') is-invalid @enderror" name="father_phone_number" value="{{ old('father_phone_number') }}" required autocomplete="father_phone_number" autofocus>

                                    @error('father_phone_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="mother_phone_number" class="col-md-4 col-form-label text-md-right">   Mother Phone Number</label>

                                <div class="col-md-6">
                                    <input id="mother_phone_number" type="number" placeholder="(Optional)" class="form-control @error('mother_phone_number') is-invalid @enderror" name="mother_phone_number" value="{{ old('mother_phone_number') }}"  autocomplete="mother_phone_number" autofocus>

                                    @error('mother_phone_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>



                            <div class="form-group row">
                                <label for="number_of_children" class="col-md-4 col-form-label text-md-right">Number of children</label>

                                <div class="col-md-6">
                                    <input id="number_of_children" type="number" class="form-control @error('number_of_children') is-invalid @enderror" name="number_of_children" value="{{ old('number_of_children') }}" required autocomplete="number_of_children" autofocus>

                                    @error('number_of_children')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="father_national_id" class="col-md-4 col-form-label text-md-right">Father National ID</label>

                                <div class="col-md-6">
                                    <input id="father_national_id" type="number" placeholder="(Optional)" class="form-control @error('father_national_id') is-invalid @enderror" name="father_national_id" value="{{ old('father_national_id') }}" autocomplete="father_national_id" autofocus>

                                    @error('father_national_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="father_picture" class="col-md-4 col-form-label text-md-right">{{__('labels.father_picture')}}</label>

                                <div class="col-md-6">
                                    <input id="father_picture" type="file" class="form-control @error('father_picture') is-invalid @enderror" name="father_picture" value="{{ old('father_picture') }}" required autocomplete="father_picture" autofocus>

                                    @error('father_picture')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <input name="token" type="hidden" value="{{ csrf_token() }}">
                            <div class="form-group row">
                                <label for="father_identity_card" class="col-md-4 col-form-label text-md-right">{{__('labels.father_identify_card')}}</label>

                                <div class="col-md-6">
                                    <input id="father_identify_card" type="file" class="form-control @error('father_identify_card') is-invalid @enderror" name="father_identify_card" value="{{ old('father_identify_card') }}" required autofocus>

                                    @error('father_identify_card')
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

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right"> {{ __('labels.password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-right"> {{ __('labels.confirm_password') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('events.register') }}
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
