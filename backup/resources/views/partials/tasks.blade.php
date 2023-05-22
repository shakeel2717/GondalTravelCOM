<div class="form-box dashboard-card">
    <div class="form-title-wrap">
        <h3 class="title">Tasks</h3>
    </div>
    <div class="form-content">
        <div class="row">
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 m-auto ">
                <table class="table">
                    <thead>
                    <tr>
                        <th></th>
                        <th scope="col">Id</th>
                        <th scope="col">Title</th>
                        <th scope="col">Description</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach(\App\Models\Task::where('user_id',auth()->id())->get() as $task)
                        <tr>
                            <th scope="row"><i class="fa fa-plane mr-1 font-size-18"></i>Flight</th>
                            <th scope="row">{{$task->id}}</th>
                            <td>
                                {{$task->title}}
                            </td>
                            <td>
                                {{$task->description}}
                            </td>
                            <td>
                                <div class="table-content">
                                    <form action="{{route('tasks.destroy', $task)}}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit"
                                                class="theme-btn theme-btn-small">Delete
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 m-auto ">
                <form method="post" id="taskForm">
                {{csrf_field() }}
                <!-- --- Display success message ----- -->
                    @if(Session::has('success'))
                        <div class='alert alert-success'>
                            {{ Session::get('success') }}
                            @php
                                Session::forget('success')
                            @endphp
                        </div>
                    @endif
                    <div class="form-group">
                        <label for="task_title"> Task Title </label>
                        <input type="text" class="form-control" name="title" id="task_title" placeholder="Task Title">
                    </div>
                    <div class="form-group">
                        <label for="description"> Description </label>
                        <input type="text" class="form-control" name="description" id="description"
                               placeholder="Description">
                    </div>
                    <button type="button" id="saveBtn" class="btn btn-success float-right">Save Task</button>
                    <br>
                    <br>
                </form>
            </div>
        </div>
        <div id="result"></div>
        @include('partials.alerts')
    </div>
</div><!-- end form-box -->
