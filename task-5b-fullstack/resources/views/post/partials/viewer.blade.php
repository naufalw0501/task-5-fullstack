{{-- menggunakan forelse --}}
@forelse ($posts as $post)
    <div class="mb-4">
        <div class="card">
            {{-- menggunakan attribute takeImage, nama functionnya jadi getTakeImageAttribute, get...Attribute --}}
            {{-- <img src="{{ asset($post->takeImage) }}" class="card-img-top" alt="..."> --}}
           <a href="{{ route("post.show", $post->slug) }}">
                <img src="{{ $post->takeImage }}" class="card-img-top" style="
                    height: 400px;
                    object-fit: cover;
                    object-position: center;
                ">
            </a>

            <div class="card-body">
                <div>
                    <a href="{{ route('categories.show', $post->category->slug) }}">
                        <span class="badge bg-secondary">
                            {{ $post->category->name }}
                        </span>
                    </a>
                    |
                    @foreach($post->tags as $tag)
                        <a href="{{ route('tag.show', $tag->slug) }}">
                            <span class="badge bg-secondary">
                                {{ $tag->name }}
                            </span>
                        </a>
                    @endforeach
                </div>

                <a href="{{ route("post.show", $post->slug) }}" class="card-title font-weight-bold link text-dark">
                    {{ $post->title }}
                </a>
                <div class="card-text my-3 text-secondary">
                    {{-- menampilkan post dengan limit karakter --}}
                    {{ Str::limit($post->body, 130, '') }}
                </div>
                <div class="d-flex justify-content-between align-items-center">
                    <div class="d-flex align-items-center">
                        <img width="32" class="rounded-circle" src="{{ $post->author->gravatar() }}" alt="profile picture">

                        <div class="ml-2">
                            <small>{{ $post->author->name }}</small>
                        </div>
                    </div>
                    <div class="text-secondary">
                        <div>
                            {{-- menampilkan format tanggal --}}
                            <small>Published on {{ $post->created_at->format('d F Y') }}</small>
                        </div>
                        {{-- <div> --}}
                            {{-- menampilkan format kapan terakhir kali diupdate --}}
                            {{-- <small>at {{ $post->created_at->diffForHumans() }}</small> --}}
                        {{-- </div> --}}
                    </div>
                </div>
                {{-- mengubah tulisan englishnya menjadi indonesia ada di config/app cari locale ubah dari en ke id --}}
            </div>
        </div>
    </div>
@empty
    <div class="col">
        <div class="alert alert-primary text-center">There are no Post, Why don't create a new one?!</div>
    </div>
@endforelse
