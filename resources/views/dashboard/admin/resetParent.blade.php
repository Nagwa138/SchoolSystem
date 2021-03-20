@extends('layouts.app')


@section('content')

    <!----  start container -->



    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-11">
                <div class="card">
                    <div class="card-header">
                        <h3>Ask Parent to Modify his Data </h3>
                    </div>
                    <form id="form" method="post">
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
                                        <input class="form-check-input" type="checkbox" name="father_phone_number" id="father_phone_number" {{ old('father_phone_number') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="father_phone_number">
                                            Father Phone Number
                                        </label>
                                    </div>
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
                                <div class="col-md-6 offset-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="father_identify_card" id="father_identify_card" {{ old('father_identify_card') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="father_identify_card">
                                            Father Identify Card
                                        </label>
                                    </div>
                                </div>
                            </div>


{{--                            <div class="form-group row">--}}
{{--                                <div class="col-md-6 offset-md-4">--}}
{{--                                    <div class="form-check">--}}
{{--                                        <input class="form-check-input" type="checkbox" name="other" id="other" {{ old('other') ? 'checked' : '' }}>--}}

{{--                                        <label class="form-check-label" for="other">--}}
{{--                                            Other wanted Files--}}
{{--                                        </label>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}

{{--                            <div class="form-group row">--}}
{{--                                <label for="other_number_note" class="col-md-4 col-form-label text-md-right"> Note of Other wanted Files :</label>--}}

{{--                                <div class="col-md-6">--}}
{{--                                    <input id="other_number_note" type="text" class="form-control @error('other_number_note') is-invalid @enderror" name="other_number_note" autocomplete="other_number_note" autofocus placeholder="( optional )">--}}

{{--                                    @error('other_number_note')--}}
{{--                                    <span class="invalid-feedback" role="alert">--}}
{{--                                        <strong>{{ $message }}</strong>--}}
{{--                                    </span>--}}
{{--                                    @enderror--}}
{{--                                </div>--}}
{{--                            </div>--}}

                            <div class="form-group row">
                                <label for="other_note" class="col-md-4 col-form-label text-md-right"> Note :</label>

                                <div class="col-md-6">
                                    <input id="other_note" type="text" class="form-control @error('other_note') is-invalid @enderror" name="other_note" value="{{ old('other_note') }}"  autocomplete="other_note" autofocus placeholder="( optional )">

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


        $(document).ready(function () {

            $('#back').on('click', function () {
                window.history.go(-1)
            })
        })



        var inputs = '';
        $('#form').on('submit', function (e) {
            e.preventDefault();

            if(checkButtons().length > 0){


                for(var i = 0; i < checkedButtons.length; i++) {

                    inputs+='<input type="checkbox" name="inputs[]" value="'+ checkedButtons[i]  +'" checked>';

                }

                if($('#other_note').val() !== ''){
                    inputs+='<input type="text" name="note" value="'+ $('#other_note').val()  +'">';
                }
                if($('#other_number_note').val() !== ''){
                    inputs+='<input type="text" name="other_note" value="'+ $('#other_number_note').val()  +'">';
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

        var buttonsName = ['father_first_name' , 'father_middle_name' , 'father_last_name',
                            'email' , 'father_phone_number' , 'father_picture' , 'father_identify_card',
                            'other' ];
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
