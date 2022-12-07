@extends('app-todolist.layouts.todolist')

@section('content')
    <form action="{{ route('todolist-detail.store') }}" method="post">
        @csrf
        <input type="hidden" name="todolist_id" value="{{ $todolist->id }}">
        <div class="card">
            <div class="card-header">Create Todo Item</div>
            <div class="card-body">
                <div class="form-group">
                    <label for="" class="mb-1">Item Name</label>
                    <input type="text" name="name" class="form-control" placeholder="Exm: Create Data" required>
                    @error('name')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-outline-primary">Submit</button>
                <a href="{{ route('todolist.show', $todolist->id) }}" class="btn btn-outline-dark">Back</a>
            </div>
        </div>
    </form>
@endsection
