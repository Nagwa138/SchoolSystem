@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit Level {{$level->name}}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('levels.update', $level->id) }}">
                            @csrf
                            {{method_field('PUT')}}

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right"> Name</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $level->name }}" required autocomplete="name" autofocus>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="stage_id" class="col-md-4 col-form-label text-md-right"> Stage</label>

                                <div class="col-md-6">
                                    <select name="stage_id" class="form-control">
                                        @foreach($stages as $stage)
                                            @if($stage->id == $level->stage_id)
                                                <option value="{{$stage->id}}" selected>{{$stage->name}}</option>
                                                @else
                                                <option value="{{$stage->id}}">{{$stage->name}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>



                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Update
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
