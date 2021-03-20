@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-11">
                <div class="card">
                    @if(Session::has('status'))
                        <div class="alert alert-success" role="alert" style="margin: 10px">{{Session::get('status')}}</div>
                    @endif
                    <div class="card-header">Modification Requests

                        <button type="button" id="back" class="btn btn-xs btn-primary float-right">
                            Back
                        </button>
                    </div>

                    <div class="card-body">
                        <table id="requests_table" class="table table-hover table-striped details-control">

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
            $('#back').on('click', function () {
                window.history.go(-1)
            })

            $('#requests_table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{url('getAddEditRemoveColumnDataResetRequests')}}',
                columns: [
                    {
                        "className":      'details-control',
                        "orderable":      false,
                        "searchable":      false,
                        "data":           null,
                        "defaultContent": ''
                    },
                    {data: 'Modification Type', name: 'Modification Type'},
                    {data: 'Name', name: 'Name'},
                    {data: 'E-mail', name: 'E-mail'},
                    {data: 'action', name: 'action', orderable: true, searchable: true},
                ]
            });
        })
    </script>

@endsection

