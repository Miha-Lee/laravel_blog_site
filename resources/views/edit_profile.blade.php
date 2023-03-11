<x-layout>
    <h1 class="text-center mt-5">Edit Profile</h1>
    <section class="w-100 p-4 d-flex justify-content-center pb-4">
        <form class="post_form" enctype="multipart/form-data" method="POST" action="{{ url('/user_update') }}">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <h5>Name</h5>
                <input type="text" class="form-control" placeholder="Name" name="name" value="{{ $user->name }}" />
                @error('name')
                    <p class="error-text">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <h5>Profile Image</h5>
                <input type="file" class="form-control mb-3" style="padding: 0.375rem 0.375rem;" name="avatar" />
                <p class="avatar-upload">(Please upload the image lower than 2MB)</p>
                @if ($user->avatar)
                    <img src="{{ asset('storage/' . $user->avatar) }}" alt="avatar" class="img-fluid" />
                @endif
                @error('avatar')
                    <p class="error-text">{{ $message }}</p>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary btn-block">Edit Profile</button>
        </form>
    </section>
</x-layout>
