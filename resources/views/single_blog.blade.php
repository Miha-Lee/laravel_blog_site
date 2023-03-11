<x-layout>
    @php
        $user = App\Models\User::where('id', $blog->user_id)->first();
    @endphp
    <div class="single-blog pt-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="text-center">
                        <img src="{{ $user->avatar ? asset('storage/' . $user->avatar) : asset('image/no-image-available.png') }}"
                            alt="image" class="img-fluid rounded-circle mx-auto login-pic" />
                    </div>
                    <span class="d-block text-center mb-5">{{ $user->name }}</span>
                    <h2 class="single-head text-center">{{ $blog->title }}
                    </h2>
                    <p class="single-sub text-center mb-4 grayCol">{{ $blog->sub_title }}</p>
                    <img src="{{ $blog->banner ? asset('storage/' . $blog->banner) : asset('image/no-photo-available.png') }}"
                        alt="banner" class="img-fluid rounded mb-4" />
                    <p class="grayCol">
                        {{ $blog->description }}</p>
                </div>
            </div>
        </div>
    </div>
</x-layout>
