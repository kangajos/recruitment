@extends('app-todolist.layouts.todolist')

@section('content')
    <form action="{{ route('todolist.store') }}" method="post">
        @csrf
        <div class="card">
            <div class="card-header">Create Todo</div>
            <div class="card-body">
                <div class="form-group">
                    <label for="" class="mb-1">Task Name</label>
                    <input type="text" name="name" class="form-control" placeholder="Exm: Crud Todolist" required>
                    @error('name')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-outline-primary">Submit</button>
                <a href="{{ route('todolist.index') }}" class="btn btn-outline-dark">Back</a>
            </div>
        </div>
    </form>
@endsection
