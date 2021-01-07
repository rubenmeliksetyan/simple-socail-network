@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('posts.create.page_title') }}</div>

                    <div class="card-body">
                        <form action="{{ route('post.store', auth()->id()) }}" method="POST">
                            @csrf
                            <div class="form-group">
                                @error('title')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <label for="post_title">{{ __('posts.create.title_label') }}</label>
                                <input type="text" name="title" class="form-control" id="post_title"
                                       placeholder="{{ __('posts.create.title_label') }}" required>

                            </div>

                            <div class="form-group">
                                @error('description')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <label for="post_description">{{ __('posts.create.description_label') }}</label>
                                <textarea class="form-control" name="description" id="post_description" rows="3"></textarea>

                            </div>
                            <div class="form-group">
                                @error('is_visible')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <label for="post_visibility">{{ __('posts.create.post_visibility') }}</label>
                                <select class="form-control" name="is_visible" id="post_visibility" required>
                                    <option value="1">{{ __('posts.create.visibility.visible') }}</option>
                                    <option value="0" selected>{{ __('posts.create.visibility.private') }}</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-info" type="submit">
                                    {{ __('posts.create.submit_button') }}
                                </button>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection