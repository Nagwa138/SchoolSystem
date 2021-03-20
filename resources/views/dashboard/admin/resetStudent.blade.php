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
                    <form id="form" method="post">
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
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="date_of_birthday" id="date_of_birthday" {{ old('date_of_birthday') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="date_of_birthday">
                                        Date of Birth  Day
                                    </label>
                                </div>
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
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="birth_certificate" id="birth_certificate" {{ old('birth_certificate') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="birth_certificate">
                                        Student Birth Certificate
                                    </label>
                                </div>
                            </div>
                        </div>

{{--                        <div class="form-group row">--}}
{{--                            <div class="col-md-6 offset-md-4">--}}
{{--                                <div class="form-check">--}}
{{--                                    <input class="form-check-input" type="checkbox" name="student_other" id="student_other" {{ old('student_other') ? 'checked' : '' }}>--}}

{{--                                    <label class="form-check-label" for="student_other">--}}
{{--                                        Other wanted Files--}}
{{--                                    </label>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="form-group row">--}}
{{--                            <label for="other_note" class="col-md-4 col-form-label text-md-right"> Note for Other wanted Files :</label>--}}

{{--                            <div class="col-md-6">--}}
{{--                                <input id="other_note" type="text" class="form-control @error('other_note') is-invalid @enderror" name="other_note" value="{{ old('other_note') }}"  autocomplete="other_note" autofocus placeholder="( optional )">--}}

{{--                                @error('other_note')--}}
{{--                                <span class="invalid-feedback" role="alert">--}}
{{--                                        <strong>{{ $message }}</strong>--}}
{{--                                </span>--}}
{{--                                @enderror--}}
{{--                            </div>--}}
{{--                        </div>--}}


                        <div class="form-group row">
                            <label for="note" class="col-md-4 col-form-label text-md-right"> Note :</label>

                            <div class="col-md-6">
                                <input id="note" type="text" class="form-control @error('note') is-invalid @enderror" name="note" value="{{ old('note') }}"  autocomplete="note" autofocus placeholder="( optional )">

                                @error('note')
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

                            <button type="button" id="back" class="btn btn-xs btn-primary float-right">
                                Back
                            </button>

                    </div>
                        <input type="reset" style="display: none" id="resetForm">
                    </form>
                    <form id="checked" style="display: none">
                        @csrf
                        <input type="reset" style="display: none" id="resetCheck">
                        <input type="hidden" name="id" value="{{$id}}">
                    </form>
                </div>
            </div>
        </div>
    </div>


    <!----  end container -->


@endsection


@section('script')
    <script>

        $(document).ready(function () {

            $('#back').on('click' , function () {
                window.history.go(-1)
            })

            var inputs = '';
            $('#form').on('submit', function (e) {
                e.preventDefault();

                if(checkButtons().length > 0){


                    for(var i = 0; i < checkedButtons.length; i++) {

                        inputs+='<input type="checkbox" name="inputs[]" value="'+ checkedButtons[i]  +'" checked>';

                    }

                    if($('#other_note').val() !== ''){
                        inputs+='<input type="text" name="other_note" value="'+ $('#other_note').val()  +'">';
                    }

                    if($('#note').val() !== ''){
                        inputs+='<input type="text" name="note" value="'+ $('#note').val()  +'">';
                    }

                    $('#checked').append(inputs);

                    $.ajax({
                        type: "POST",
                        url: "{{route('modificationRequests.store')}}",
                        data: $('#checked').serialize(),
                        success: function (response) {
                            clearData();
                            Swal.fire({
                                position: 'center',
                                icon: 'success',
                                title: 'Data sent successfully !',
                                showConfirmButton: false,
                                timer: 1500
                            })
                        },
                        error: function (error) {
                            var err = eval("(" + error.responseText + ")");
                            console.log(error.responseText)
                            Swal.fire({
                                icon: 'error',
                                title: 'Opss' ,
                                text: 'Something went wrong!',
                            })
                        }
                    })
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Please Choose At Last One Field!',
                    })
                }

            })


            function checkButtons () {
                for(var i = 0; i < buttonsName.length; i++){
                    if(isCheckedById(buttonsName[i])){
                        checkedButtons.push(buttonsName[i]);
                    } else {
                        if( jQuery.inArray( buttonsName[i], checkedButtons ) !== -1){
                            checkedButtons.splice(buttonsName[i]);
                        }
                    }
                }
                // console.log(checkedButtons);

                return checkedButtons;
            }

            var buttonsName = ['first_name' , 'middle_name' , 'last_name', 'email' , 'gender' , 'religion' , 'date_of_birthday',
                'level' , 'student_picture' , 'birth_certificate', 'student_other' ];
            var checkedButtons = [];

            function isCheckedById(id) {
                var checked = $("input[id=" + id + "]:checked").length;

                if (checked === 0) {
                    return false;
                } else {
                    return true;
                }
            }

            function clearData() {
                $('#resetForm').click();
                $('#resetCheck').click();
                inputs = '';
                while(checkedButtons.length > 0) {
                    checkedButtons.pop();
                }

                $('#checked').empty();
                $('#checked').append( '@csrf' +'<input type="reset" style="display: none" id="resetCheck">\n' +
                    '                        <input type="hidden" name="id" value="{{$id}}">');
                console.log(inputs);
            }


        })
    </script>

@endsection

