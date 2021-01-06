@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-11">
                <div class="card">
                    <div class="card-header">Parents Join Requests
                        <br>
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
                ajax: '{{url('getAddEditRemoveColumnParentRequest')}}',
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
