<div class="col-md-12">
    <div class="card">
        <div class="card-header">{{ __('posts.index.page_title') }}</div>

        <div class="card-body" id="posts_content">
            @if(count($posts) > 0)
                @foreach($posts as $post)
                    <div class="post-container mb-2">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between">
                                <div class="post-title d-flex justify-content-between">
                                    <p class="justify-content-between">{{ $post->title }}</p>

                                </div>
                                @if($isAuthUser)
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-secondary dropdown-toggle"
                                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Action
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item"
                                               href="{{  route('post.edit', $post->id) }}">{{ __('posts.edit.edit') }}</a>
                                            <a class="dropdown-item alert-danger delete-post" href="#"
                                               data-url="{{ route('post.destroy', $post->id) }}">{{ __('posts.edit.delete') }}</a>
                                        </div>
                                    </div>
                                @else(!$isAuthUser)
                                    <div>
                                        <p>{{ __('profile.created_by') }}<span class="ml-2">{{ $post->user->name }}</span></p>
                                    </div>
                                @endif
                            </div>
                            <div class="card-body">
                                <div class="post-description">
                                    <p>{{ $post->description }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <p>{{ __('posts.list.no_posts_text') }}</p>
            @endif
            {{ count($posts) > 0 ? $posts->links("pagination::bootstrap-4") : '' }}
        </div>
    </div>
</div>
