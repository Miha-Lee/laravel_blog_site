<x-layout>
    <div class="login-page">
        <div class="form-page">
            <form class="register-form" method="POST" action="{{ url('/login') }}">
                @csrf
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
                <button type="submit">Login</button>
                <p>Not registered? <a href="{{ url('/register') }}">Create an account</a></p>
            </form>
        </div>
    </div>
</x-layout>
