@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-11">
                <div class="card">
                    <div class="card-header">Levels
                        <br>
                        <a href="{{route('levels.create')}}">
                            <button type="button" class="btn btn-xs btn-primary float-right">
                                Add
                            </button>
                        </a>
                    </div>

                    <div class="card-body">
                        <table id="stage_table" class="table table-hover table-striped details-control">

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
            $('#stage_table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{url('getAddEditRemoveColumnDataLevel')}}',
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
                    {data: 'action', name: 'action', orderable: false, searchable: false}
                ], order: [[1, 'asc']]
            });
        })
    </script>

@endsection

