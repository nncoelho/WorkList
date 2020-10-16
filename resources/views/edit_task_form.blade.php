@extends('layouts.main_layout')

@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col">

                <h3 class="my-3 ml-3">Work list</h3>
                <hr>
                <h4 class="my-3 text-center">Edit task</h4>
                
                <form action="{{route('edit_task_submit')}}" method="post">
                    @csrf
                    <input type="hidden" name="id_task" value="{{$task->id}}">
                    <div class="row">
                        <div class="col-sm-4 offset-sm-4">
                            <div class="form-group">
                                <label for="text_edit_task">Edit task:</label>
                                <input type="text" name="text_edit_task" id="text_edit_task" class="form-control" value="{{$task->task}}">
                            </div>
                            <div class="form-group">
                                <div class="text-center">
                                    <a href="{{route('home')}}" class="btn btn-secondary" style="width: 120px">Cancel</a>
                                    <input type="submit" value="Save" class="btn btn-primary" style="width: 120px">
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                
            </div>
        </div>
    </div>
    
@endsection