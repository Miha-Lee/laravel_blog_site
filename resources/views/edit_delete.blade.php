<x-layout>
    <div class="mt-5">
        <div class="container">
            <div class="row">
                @if (count($blogs) == 0)
                    <h1 class="no-blogs">There are no blogs to Edit / Update.</h1>
                @else
                    @foreach ($blogs as $blog)
                        <div class="col-lg-4 mb-5">
                            <div class="post-entry d-block">
                                <div class="thumbnail">
                                    <a>
                                        <img src="{{ $blog->banner ? asset('storage/' . $blog->banner) : asset('image/no-photo-available.png') }}"
                                            alt="blog-image" class="img-fluid" />
                                    </a>
                                </div>
                                <div class="content">
                                    <h2 class="content-head mb-3">{{ $blog->title }}</h2>
                                    <p class="content-sub">{{ $blog->sub_title }}</p>
                                </div>
                            </div>
                            <a href="/edit_blog/{{ $blog->id }}" class="btn btn-primary">Edit</a>
                            <form action="/delete_blog/{{ $blog->id }}" method="POST" class="form-ib">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
</x-layout>
