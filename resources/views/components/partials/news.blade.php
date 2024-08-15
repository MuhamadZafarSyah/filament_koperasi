<section class="mt-4 mb-20 no-scrollbar">
    <h1 class="font-munish font-bold text-lg">Cek yang baru di koperasi</h1>
    <div class="w-full">
        @foreach ($news as $new)
            <article class="rounded-xl shadow-md bg-white relative pb-4 mt-8">
                <div class="rounded-xl">
                    <img class="rounded-xl max-h-48 object-cover overflow-hidden w-full"
                        src="/storage/{{ $new->image }}" alt="News - {{ $new->title }}">
                </div>
                <figcaption class="p-2 font-mulish ">
                    <h1 class="text-base font-bold">{{ $new->title }}</h1>
                    <p class="text-xs">{{ $new->content }}</p>
                </figcaption>
            </article>
        @endforeach
    </div>
</section>
