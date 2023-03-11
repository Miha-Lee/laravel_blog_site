<x-layout>
    <div class="login-page">
        <div class="form-page">
            <form class="register-form" enctype="multipart/form-data" action="{{ url('/users') }}" method="POST">
                @csrf
                <label for="name">Name:</label>
                <input type="text" placeholder="name" id="name" name="name" value="{{ old('name') }}" />
                @error('name')
                    <p class="error-text">{{ $message }}</p>
                @enderror
                <label for="email">Email:</label>
                <input type="email" placeholder="email" id="email" name="email" value="{{ old('email') }}" />
                @error('email')
                    <p class="error-text">{{ $message }}</p>
                @enderror
                <label for="password">Password:</label>
                <input type="password" placeholder="password" id="password" name="password"
                    value="{{ old('password') }}" />
                @error('password')
                    <p class="error-text">{{ $message }}</p>
                @enderror
                <label for="confirm">Confirm Password:</label>
                <input type="password" placeholder="password" id="confirm" name="password_confirmation"
                    value="{{ old('password_confirmation') }}" />
                @error('password_confirmation')
                    <p class="error-text">{{ $message }}</p>
                @enderror
                <label for="avatar">Profile Image:</label>
                <input type="file" id="avatar" name="avatar" />
                <p class="avatar-upload">(Please upload the image lower than 2MB)</p>
                <button type="submit">Register</button>
                <p>Already registered? <a href="{{ url('/login') }}">Sign In</a></p>
            </form>
        </div>
    </div>
</x-layout>
