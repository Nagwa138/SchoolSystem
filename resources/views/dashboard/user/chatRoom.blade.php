@extends('layouts.app')


@section('content')

    <!----  start container -->

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-11">
                <div class="card">
                    <div class="card-header">
                        <a href="">
                            <button type="button" class="btn btn-xs btn-primary">
                                Back
                            </button>
                        </a>
                        <img src="https://cnet2.cbsistatic.com/img/-e95qclc6pwSnGE2YccC2oLDW_8=/1200x675/2020/04/16/7d6d8ed2-e10c-4f91-b2dd-74fae951c6d8/bazaart-edit-app.jpg" width="50" height="50" style="border-radius: 50px;margin-left: 20px">
                        <span style="font-size:20px;">{{$friend->name}}
                            @if($friend->job_id == 0)   ( admin ) @endif
                            @if($friend->job_id == 1)   ( parent ) @endif
                            @if($friend->job_id == 2)   ( studnt ) @endif
                            @if($friend->job_id == 3)   ( employee ) @endif
                        </span>
                    </div>
                    <div class="card-body row justify-content-center align-items-center">
                        <div class="col-md-10 ">
                            <div class="about-box" style="height:auto;overflow:hidden;">
                                <div class="flex-column col-md-12" style="overflow-y:scroll;height:58vh;">
                                    @foreach($msgs as $msg)
                                        @if($msg->receiver == Auth::user()->id)
                                            @if($msg->sender == $friend->id)
                                    <div class="col-md-8 send bg-warning float-left" style="padding:15px;border-radius:10px">
                                        {{$msg->msg}}
                                    </div>
                                                <br><br><br>
                                            @endif
                                        @endif

                                            @if($msg->sender == Auth::user()->id)
                                                @if($msg->receiver == $friend->id)
                                    <div class="col-md-8 receive bg-primary text-light float-right" style="padding:15px;border-radius:10px">
                                        {{$msg->msg}}
                                    </div>
                                                    <br><br><br>

                                                @endif
                                            @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>

                    </div>
                    <div id="options" class="card-footer">
                        <form method="post" action="{{route('chats.store')}}">
                            @csrf

                            <input type="hidden" name="receiver" value="{{$friend->id}}">
                            <input type="hidden" name="sender" value="{{Auth::user()->id}}">
                            <div class="form-group row justify-content-center">
                                <div class="col-md-9">
                                    <input id="msg" type="text"  class="form-control @error('msg') is-invalid @enderror" name="msg" value="{{ old('msg') }}" placeholder="Type ..." required autocomplete="msg" autofocus>

                                    @error('msg')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="col-md-2 ">
                                    <button type="submit" class="btn btn-primary">
                                        Send
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!----  end container -->


@endsection
