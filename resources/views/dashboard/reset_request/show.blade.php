@extends('layouts.app')


@section('content')

    <!----  start container -->

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-11">
                <div class="card">
                    <div class="card-header">

                        <h3>
                                @if($user->job_id == 1 ) Parent @endif
                                @if($user->job_id == 2 ) Student @endif
                                @if($user->job_id == 3 ) Teacher @endif
                            Modification Request : {{$user->name}}  </h3>
                    </div>

                    @if(Session::has('status'))
                        <div class="alert alert-success" role="alert" style="margin: 10px">{{Session::get('status')}}</div>
                    @endif
                    <div class="card-body">
                        @if($request->approved == 0)

                                @if($items->count() > 0)

                                    @foreach($items as $item)
                                        <div class="form-group row">
                                            <div class="col-md-6 offset-md-4">
                                                <span style="font-weight: bold"> {{$item->getTypeName->name}}</span>
                                                <span style="margin: 5px 20px">
                                                    <a href="{{route('modificationRequests.edit' , $item->id)}}">
                                                        <button type="button" class="btn btn-xs btn-outline-danger">
                                                            remove
                                                        </button>
                                                    </a>
                                                </span>
                                            </div>
                                        </div>
                                        <br>
                                    @endforeach
                                    @else

                                    <div class="alert alert-light text-dark" role="alert" style="margin: 10px">
                                        Request is not still available
                                    </div>


                                @endif
                        @endif

                            @if($request->approved == 2)

                                    <div class="alert alert-light text-dark" role="alert" style="margin: 10px">
                                        Request had been Accepted !!
                                    </div>
                            @endif

                            @if($request->approved == -1)

                                <div class="alert alert-light text-dark" role="alert" style="margin: 10px">
                                    Request is not still available
                                </div>
                            @endif


                            @if($request->approved == 1)

                                @if($items->count() > 0)

                                    @if($request->response->items->count() > 0)
                                        @foreach($request->response->items as $element)

                                            <div class="form-group row">
                                                <div class="col-md-12 align-items-center row ">
                                                    <div class="col-md-4 offset-md-1 align-items-center">
                                                        <span style="font-weight: bold">

                                                        {{$element->getTypeName->name}} :

                                                        <br>
                                                        @if($element->getTypeName->type->id == 1)

                                                            @if($element->getTypeName->id == 16)

                                                                @foreach($levels as $level)

                                                                    @if($level->id == $element->value)
                                                                        {{$level->name}}

                                                                        @endif

                                                                    @endforeach
                                                                @elseif($element->getTypeName->id == 13)
                                                                    @if($element->value == 1) Boy @else Girl @endif
                                                                @else
                                                                    <span style="margin: 5px 20px">
                                                                        {{$element->value}}
                                                                    </span>
                                                                @endif


                                                        @endif

                                                        @if($element->getTypeName->type->id == 2)

                                                            <img src="{{asset('/storage/' .$element->value)}}" class="img-fluid">
                                                        @endif

                                                    </span>

                                                    </div>
                                                    <div class="col-md-4 offset-md-1 align-items-center">
                                                        <span style="margin: 5px 20px">
                                                        {{--TODO:: remove Both Request & Response item --}}
                                                            <a href="{{url('cancelModificationItem' , $element->id)}}">
                                                                <button type="button" class="btn btn-xs btn-outline-danger">
                                                                    remove
                                                                </button>
                                                            </a>
                                                        </span>
                                                            <span style="margin: 5px 20px">
                                                                {{--TODO:: accept Both Request & Response item --}}
                                                            <a href="{{url('acceptModificationItem' , $element->id)}}">
                                                                <button type="button" class="btn btn-xs btn-success">
                                                                    accept
                                                                </button>
                                                            </a>
                                                        </span>
                                                    </div>

                                                </div>


                                            </div>
                                        @endforeach
                                    @endif

                                @else

                                    <div class="alert alert-light text-dark" role="alert" style="margin: 10px">
                                        Request is not still available
                                    </div>

                                @endif
                            @endif


                    </div>
                    <div id="options" class="card-footer">
                        <button type="button" id="back" class="btn btn-xs btn-primary">
                            Back
                        </button>
                        @if($request->approved == 1)
                            {{--TODO:: Accept Both Request & Response --}}

                            <a href="{{url('acceptModificationRequest' , $request->id)}}" class="btn btn-xs btn-success float-right" style="margin:0 10px">
                                <i class="glyphicon glyphicon-edit"></i>
                                Accept
                            </a>

                            {{--TODO:: Cancel Both Request & Response --}}
                           <a href="{{url('/modificationRequests/destroy' , $request->id)}}" class="btn btn-xs btn-dark" style="margin-left: 20px">
                               <i class="glyphicon glyphicon-edit"></i>
                               Cancel
                           </a>

                        @endif
                        @if($request->approved == 0)

                            <a href="{{url('/modificationRequests/destroy' , $request->id)}} " class="btn btn-xs btn-dark" style="margin-left: 20px">
                                <i class="glyphicon glyphicon-edit"></i>
                                Cancel
                            </a>

                        @endif

                    @if($job_id == 1)

                            <a href="{{route('parentRequests.show'  , $user_id)}}">
                                <button type="button" class="btn btn-xs btn-outline-success float-right">
                                    View User
                                </button>
                            </a>

                        @endif

                        @if($job_id == 2)

                            <a href="{{route('studentRequests.show'  , $user_id)}}">
                                <button type="button" class="btn btn-xs btn-outline-success float-right">
                                    View User
                                </button>
                            </a>

                        @endif

                        @if($job_id == 3)



                        @endif

                    </div>
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
        })

    </script>

@endsection
