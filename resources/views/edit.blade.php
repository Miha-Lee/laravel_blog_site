<x-layout>
    <h1 class="text-center mt-5">Edit your blog</h1>
    <section class="w-100 p-4 d-flex justify-content-center pb-4">
        <form class="post_form" enctype="multipart/form-data" method="POST" action="/update_blog/{{ $blog->id }}">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <h5>Title</h5>
                <input type="text" class="form-control" placeholder="title" name="title"
                    value="{{ $blog->title }}" />
                @error('title')
                    <p class="error-text">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <h5>Sub Title</h5>
                <input type="text" class="form-control" placeholder="sub title" name="sub_title"
                    value="{{ $blog->sub_title }}" />
            </div>
            <div class="mb-4">
                <h5>Banner Photo</h5>
                <input type="file" class="form-control mb-3" style="padding: 0.375rem 0.375rem;" name="banner" />
                @if ($blog->banner)
                    <img src="{{ asset('storage/' . $blog->banner) }}" alt="banner" class="img-fluid" />
                @endif
                @error('banner')
                    <p class="error-text">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <h5>Blog Description</h5>
                <textarea class="form-control" rows="5" name="description">{{ $blog->description }}</textarea>
                @error('description')
                    <p class="error-text">{{ $message }}</p>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary btn-block">Edit Blog</button>
        </form>
    </section>
</x-layout>
