<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MK blog site</title>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"
        integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js"
        integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous">
    </script>
    <script src="//unpkg.com/alpinejs" defer></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
</head>

<body>
    <nav class="navbar navbar-expand-xl navbar-dark bg-dark">
        <a href="{{ url('/') }}" class="navbar-brand">
            MK<b>Blog Site</b>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse"
            aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div id="navbarCollapse" class="navbar-collapse collapse justify-content-start">
            <div class="navbar-nav ml-auto align-items-center">
                <a href="{{ url('/') }}" class="nav-item nav-link">Home</a>
                @if (Auth::check())
                    <a href="{{ url('/post_blog') }}" class="nav-item nav-link">Post a blog</a>
                @endif
                <a href="{{ url('/all_blogs') }}" class="nav-item nav-link">All blogs</a>
                @if (Auth::check())
                    <a href="{{ url('/blogs/edit/delete') }}" class="nav-item nav-link">My Blogs</a>
                    <div class="nav-item dropdown">
                        <a href="#" data-toggle="dropdown" class="nav-item nav-link dropdown-toggle user-action"
                            aria-expanded="false">
                            <img src="{{ Auth::user()->avatar ? asset('storage/' . Auth::user()->avatar) : asset('image/no-image-available.png') }}"
                                alt="Avatar" class="avatar" />
                            {{ Auth::user()->name }}
                            <b class="caret"></b>
                        </a>
                        <div class="dropdown-menu">
                            <a href="{{ url('/edit_profile') }}" class="dropdown-item">
                                Edit Profile
                            </a>
                            <form method="POST" action="{{ url('/logout') }}" class="dropdown-item">
                                @csrf
                                <button class="logout-btn">Logout</button>
                            </form>
                        </div>
                    </div>
                @else
                    <a href="{{ url('/register') }}" class="nav-item nav-link">Register</a>
                    <a href="{{ url('/login') }}" class="nav-item nav-link">Login</a>
                @endif
            </div>
        </div>
    </nav>
    <x-flash_message></x-flash_message>
    {{ $slot }}
</body>
<html>
