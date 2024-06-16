<div class="container">
    @extends("layouts.layout")
    @section("title", "Profile Page")
    @section("content")
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <h2 class="text-center">Reset Password</h2>
            <form class="form-horizontal" method="post" action="{{ route('reset-password') }}">
                @csrf
                <div class="form-group">
                    <label for="current_password">Current Password</label>
                    <input id="current_password" type="password" class="form-control @error('current_password') is-invalid @enderror" name="current_password" required autocomplete="current-password">

                    @error('current_password')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="new_password">New Password</label>
                    <input id="new_password" type="password" class="form-control @error('new_password') is-invalid @enderror" name="new_password" required autocomplete="new-password">

                    @error('new_password')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="new_password_confirmation">Confirm New Password</label>
                    <input id="new_password_confirmation" type="password" class="form-control" name="new_password_confirmation" required autocomplete="new-password">
                </div>

                <button type="submit" class="btn btn-primary">Reset Password</button>
            </form>
        </div>
    </div>
</div>
@endsection
