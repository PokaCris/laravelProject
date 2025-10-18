<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>{{ $newsItem['title'] }}</title>
    @vite(['resources/js/app.tsx'])
</head>

<body>
    <div class="container my-4 p-3">
        <div class="row mb-3">
            <a href="{{ route('news.edit', $newsItem['id']) }}" class="btn btn-primary col-3">Edit New</a>
            <div class="border-top mt-3 mb-3"></div>
        </div>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        
        <div class="row">
            <h1 class="mb-3 fw-bold text-primary">{{ $newsItem['title'] }}</h1>

            @if(isset($newsItem['image']))
            <div class="mb-4">
                <img src="data:image/jpeg;base64,{{ base64_encode($newsItem['image']) }}"
                    alt="{{ $newsItem['title'] }}"
                    class="img-fluid rounded"
                    style="max-height: 400px;">
            </div>
            @endif

            <p>{!! nl2br(e($newsItem['content'])) !!}</p>
            <a href="{{ url('/') }}" class="btn btn-secondary mt-3 col-3 mx-auto">Back to news list</a>
        </div>
    </div>
</body>

</html>