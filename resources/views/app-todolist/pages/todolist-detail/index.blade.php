@extends('app-todolist.layouts.todolist')

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <div class="card-title">Todo Detail</div>
            <a href="{{ route('todolist-detail.create.item', $todolist->id) }}" class="btn btn-primary btn-sm">Add New Todo Item</a>
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($todolist->todolistDetail as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->created_at->format('d M Y H:i') }}</td>
                            <td width="200px">
                                <a href="{{ route('todolist-detail.edit', $item) }}" class="btn btn-sm btn-warning">Edit</a>
                                <form style="display: unset;" action="{{ route('todolist-detail.destroy', $item) }}"
                                    method="post" onsubmit="return confirm('sure you want to delete this?')">
                                    @csrf @method('delete')
                                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            <a href="{{ route('todolist.index') }}" class="btn btn-outline-dark">Back</a>
        </div>
    </div>
@endsection
