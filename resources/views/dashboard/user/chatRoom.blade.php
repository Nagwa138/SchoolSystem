@extends('layouts.app')


@section('content')

    <!----  start container -->

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-11">
                <div class="card">
                    <div class="card-header">
                        <a href="{{route('friends.index')}}">
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
                                <div id="msgsContainer" class="flex-column col-md-12" style="overflow-y:scroll;height:58vh;">
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
                        <form id="sendMsg">
                            @csrf

                            <input type="hidden" id="receiver" name="receiver" value="{{$friend->id}}">
                            <input type="hidden" id="sender" name="sender" value="{{Auth::user()->id}}">
                            <input type="hidden" id="friend" name="friend" value="{{$friend->id}}">
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

@section('script')
<script>
$(document).ready(function(){


    window.setInterval(function(){
        getMsgs($('#sender').val() , $('#receiver').val() , $('#friend').val());
    }, 5000);
    //SEND MESSAGE BY AJAX

    $('#sendMsg').on('submit' , function(e){
    e.preventDefault();

    $.ajax({
    type: "POST",
    url: "{{route('chats.store')}}",
    data: $('#sendMsg').serialize(),
    success: function(response){
    //alert('Message Send !');
    $('#msg').val('')
        getMsgs($('#sender').val() , $('#receiver').val() , $('#friend').val());
    },
    error: function(error){
    //alert('Data Not send ' + error);
    }
    })
    })

    function getMsgs(sender , receiver , friend){
        $.ajax({
            type: "GET",
            url: "{{url('chat/getMsgs' )}}",
            data: {sender: sender, receiver: receiver, friend: friend},
                success: function (response) {
                    //console.log(response);
                    $('#msgsContainer').html(response);
                    updateScroll();
                },
                error: function (error) {
                    alert('Data Not send ' + error);
                },
            })
    }

    function updateScroll(){
        var element = document.getElementById("msgsContainer");
        element.scrollTop = element.scrollHeight;
    }
    updateScroll();
})
</script>
@endsection
