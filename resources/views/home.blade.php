@extends('layouts.main_layout')

@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col">

                <h3 class="my-3">Work list</h3>
                <hr>
                <div class="my-3">
                    <a href="{{route('new_task')}}" class="btn btn-primary">Create New Task...</a>
                    <a href="{{route('list_invisibles')}}" class="btn btn-primary">List Invisible Tasks</a>
                </div>
                <hr>

                @if ($tasks->count() == 0)
                    <p>Não existem tarefas a realizar.</p>
                @else
                    <table class="table table-striped">
                        <thead class="thead-dark">
                            <tr>
                                <th>Tasks</th>
                                <th class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tasks as $task)
                                <tr>
                                    <td style="width: 70%">{{$task->task}}</td>
                                    <td class="text-center">
                                        {{-- Done / Not done --}}
                                        @if ($task->done == null)
                                            <a href="{{route('task_done', ['id' => $task->id])}}" class="btn btn-primary btn-sm"><i class="fa fa-cog"></i></a>
                                        @else
                                            <a href="{{route('task_undone', ['id' => $task->id])}}" class="btn btn-success btn-sm"><i class="fa fa-check"></i></a>
                                        @endif

                                        {{-- Edit --}}
                                        @if (!$task->done == null)
                                            <a href="" class="btn btn-secondary btn-sm"><i class="fa fa-pencil"></i></a>
                                        @else
                                            <a href="{{route('edit_task', ['id' => $task->id])}}" class="btn btn-secondary btn-sm"><i class="fa fa-pencil"></i></a>     
                                        @endif

                                        {{-- Visible / Invisible --}}
                                        @if ($task->visible == 1)
                                            <a href="{{route('task_invisible', ['id' => $task->id])}}" class="btn btn-warning btn-sm"><i class="fa fa-eye-slash"></i></a>
                                        @else
                                            <a href="{{route('task_visible', ['id' => $task->id])}}" class="btn btn-warning btn-sm"><i class="fa fa-eye"></i></a>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <hr>
                    <h6 class="ml-3">Total de tarefas a realizar: <strong>{{$tasks->count()}}</strong></h6>
                @endif
            </div>
        </div>
    </div>

@endsection