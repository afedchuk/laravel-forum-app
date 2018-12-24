@extends('layouts.app')

@section('style')
    <link href="https://cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css" rel="stylesheet">
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="title m-b-md">
                        User Threads
                    </div>
                    <div class="panel-body">
                        Follow to the <a href="{{ url('/threads/create') }}">next link </a>to create a new thread<br/><br/>
                        <table class="table datatable" id="table">
                            <thead class="thead-light">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">User email</th>
                                <th scope="col">Title</th>
                                <th scope="col">Content</th>
                                <th scope="col">Created</th>
                                <th scope="col">Updated</th>
                                <th scope="col">Actions</th>
                            </tr>
                            </thead>
                        </table>
                    </div>
                    <div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
<script src="//code.jquery.com/jquery.js"></script>
<script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script type="text/javascript">
   $(document).ready(function() {
       $('#table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{{ route('dataTable') }}',
            columns: [
                {
                    data: 'id', name: 'id'
                },
                {
                    data: 'user', name: 'users.email'
                },
                {
                    data: 'title', name: 'title'
                },
                {
                    data: 'content', name: 'content'
                },
                {
                    data: 'created_at', name: 'created_at'
                },
                {
                    data: 'updated_at', name: 'updated_at'
                },
                {
                    defaultContent: "",
                    data: "action",
                    name: "action",
                    title: "Action",
                    render: null,
                    orderable: false,
                    searchable: false
                }
            ]
        });
    });
</script>

