@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="card col-md-8">
            @include('profile.components.notifications', [$showSeeAll = false])
        </div>
    </div>
@endsection

