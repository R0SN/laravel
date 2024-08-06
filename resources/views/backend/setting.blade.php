@extends('layouts.backend_master')
@section('title', 'Settings')
@section('content')
<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Settings Management</h1>

<div class="row">
    <div class="col-12">
        <div class="card mb-4">
            <div class="card-header">
                Website Settings
            </div>
            <div class="card-body">
                @include('backend.includes.flash_message')

                <form action="{{ route('backend.settings.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="website_name">Website Name</label>
                        <input type="text" class="form-control" id="website_name" name="website_name" value="{{ old('website_name', $settings->website_name) }}" required>
                    </div>
                    <div class="form-group">
                        <label for="slogan">Slogan</label>
                        <input type="text" class="form-control" id="slogan" name="slogan" value="{{ old('slogan', $settings->slogan) }}">
                    </div>
                    <div class="form-group">
                        <label for="logo">Logo</label>
                        <input type="file" class="form-control" id="logo" name="logo">
                        @if ($settings->logo)
                            <img src="{{ asset('storage/' . $settings->logo) }}" width="100">
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="favicon">Favicon</label>
                        <input type="file" class="form-control" id="favicon" name="favicon">
                        @if ($settings->favicon)
                            <img src="{{ asset('storage/' . $settings->favicon) }}" width="50">
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="header_logo">Header Logo</label>
                        <input type="file" class="form-control" id="header_logo" name="header_logo">
                        @if ($settings->header_logo)
                            <img src="{{ asset('storage/' . $settings->header_logo) }}" width="100">
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="about_website">About Website</label>
                        <textarea class="form-control" id="about_website" name="about_website">{{ old('about_website', $settings->about_website) }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="about_beer">About Beer</label>
                        <textarea class="form-control" id="about_beer" name="about_beer">{{ old('about_beer', $settings->about_beer) }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="about_bread">About Bread</label>
                        <textarea class="form-control" id="about_bread" name="about_bread">{{ old('about_bread', $settings->about_bread) }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="food_description">Food Description</label>
                        <textarea class="form-control" id="food_description" name="food_description">{{ old('food_description', $settings->food_description) }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="google_map_link">Google Map Link</label>
                        <input type="url" class="form-control" id="google_map_link" name="google_map_link" value="{{ old('google_map_link', $settings->google_map_link) }}">
                    </div>
                    <div class="form-group">
                        <label for="twitter">Twitter</label>
                        <input type="text" class="form-control" id="twitter" name="twitter" value="{{ old('twitter', $settings->twitter_link) }}">
                    </div>
                    <div class="form-group">
                        <label for="github">GitHub</label>
                        <input type="text" class="form-control" id="github" name="github" value="{{ old('github', $settings->github_link) }}">
                    </div>
                    <div class="form-group">
                        <label for="linkedin">LinkedIn</label>
                        <input type="text" class="form-control" id="linkedin" name="linkedin" value="{{ old('linkedin', $settings->linkedin_link) }}">
                    </div>
                    <div class="form-group">
                        <label for="gmail">Gmail</label>
                        <input type="text" class="form-control" id="gmail" name="gmail" value="{{ old('gmail', $settings->gmail_link) }}">
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <input type="checkbox" id="status" name="status" value="1" {{ old('status', $settings->status) ? 'checked' : '' }}>
                    </div>

                    <button type="submit" class="btn btn-primary">Save Settings</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
