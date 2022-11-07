<x-layout>
    <div>
        <form method="POST" action="{{ route('images.store') }}" enctype="multipart/form-data">
            @csrf
            <input type="file" class="form-control" name="image" />

            <button type="submit" class="btn btn-sm">Upload</button>
        </form>        
    </div>
    <main>
        @if ($images->count())
            <div>
                @foreach ($images as $image)
                    <a href="{{ asset('img/'.$image->file) }}"><img height="30" src="{{ asset('img/'.$image->file) }}" /></a></br>
                @endforeach
            </div>
        @else
            <p class="text-center">No images yet. Please check back later.</p>
        @endif
    </main>
</x-layout>