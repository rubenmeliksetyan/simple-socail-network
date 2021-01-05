<div class="card-body">
    <div class="user-details">
        <a class="user-details" href="{{ $isAuthUser ? route('profile.edit') : '#' }}">
            <h5 class="card-title user-name">{{ $profileData['user']->name }}</h5>
            <h5 class="card-title user-surname">{{ $profileData['user']->surname }}</h5>
        </a>
        @if(!$isAuthUser)
            <div class="friendship-button">
                @switch($profileData['friendshipStatus'])
                    @case('none')
                    <button id="send_friend_request_btn"
                            data-action="{{ route('friendship.send', ['sender' => auth()->id(), 'receiver' =>  $profileData['user']->id]) }}"
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
                            data-url="{{ route('friendship.unfriend', $profileData['user']->id) }}">
                        {{ __('profile.friends.unfriend') }}
                    </button>
                    @break
                    @case('pending')
                    <span id="pending_friend_request_btn"
                            class="btn-info">{{ __('profile.friends.pending_friend_request') }}
                    </span>
                    <button class="unfriend btn btn-danger"
                            data-url="{{ route('friendship.unfriend', $profileData['user']->id) }}">
                        {{ __('profile.friends.unfriend') }}
                    </button>
                    @break
                @endswitch

            </div>
        @endif

    </div>
    <h5 class="card-text">{{ __('profile.friends.title') }} <a href="#"
                                                               class="">{{ $profileData['approvedFriends']->count() }}</a>
    </h5>
    <div class="user-profile-friends">
        @foreach($profileData['approvedFriends'] as $friend)
            <div class="approved-friend">
                <a href="{{ route('profile.show', $friend->id) }}">
                    <h5>{{ $friend->name }}</h5>
                    <h5>{{ $friend->surname }}</h5>
                </a>
            </div>
        @endforeach

    </div>
</div>
