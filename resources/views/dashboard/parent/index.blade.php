@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-11">
                <div class="card">
                    <div class="card-header">Parents</div>

                    <div class="card-body">

                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>
                                    User Name
                                </th>
                                <th>
                                    Father First Name
                                </th>
                                <th>
                                    Mother First Name
                                </th>
                                <th>
                                    Email
                                </th>
                                <th>
                                    Father Phone Number
                                </th>
                                <th>
                                    Mother Phone Number
                                </th>
                                <th>
                                    Number Of Children
                                </th>
                                <th>
                                    Father Notional ID
                                </th>
                                <th>
                                    Edit
                                </th>
                                <th>
                                    Delete
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                                    <tr>
                                        <td>
                                            {{Auth::user()->name}}
                                        </td>
                                        <td>
                                            {{Auth::user()->parent->father_first_name}}
                                        </td>
                                        <td>
                                            {{Auth::user()->parent->mother_first_name}}
                                        </td>
                                        <td>
                                            {{ Auth::user()->parent->email}}
                                        </td>
                                        <td>
                                            {{Auth::user()->parent->father_phone_number}}
                                        </td>
                                        <td>
                                            {{Auth::user()->parent->mother_phone_number}}
                                        </td>
                                        <td>
                                            {{Auth::user()->parent->number_of_children}}
                                        </td>
                                        <td>
                                            {{Auth::user()->parent->father_national_id}}
                                        </td>
                                        <td>
                                            <a href="{{route('parents.edit' , Auth::user()->parent->id)}}" class="btn btn-primary btn-sm">
                                                Edit
                                            </a>
                                        </td>
                                        <td>
                                            <form action="{{route('parents.destroy' , [Auth::user()->parent->id])}}" method="POST">
                                                @method('DELETE')
                                                @csrf
                                                <button type="submit" class="btn btn-dark btn-sm">
                                                    Delete
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
