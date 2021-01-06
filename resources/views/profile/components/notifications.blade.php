<div class="profile-friend-top" id="notifications_page_container">
    <div class="">
        <div class="col-md-8">
            <div class="profile-friends-title {{ $showSeeAll ? '' : "justify-content-center" }}">
                <h5>{{ __('profile.friends.pending_friend_requests') }}</h5>
            </div>
        </div>
        @if($showSeeAll)
            <div class="text-md-right">
                <a href="{{ route('notifications') }}">@lang('profile.friends.see_all')</a>
            </div>
        @endif
    </div>
    @if($notifications->count() > 0)
        @foreach($notifications as $notification)
            <div class="user-notification-container d-flex justify-content-between align-items-center p-3">
                <a href="{{ route('profile.show', $notification->data['sender_id']) }}">{{ $notification->data['sender_name'] }}</a>
                <div class="d-inline-flex">
                    <button class="btn btn-danger reject mr-2"
                            data-notification-id="{{ $notification->id }}"
                            data-url="{{
                                    route('friendship.reject', [
                                        'sender' => $notification->data['sender_id'],
                                        'receiver' => auth()->id()
                                        ]) }}">
                        {{ __('profile.friends.reject_friend_request') }}
                    </button>
                    <button class="btn btn-success approve"
                            data-notification-id="{{ $notification->id }}"
                            data-url="{{
                                    route('friendship.approve', [
                                        'sender' => $notification->data['sender_id'],
                                        'receiver' => auth()->id()
                                        ]) }}">
                        {{ __('profile.friends.approved_friend_request') }}
                    </button>
                </div>

            </div>
        @endforeach
    @else
        <p>{{__('profile.friends.no_notifications')}}</p>
    @endif
</div>
@push('scripts')
    <script src="{{ mix('/js/pages/notifications.js') }}" ></script>
    <script type="text/javascript">
        new social.NotificationPageManger({
            elements: {
                pageContainer: $('#notifications_page_container'),
            },
        });
    </script>

@endpush

