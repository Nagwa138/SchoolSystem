@extends('layouts.app')


@section('content')

    <!----  start container -->

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-11">
                <div class="card">
                    <div class="card-header">
                        <h3>Ask Parent to Modify his Data</h3>
                    </div>
                    <form action="" method="post">
                        <div class="card-body">
                            @csrf

                            <div class="form-group row">
                                <div class="col-md-6 offset-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="father_first_name" id="father_first_name" {{ old('father_first_name') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="father_first_name">
                                            Father First Name
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="father_first_name_note" class="col-md-4 col-form-label text-md-right"> Note for reset Father First Name :</label>

                                <div class="col-md-6">
                                    <input id="father_first_name_note" type="text" placeholder="(optional)" class="form-control @error('father_first_name_note') is-invalid @enderror" name="father_first_name_note" value="{{ old('father_first_name_note') }}"  autocomplete="father_first_name_note" autofocus>

                                    @error('father_first_name_note')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="form-group row">
                                <div class="col-md-6 offset-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="father_middle_name" id="father_middle_name" {{ old('father_middle_name') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="father_middle_name">
                                            Father Middle Name
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="father_middle_name_note" class="col-md-4 col-form-label text-md-right"> Note for reset Father Middle Name :</label>

                                <div class="col-md-6">
                                    <input id="father_middle_name_note" type="text" placeholder="(optional)" class="form-control @error('father_middle_name_note') is-invalid @enderror" name="father_middle_name_note" value="{{ old('father_middle_name_note') }}"  autocomplete="father_middle_name_note" autofocus>

                                    @error('father_middle_name_note')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="form-group row">
                                <div class="col-md-6 offset-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="father_last_name" id="father_last_name" {{ old('father_last_name') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="father_last_name">
                                            Father Last Name
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="father_last_name_note" class="col-md-4 col-form-label text-md-right"> Note for reset Father Last Name :</label>

                                <div class="col-md-6">
                                    <input id="father_last_name_note" type="text" placeholder="(optional)" class="form-control @error('father_last_name_note') is-invalid @enderror" name="father_last_name_note" value="{{ old('father_last_name_note') }}"  autocomplete="father_last_name_note" autofocus>

                                    @error('father_last_name_note')
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
                                        <input class="form-check-input" type="checkbox" name="father_phone_number" id="father_phone_number" {{ old('father_phone_number') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="father_phone_number">
                                            Father Phone Number
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="father_phone_number_note" class="col-md-4 col-form-label text-md-right"> Note for reset Father Phone Number :</label>

                                <div class="col-md-6">
                                    <input id="father_phone_number_note" type="text" placeholder="(optional)" class="form-control @error('father_phone_number_note') is-invalid @enderror" name="father_phone_number_note" value="{{ old('father_phone_number_note') }}"  autocomplete="father_phone_number_note" autofocus>

                                    @error('father_phone_number_note')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-6 offset-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="father_picture" id="father_picture" {{ old('father_picture') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="father_picture">
                                            Father Picture
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="father_picture_note" class="col-md-4 col-form-label text-md-right"> Note for reset Father Picture :</label>

                                <div class="col-md-6">
                                    <input id="father_picture_note" type="text" placeholder="(optional)" class="form-control @error('father_picture_note') is-invalid @enderror" name="father_picture_note" value="{{ old('father_picture_note') }}"  autocomplete="father_picture_note" autofocus>

                                    @error('father_picture_note')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="form-group row">
                                <div class="col-md-6 offset-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="father_identify_card" id="father_identify_card" {{ old('father_identify_card') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="father_identify_card">
                                            Father Identify Card
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="father_identify_card_note" class="col-md-4 col-form-label text-md-right"> Note for reset Father Identify Card :</label>

                                <div class="col-md-6">
                                    <input id="father_identify_card_note" type="text" placeholder="(optional)" class="form-control @error('father_identify_card_note') is-invalid @enderror" name="father_identify_card_note" value="{{ old('father_identify_card_note') }}"  autocomplete="father_identify_card_note" autofocus>

                                    @error('father_identify_card_note')
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
