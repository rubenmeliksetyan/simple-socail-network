@extends('layouts.app')

@section('content')
    <div class="d-flex user-profile-container" id="content">
        <div class="col-xl-3">
            <div class="card">
                @include('profile.components.user', [$isAuthUser = false])
            </div>
        </div>
        <div class="col-xl-6">
            @include('post.components.feed')
        </div>

        <div class="col-xl-3">
            <div class="card">
               @include('profile.components.notifications',[$showSeeAll = true])
            </div>
        </div>
    </div>

@endsection
@push('scripts')
    <script src="{{ mix('/js/pages/profile.js') }}" ></script>
    <script type="text/javascript">
        new social.ProfilePageManger({
            elements: {
                pageContainer: $('#content'),
            },
        });
    </script>

@endpush
