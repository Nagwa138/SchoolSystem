@extends('layouts.app')


@section('content')

    <!----  start container -->



    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-11">
                <div class="card">
                    <div class="card-header">
                        <h3>Modification Request </h3>
                    </div>
                    <form id="form" action="{{route('modificationResponses.store')}}" method="post" enctype="multipart/form-data">
                        <div class="card-body">
                            @csrf

                            @foreach($request->items as $item)

                                @if($item->getTypeName->id == 16)

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
                                            <select id="level" name="{{$item->getTypeName->id}}" class="form-control">
                                                <option>choose ...</option>

                                            </select>
                                        </div>
                                    </div>

                                    @else

                                    <div class="form-group row">
                                        <label for="{{$item->getTypeName->id}}" class="col-md-4 col-form-label text-md-right"> {{$item->getTypeName->name}}</label>

                                        <div class="col-md-6">
                                            @if($item->getTypeName->type->id == 1)
                                                @if($item->getTypeName->id == 15)
                                                    <input id="{{$item->getTypeName->id}}" type="date" class="form-control @error($item->getTypeName->id) is-invalid @enderror" name="{{$item->getTypeName->id}}" value="{{ old($item->getTypeName->id) }}" required autocomplete="{{$item->getTypeName->id}}" autofocus>

                                                @elseif($item->getTypeName->id == 13)
                                                    <div class="col-md-6">
                                                        <select name="{{$item->getTypeName->id}}" class="form-control">
                                                            <option value="1">Boy</option>
                                                            <option value="2">Girl</option>
                                                        </select>
                                                    </div>
                                                @else
                                                    <input id="{{$item->getTypeName->id}}" type="text" class="form-control @error($item->getTypeName->id) is-invalid @enderror" name="{{$item->getTypeName->id}}" value="{{ old($item->getTypeName->id) }}" required autocomplete="{{$item->getTypeName->id}}" autofocus>
                                                @endif
                                            @endif

                                            @if($item->getTypeName->type->id == 2)
                                                <input id="{{$item->getTypeName->id}}" type="file" class="form-control @error($item->getTypeName->id) is-invalid @enderror" name="{{$item->getTypeName->id}}" value="{{ old($item->getTypeName->id) }}" required autocomplete="{{$item->getTypeName->id}}" autofocus>
                                            @endif
                                            @error($item->getTypeName->id)
                                            <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                @endif

                            @endforeach

                            <input type="hidden" name="request_id" value="{{$request->id}}">

                        </div>

                        <div id="options" class="card-footer">
                            <button type="submit" class="btn btn-xs btn-success">
                                send
                            </button>
                            <button type="button" id="back" class="btn btn-xs btn-primary float-right">
                                Back
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

        $(document).ready(function () {

            $('#back').on('click', function () {
                window.history.go(-1)
            })

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


