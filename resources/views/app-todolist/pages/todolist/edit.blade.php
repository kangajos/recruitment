@extends('app-todolist.layouts.todolist')

@section('content')
    <form action="{{ route('todolist.update', $todolist->id) }}" method="post">
        @csrf
        @method("put")
        <div class="card">
            <div class="card-header">Edit Todo</div>
            <div class="card-body">
                <div class="form-group">
                    <label for="" class="mb-1">Task Name</label>
                    <input type="text" name="name" class="form-control" placeholder="Exm: Crud Todolist" value="{{ old('name', $todolist->name) }}" required>
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
