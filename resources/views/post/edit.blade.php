@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('posts.create.page_title') }}</div>

                    <div class="card-body">
                        <form action="{{ route('post.update', $post->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                @error('title')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <label for="post_title">{{ __('posts.create.title_label') }}</label>
                                <input type="text" name="title" class="form-control" id="post_title"
                                       placeholder="{{ __('posts.create.title_label') }}" value="{{ $post->title }}" required>

                            </div>

                            <div class="form-group">
                                @error('description')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <label for="post_description">{{ __('posts.create.description_label') }}</label>
                                <textarea class="form-control" name="description" id="post_description" rows="3">{{ $post->description }}</textarea>

                            </div>
                            <div class="form-group">
                                @error('is_visible')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <label for="post_visibility">{{ __('posts.create.post_visibility') }}</label>
                                <select class="form-control" name="is_visible" id="post_visibility" required>
                                    <option value="1" {{ $post->is_visible ? 'selected' : '' }}>{{ __('posts.create.visibility.visible') }}</option>
                                    <option value="0" {{ !$post->is_visible ? 'selected' : '' }}>{{ __('posts.create.visibility.private') }}</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-info" type="submit">
                                    {{ __('posts.edit.submit_button') }}
                                </button>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection