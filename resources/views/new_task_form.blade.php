@extends('layouts.main_layout')

@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col">

                <h3 class="my-3 ml-3">Work list</h3>
                <hr>
                <h4 class="my-3 text-center">New task</h4>
                
                <form action="{{route('new_task_submit')}}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-sm-4 offset-sm-4">
                            <div class="form-group">
                                <label for="text_new_task">New task:</label>
                                <input type="text" name="text_new_task" id="text_new_task" class="form-control">
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