@extends('layouts.app-master')

@section('content')
    <div class="bg-light p-4 rounded">
        <h2>Categories</h2>
        <div class="lead mb-5">
            <a href="{{ route('categories.create') }}" class="btn btn-primary btn-sm float-right">Add Categories</a>
        </div>
        
        <div class="mt-2">
            @include('layouts.partials.messages')
        </div>

        <table class="table table-bordered">
          <tr>
             <th width="1%">No</th>
             <th>Name</th>
             <th width="3%" colspan="3">Action</th>
          </tr>
          @foreach ($categories as $key => $category)
          <tr>
              <td>{{ $category->id }}</td>
              <td>{{ $category->name }}</td>
              <td>
                  <a class="btn btn-primary btn-sm" href="{{ route('categories.edit', $category->id) }}">Edit</a>
              </td>
              <td>
                  {!! Form::open(['method' => 'DELETE','route' => ['categories.destroy', $category->id],'style'=>'display:inline']) !!}
                  {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
                  {!! Form::close() !!}
              </td>
          </tr>
          @endforeach
        </table>

        {{-- <div class="d-flex">
            {!! $categories->links() !!}
        </div> --}}

    </div>
@endsection