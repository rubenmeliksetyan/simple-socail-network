@extends('layouts.app')

@section('content')
    <div class="d-flex user-profile-container">
        <div class="col-xl-3">
            <div class="card">
                <div class="card-body">
                    <div class="user-details">
                        <a class="user-details"  href="{{ route('profile.edit') }}">
                            <h5 class="card-title user-name">{{ $profileData['user']->name }}</h5>
                            <h5 class="card-title user-surname">{{ $profileData['user']->surname }}</h5>
                        </a>
                    </div>
                    <h5 class="card-text">{{ __('profile.friends.title') }} <a href="#"
                                   class="">{{ $profileData['approvedFriends']->count() }}</a>
                    </h5>
                    <div class="user-profile-friends">
                        @foreach($profileData['approvedFriends'] as $friend)
                            <div class="approved-friend">
                                <a href="#">
                                    <h5>{{ $friend->name }}</h5>
                                    <h5>{{ $friend->surname }}</h5>
                                </a>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-6">
            <div class="card">
                <h2 class="card-title">{{ __('profile.feed_title') }}</h2>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dicta eveniet fugit tenetur! A adipisci
                aliquid assumenda at, autem commodi consectetur cum cumque delectus, dicta ea eaque eligendi ex
                exercitationem expedita, impedit incidunt ipsam itaque libero maiores natus necessitatibus nisi nobis
                numquam perspiciatis possimus quasi qui quis quo reiciendis rerum sed sequi similique sint sunt suscipit
                voluptatibus. Sit, ut voluptatem? Alias amet asperiores atque corporis, cum ea earum eius eos, ex
                facilis illo ipsam iusto laboriosam libero minus mollitia nihil numquam quae quod rem repellat
                reprehenderit sequi sunt suscipit tempora? Optio!
            </div>
        </div>

        <div class="col-xl-3">
            <div class="card">
                <div class="profile-friend-top">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="profile-friends-title">
                                <h5>{{ __('profile.friends.pending_friend_requests') }}</h5>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="text-md-right">
                                <a href="{{--{{ route('friends.list') }}--}}">@lang('profile.friends.see_all')</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="latest-documents-bottom default-skin" id="dashboard-notification">
                    {{--                @include('friends')--}}
                </div>
            </div>
        </div>
    </div>

@endsection
