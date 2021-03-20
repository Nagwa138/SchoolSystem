@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-11">
                <div class="card">
                    <div class="card-header">Parents
                        <br>



                        <a href="{{url('parent/getBlocked')}}" >
                            <button type="button" style="margin-left:10px" class="btn btn-xs btn-dark float-right">
                                Blocked Parents
                            </button>
                        </a>
                        <a href="{{route('modificationRequests.index')}}">
                            <button type="button" class="btn btn-xs btn-light text-dark btn-outline-info float-right"  style="margin: 0 5px">
                                Pending Requests
                                <span class=" text-light" style="padding: 0 6px ;border-radius: 20px;background-color: red">0</span>
                            </button>
                        </a>
                        <a href="{{route('parentRequests.index')}}">
                            <button type="button" class="btn btn-xs btn-primary float-right">
                                Join Requests
                                <span class=" text-light" style="padding: 0 6px ;border-radius: 20px;background-color: red">0</span>

                            </button>
                        </a>
                    </div>

                    <div class="card-body">
                        <table id="parents_table" class="table table-hover table-striped details-control">

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('script')
    <script>
        $(document).ready(function(){
            $('#parents_table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{url('getAddEditRemoveColumnDataParent')}}',
                columns: [
                    {
                        "className":      'details-control',
                        "orderable":      false,
                        "searchable":      false,
                        "data":           null,
                        "defaultContent": ''
                    },
                    {data: 'id', name: 'id'},
                    {data: 'name', name: 'name'},
                    {data: 'email', name: 'email'},
                    {data: 'action', name: 'action', orderable: true, searchable: true},
                ], order: [[1, 'asc']]
            });
        })
    </script>

@endsection

