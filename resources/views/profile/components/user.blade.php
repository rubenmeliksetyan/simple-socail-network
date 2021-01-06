<div class="card-body">
    <div class="user-details">
        <a class="user-details" href="{{ $isAuthUser ? route('profile.edit') : '#' }}">
            <h5 class="card-title user-name">{{ $user->name }}</h5>
            <h5 class="card-title user-surname">{{ $user->surname }}</h5>
        </a>
        @if(!$isAuthUser)
            <div class="friendship-button">
                @switch($user->friendshipStatus)
                    @case('none')
                    <button id="send_friend_request_btn"
                            data-action="{{ route('friendship.send', ['sender' => auth()->id(), 'receiver' =>  $user->id]) }}"
                            class="btn btn-info">{{ __('profile.friends.send_friend_request') }}
                    </button>
                    @break
                    @case('rejected')
                    <button id="reject_friend_request_btn"
                            class="btn btn-danger">{{ __('profile.friends.reject_friend_request') }}
                    </button>
                    @break
                    @case('approved')
                    <button class="unfriend btn btn-danger"
                            data-url="{{ route('friendship.unfriend', $user->id) }}">
                        {{ __('profile.friends.unfriend') }}
                    </button>
                    @break
                    @case('pending')
                    <span id="pending_friend_request_btn"
                          class="btn-info">{{ __('profile.friends.pending_friend_request') }}
                    </span>
                    <button class="unfriend btn btn-danger"
                            data-url="{{ route('friendship.unfriend', $user->id) }}">
                        {{ __('profile.friends.unfriend') }}
                    </button>
                    @break
                @endswitch

            </div>
        @endif

    </div>
    <h5 class="card-text">{{ __('profile.friends.title') }} <a
                href="{{ route('profile.friends.list', $isAuthUser ? Auth::id() : $user->id) }}"
                class="">{{ $user->friends->count() }}</a>
    </h5>
    <div class="user-profile-friends">
        @foreach($user->friends->take(config('constants.profile_friends_count')) as $friend)
            <div class="approved-friend">
                <a href="{{ route('profile.show', $friend->id) }}">
                    <h5>{{ $friend->name }}</h5>
                    <h5>{{ $friend->surname }}</h5>
                </a>
            </div>
        @endforeach

    </div>
</div>
