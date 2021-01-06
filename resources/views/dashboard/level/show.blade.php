@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit Level {{$level->name}}</div>

                    <div class="card-body">
                            <div class="form-group row align-items-center">
                                <label for="name" class="col-md-4 col-form-label text-md-right">Level : </label>

                                <div class="col-md-6">
                                    {{ $level->name }}
                                </div>
                            </div>

                            <div class="form-group row  align-items-center">
                                <label for="stage_id" class="col-md-4 col-form-label text-md-right"> Stage : </label>

                                <div class="col-md-6">
                                    {{$level->stage->name}}
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <a href="{{route('levels.index')}}" class="col-md-6 offset-md-4">
                                    <button type="button" class="btn btn-primary">
                                        Back
                                    </button>
                                </a>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
