@extends('layouts.app')

@section('content')
    <div class="container" id="content">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('friends.friends.card_header') }}</div>
                    <div class="card-body">
                        @foreach($user->friends as $friend)
                            <div class="friend-container d-flex justify-content-between mt-1">
                                    <h2 >{{ $friend->name }}</h2>
                                    <button class="btn-danger btn unfriend" data-url="{{ route('friendship.unfriend', $friend->id) }}">{{ __('profile.friends.unfriend') }}</button>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script src="{{ mix('/js/pages/profile.js') }}"></script>
    <script type="text/javascript">
        new social.ProfilePageManger({
            elements: {
                pageContainer: $('#content'),
            },
        });
    </script>
@endpush
