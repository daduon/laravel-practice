@extends('layouts.app-master')

@section('content')
    <div class="bg-light p-4 rounded">
        <h2>Posts</h2>
        <div class="lead mb-5">
            <a href="{{ route('posts.create') }}" class="btn btn-primary btn-sm float-right">Add post</a>
        </div>
        
        <div class="mt-2">
            @include('layouts.partials.messages')
        </div>

        <table class="table table-bordered">
          <tr>
             <th width="1%">No</th>
             <th>Name</th>
             <th>User</th>
             <th width="3%" colspan="3">Action</th>
          </tr>
            @foreach ($posts as $key=> $post)
            <tr>
                <td>{{ $key+1 }}</td>
                <td>{{ $post->title }}</td>
                <td>{{ $post->user->username }}</td>
                <td>
                    <a class="btn btn-info btn-sm" href="{{ route('posts.show', $post->id) }}">Show</a>
                </td>
                <td>
                    <a class="btn btn-primary btn-sm" href="{{ route('posts.edit', $post->id) }}">Edit</a>
                </td>
                <td>
                    {!! Form::open(['method' => 'DELETE','route' => ['posts.destroy', $post->id],'style'=>'display:inline']) !!}
                    {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
                    {!! Form::close() !!}
                </td>
            </tr>
            @endforeach
        </table>

        <div class="d-flex">
            {!! $posts->links() !!}
        </div>

    </div>
@endsection