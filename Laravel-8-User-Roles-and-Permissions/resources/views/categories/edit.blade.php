@extends('layouts.app-master')

@section('content')
    <div class="bg-light p-4 rounded">
        <h2>Update Category</h2>
        <div class="container mt-4">
            <form method="POST" action="{{ route('categories.update', $category->id) }}">
                @method('patch')
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Category Name</label>
                    <input value="{{ $category->name }}" type="text" class="form-control" name="name" placeholder="Category Name" required>
                    @if ($errors->has('name'))
                        <span class="text-danger text-left">{{ $errors->first('name') }}</span>
                    @endif
                </div>
                <button type="submit" class="btn btn-primary">Save</button>
                <a href="{{ route('categories.index') }}" class="btn btn-dark">Back</a>
            </form>
        </div>

    </div>
@endsection