@extends('layouts.app')

@section('content')
    <div class="d-flex user-profile-container">
        <div class="col-xl-3">
            <div class="card">
                @include('profile.components.user', [$isAuthUser = true])
            </div>
        </div>
        <div class="col-xl-6">
            @include('post.components.feed', [$isAuthUser = false])

        </div>

        <div class="col-xl-3">
            <div class="card">
                @include('profile.components.notifications', [$showSeeAll = true])
            </div>
        </div>
    </div>
@endsection
