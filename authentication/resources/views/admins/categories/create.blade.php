@extends('admins.layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 mb-3">
            <a href="{{ route('categories.index') }}" class="btn btn-dark">Back</a>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-12">

            <div class="validate">
                @if(Session::has('success'))
                <div class="alert alert-dark">
                    {{ Session::get('success') }}
                    @php
                        Session::forget('success');
                    @endphp
                </div>
                @endif
            </div>

            <div class="card p-5">
                <form action="{{ route('categories.store') }}" method="post">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <input type="text" name="name" class="form-control" value="{{ old('name') }}" placeholder="Category Name">

                        @if ($errors->has('name'))
                        <span class="text-danger">{{ $errors->first('name') }}</span>
                        @endif

                    </div>
                    <div class="form-group">
                        <button class="btn btn-success btn-submit">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
