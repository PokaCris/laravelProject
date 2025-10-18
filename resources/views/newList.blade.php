<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>News</title>
    @vite(['resources/js/app.tsx'])
</head>

<body>
    <div class="container my-4">
        <div class="row mb-3">
            <a href="{{ route('news.create') }}" class="btn btn-primary col-3">Add New</a>
            <div class="border-top mt-3 mb-3"></div>
        </div>
        @foreach ($newsList as $news)
        @php
        $firstSentence = explode('.', $news['content'])[0] . '.';
        @endphp
        <div class="row mb-3">
            <div class="col">
                <h2 class="text-primary">{{ $news['title'] }}</h2>

                @if(isset($news['image']))
                <div class="mb-2">
                    <img src="data:image/jpeg;base64,{{ base64_encode($news['image']) }}"
                        alt="{{ $news['title'] }}"
                        class="img-thumbnail"
                        style="max-height: 100px;">
                </div>
                @endif

                <p>{{ $firstSentence }}</p>
                <a href="/news/{{ $news['id'] }}" class="btn btn-primary float-end">Read more</a>
            </div>
            <div class="border-top mt-3 mb-3"></div>
        </div>
        @endforeach
    </div>
</body>

</html>