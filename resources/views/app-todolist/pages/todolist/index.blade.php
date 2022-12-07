@extends('app-todolist.layouts.todolist')

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <div class="card-title">Todo List</div>
            <a href="{{ route('todolist.create') }}" class="btn btn-primary btn-sm">Add New Todo</a>
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Item Name</th>
                        <th>Created At</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->created_at->format('d M Y H:i') }}</td>
                            <td width="200px">
                                <a href="{{ route('todolist.show', $item) }}" class="btn btn-sm btn-dark">Detail</a>
                                <a href="{{ route('todolist.edit', $item) }}" class="btn btn-sm btn-warning">Edit</a>
                                <form style="display: unset;" action="{{ route('todolist.destroy', $item) }}" method="post" onsubmit="return confirm('sure you want to delete this?')">
                                    @csrf @method("delete")
                                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
