@extends('app-todolist.layouts.todolist')

@section('content')
    <form action="{{ route('todolist-detail.update', $todolistDetail->id) }}" method="post">
        @csrf
        @method('put')
        <div class="card">
            <div class="card-header">Edit Todo Item</div>
            <div class="card-body">
                <div class="form-group">
                    <label for="" class="mb-1">Item Name</label>
                    <input type="text" name="name" class="form-control" placeholder="Exm: Crud Todolist"
                        value="{{ old('name', $todolistDetail->name) }}" required>
                    @error('name')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-outline-primary">Submit</button>
                <a href="{{ route('todolist.show', $todolistDetail->todolist_id) }}" class="btn btn-outline-dark">Back</a>
            </div>
        </div>
    </form>
@endsection
