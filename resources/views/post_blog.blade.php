<x-layout>
    <h1 class="text-center mt-5">Create your blog</h1>
    <section class="w-100 p-4 d-flex justify-content-center pb-4">
        <form class="post_form" enctype="multipart/form-data" method="POST" action="{{ url('/create_blog') }}">
            @csrf
            <div class="mb-4">
                <h5>Title</h5>
                <input type="text" class="form-control" placeholder="title" name="title"
                    value="{{ old('title') }}" />
                @error('title')
                    <p class="error-text">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <h5>Sub Title</h5>
                <input type="text" class="form-control" placeholder="sub title" name="sub_title" />
            </div>
            <div class="mb-4">
                <h5>Banner Photo</h5>
                <input type="file" class="form-control" style="padding: 0.375rem 0.375rem;" name="banner" />
                <p class="avatar-upload">(Please upload the image lower than 2MB)</p>
                @error('banner')
                    <p class="error-text">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <h5>Blog Description</h5>
                <textarea class="form-control" rows="5" name="description">{{ old('description') }}</textarea>
                @error('description')
                    <p class="error-text">{{ $message }}</p>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary btn-block">Create Blog</button>
        </form>
    </section>
</x-layout>
