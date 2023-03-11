<x-layout>
    <div class="pt-5 pb-0 section">
        <div class="container">
            <div class="row justify-content-center mb-5">
                <div class="col-lg-7 text-center">
                    <h2 class="heading">Latest Blogs</h2>
                </div>
            </div>
        </div>
    </div>
    <div>
        <div class="container">
            <div class="row">
                @if (count($blogs) == 0 && !Auth::check())
                    <h1 class="no-blogs">There are no blogs, please login and post your own blogs.</h1>
                @elseif(count($blogs) == 0 && Auth::check())
                    <h1 class="no-blogs">There are no blogs, please post your own blogs.</h1>
                @else
                    @foreach ($blogs as $blog)
                        @php
                            $user = App\Models\User::where('id', $blog->user_id)->first();
                        @endphp
                        <div class="col-lg-4 mb-5">
                            <div class="post-entry d-block">
                                <div class="thumbnail">
                                    <a href="/blogs/{{ $blog->id }}">
                                        <img src="{{ $blog->banner ? asset('storage/' . $blog->banner) : asset('image/no-photo-available.png') }}"
                                            alt="blog-image" class="img-fluid" />
                                    </a>
                                </div>
                                <div class="content">
                                    <h2 class="content-head mb-3">{{ $blog->title }}</h2>
                                    <p class="content-sub">{{ $blog->sub_title }}</p>
                                    <a class="d-flex align-items-center" style="text-decoration: none">
                                        <div class="author-pic">
                                            <img src="{{ $user->avatar ? asset('storage/' . $user->avatar) : asset('image/no-image-available.png') }}"
                                                alt="image" class="avatar-pic" />
                                        </div>
                                        <div class="author-name"><strong>
                                                {{ $user->name }}</strong></div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
</x-layout>
