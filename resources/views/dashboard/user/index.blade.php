@extends('layouts.app')


@section('content')

    <!----  start container -->

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-11">
                <div class="card">
                    <div class="card-header">
                        <span style="font-size:20px;">Start New Chat </span>
                        <a href="{{route('friends.index')}}">
                            <button type="button" class="btn btn-xs btn-primary float-right">
                                Back
                            </button>
                        </a>
                    </div>

                    <div class="card-body row justify-content-center align-items-center">
                        <div class="col-md-10 ">
                            <div class="about-box">
                                <div class="card">
                                    <div class="card-header">
                                        <span style="font-size:20px;">Admins</span>
                                    </div>

                                    <div class="card-body row justify-content-center align-items-center">
                                        <div class="col-md-10 ">
                                            <div class="about-box">
                                                <table class="table table-striped table-hover">
                                                    <tbody>
                                                    @foreach ($admins as $admin)
                                                    <tr>
                                                        <td>
                                                            <img src="https://cnet2.cbsistatic.com/img/-e95qclc6pwSnGE2YccC2oLDW_8=/1200x675/2020/04/16/7d6d8ed2-e10c-4f91-b2dd-74fae951c6d8/bazaart-edit-app.jpg" width="70" height="70" style="border-radius: 50px">
                                                        </td>
                                                        <td>
                                                                    <span style="font-size:20px;">
                                                                        <b>
                                                                            {{$admin->name}}
                                                                        </b>
                                                                    </span> <br>
                                                                {{$admin->email}}
                                                        </td>
                                                        <td>
                                                            <a href="{{route('chats.edit' , $admin->id)}}">
                                                                <button type="button" class="btn btn-xs btn-success float-right">
                                                                    Send Message
                                                                </button>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <div class="card">
                                    <div class="card-header">
                                        <span style="font-size:20px;">Parents</span>

                                    </div>

                                    <div class="card-body row justify-content-center align-items-center">
                                        <div class="col-md-10 ">
                                            <div class="about-box">
                                                <table class="table table-striped table-hover">
                                                    <tbody>
                                                    @foreach ($parents as $parent)
                                                        <tr>
                                                            <td>
                                                                <img src="https://cnet2.cbsistatic.com/img/-e95qclc6pwSnGE2YccC2oLDW_8=/1200x675/2020/04/16/7d6d8ed2-e10c-4f91-b2dd-74fae951c6d8/bazaart-edit-app.jpg" width="70" height="70" style="border-radius: 50px">
                                                            </td>
                                                            <td>
                                                                    <span style="font-size:20px;">
                                                                        <b>
                                                                            {{$parent->name}}
                                                                        </b>
                                                                    </span> <br>
                                                                {{$parent->email}}
                                                            </td>
                                                            <td>
                                                                <a href="{{route('chats.edit' , $parent->id)}}">
                                                                    <button type="button" class="btn btn-xs btn-success float-right">
                                                                        Send Message
                                                                    </button>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header">
                                        <span style="font-size:20px;">Students </span>

                                    </div>

                                    <div class="card-body row justify-content-center align-items-center">
                                        <div class="col-md-10 ">
                                            <div class="about-box">
                                                <table class="table table-striped table-hover">
                                                    <tbody>
                                                    @foreach ($students as $student)
                                                        <tr>
                                                            <td>
                                                                <img src="https://cnet2.cbsistatic.com/img/-e95qclc6pwSnGE2YccC2oLDW_8=/1200x675/2020/04/16/7d6d8ed2-e10c-4f91-b2dd-74fae951c6d8/bazaart-edit-app.jpg" width="70" height="70" style="border-radius: 50px">
                                                            </td>
                                                            <td>
                                                                    <span style="font-size:20px;">
                                                                        <b>
                                                                            {{$student->name}}
                                                                        </b>
                                                                    </span> <br>
                                                                {{$student->email}}
                                                            </td>
                                                            <td>
                                                                <a href="{{route('chats.edit' , $student->id)}}">
                                                                    <button type="button" class="btn btn-xs btn-success float-right">
                                                                        Send Message
                                                                    </button>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>


    <!----  end container -->


@endsection
