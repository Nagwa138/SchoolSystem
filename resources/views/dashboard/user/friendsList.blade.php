@extends('layouts.app')


@section('content')

    <!----  start container -->

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-11">
                <div class="card">
                    <div class="card-header">
                        <span style="font-size:20px;">{{Auth::user()->name}} @if(Auth::user()->job_id == 0)   ( admin ) @endif</span>
                        <a href="{{route('friends.create')}}">
                            <button type="button" class="btn btn-xs btn-primary float-right">
                                New Message
                            </button>
                        </a>
                    </div>

                    <div class="card-body row justify-content-center align-items-center">
                        <div class="col-md-10 ">
                            <div class="about-box">
                                <table class="table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>
                                                Chats
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($friends  as $friend)
                                    <tr>
                                        <td>
                                            <img src="https://cnet2.cbsistatic.com/img/-e95qclc6pwSnGE2YccC2oLDW_8=/1200x675/2020/04/16/7d6d8ed2-e10c-4f91-b2dd-74fae951c6d8/bazaart-edit-app.jpg" width="70" height="70" style="border-radius: 50px">
                                        </td>
                                        <td>


                                            <a href="{{route('chats.edit' ,$friend->user2)}}" style="cursor: pointer;color: black"><span style="font-size:15px;"> <b>
                                                         @foreach($users as $user)
                                                             @if($user->id == $friend->user2)
                                                                {{$user->name}}
                                                                <span class=" text-light" style="padding: 0 6px ;border-radius: 20px;background-color: red">0</span>
                                                            @if($user->job_id == 0)   ( admin ) @endif
                                                                @if($user->job_id == 1)   ( parent ) @endif
                                                                @if($user->job_id == 2)   ( studnt ) @endif
                                                                @if($user->job_id  == 3)   ( employee ) @endif
                                                            @endif
                                                        @endforeach


                                                    </b></span> <br> </a>

                                        </td>
                                    </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                    <div id="options" class="card-footer">

                    </div>
                </div>
            </div>
        </div>
    </div>


    <!----  end container -->


@endsection
