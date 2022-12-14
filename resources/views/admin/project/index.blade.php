@extends('layouts.master')
@section('title','All Projects')
@section('content')

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold float-right text-primary">
                <a href="{{route('admin.projects.trash')}}" class="btn btn-warning btn-sm">
                    Trash &nbsp;<i class="fa fa-trash"></i></a>
                <a href="{{route('admin.project.create')}}" class="btn btn-primary btn-sm">Create New Project</a>
            </h6>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="indexProject" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>Project Name</th>
                        <th>Status</th>
                        <th>Project Member's Count</th>
                        <th>Task's Count</th>
                        <th>Created At</th>
                        <th>Operations</th>
                    </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>

@endsection

@section('js')
    <script>
        $(document).ready(function () {
            $('#indexProject').DataTable({
                processing: true,
                serverSide: true,
                order: [[4, 'desc']],
                ajax: '{{route('admin.project.index.dataTable')}}',
                columns: [
                    {data: "name"},
                    {data: "status"},
                    {data: "user"},
                    {data: "task"},
                    {data: "created_at"},
                    {data: "operations"}
                ]
            });
        });

        $(function () {
            $(document).on('submit', '.FrmDeleteProject', function (e) {
                e.preventDefault();
                let userUrl = $(this).data('url');
                let parentTr = $(this).parent().closest('tr');
                if (confirm("Do you want to move to trash this project?")) {
                    $.ajax({
                        url: userUrl,
                        type: 'DELETE',
                        data: {_token: '{{csrf_token()}}'},
                        success: function (response) {
                            toastr.options =
                                {
                                    "closeButton": true,
                                    "progressBar": true
                                }
                            toastr.success(response.message);
                            parentTr.remove();
                        },
                    });
                }
            });
        });

    </script>
@endsection
