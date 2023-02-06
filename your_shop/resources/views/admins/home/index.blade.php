@extends('admins.partial.main')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <h5>{{ Auth::user()->name }}</h5>
            </div>
        </div>
    </div>
</div>
@endsection