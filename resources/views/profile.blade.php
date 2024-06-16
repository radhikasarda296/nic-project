<div class="container">
@extends("layouts.layout")
    @section("title", "Profile Page")
    @section("content")
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <h2 class="text-center">Profile</h2>
                <form class="form-horizontal" method="post" action="{{ route('profile') }}">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" id="name" name="name" value="{{ auth()->user()->name }}" class="form-control">
                        @error("name")
                        <div class="error">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" id="email" name="email" value="{{ auth()->user()->email }}" class="form-control" disabled>
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone:</label>
                        <input type="tel" id="phone" name="phone" value="{{ auth()->user()->phone }}" class="form-control">
                        @error("phone")
                        <div class="error">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group text-center">
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
</div>
@endsection
