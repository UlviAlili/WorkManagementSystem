<div class="card shadow mb-4">
    <div class="card-header py-3">
        <div class="col-md-12">
            <div class="row">

                <div class="col-md-4">
                    <div class="card" style="background-color: #F4F5F7">
                        <div class="card-header" id="status">
                            To Do
                        </div>

                        <div class="card-body AddTask task-scroll" id="orders1">
                            @foreach($project->tasks()->get() as $task)
                                @if($task->status=='Not Started')
                                    @include('admin.task.show')
                                @endif
                            @endforeach
                        </div>

                        @include('admin.task.create')

                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card" style="background-color: #F4F5F7">
                        <div class="card-header">
                            In Progress
                        </div>
                        <div class="card-body task-scroll" id="orders2">

                            @foreach($project->tasks()->get() as $task)
                                @if($task->status=='In Progress')
                                    @include('admin.task.show')
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card" style="background-color: #F4F5F7">
                        <div class="card-header">
                            Done
                        </div>
                        <div class="card-body task-scroll" id="orders3">
                            @foreach($project->tasks()->get() as $task)
                                @if($task->status=='Done')
                                    @include('admin.task.show')
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
