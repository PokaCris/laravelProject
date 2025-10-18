<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <title>Edit: {{ $newsItem['title'] }}</title>
    @vite(['resources/js/app.tsx'])
</head>

<body>
    <div class="container my-4 p-3">
        <h1 class="mb-4 text-primary">Edit News</h1>

        @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form action="{{ route('news.update', $newsItem['id']) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="row mb-3 align-items-center text-primary">
                <div class="col-md-3">
                    <label for="title" class="form-label fs-4">Title</label>
                </div>
                <div class="col-md-9">
                    <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $newsItem['title']) }}" required>
                </div>
            </div>

            <div class="row mb-3 align-items-center text-primary">
                <div class="col-md-3">
                    <label for="content" class="form-label fs-4">Content</label>
                </div>
                <div class="col-md-9">
                    <textarea class="form-control" id="content" name="content" rows="5" required>{{ old('content', $newsItem['content']) }}</textarea>
                </div>
            </div>

            <div class="row mb-3 align-items-center text-primary">
                <div class="col-md-3">
                    <label for="image" class="form-label fs-4">Image</label>
                </div>
                <div class="col-md-9">
                    <input type="file" class="form-control" id="image" name="image">
                </div>
            </div>

            <div class="row mb-3 align-items-center text-primary">
                <div class="col-md-3">
                    <p class="fs-4">Current image:</p>
                </div>
                <div class="col-md-3">
                    <img src="data:image/jpeg;base64,{{ base64_encode($newsItem['image']) }}" alt="{{ $newsItem['title'] }}" style="max-height: 200px;">
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-md-3">
                    <button type="submit" class="btn btn-primary w-100">Save</button>
                </div>
                <div class="col-md-3">
                    <a href="{{ route('news.show', $newsItem['id']) }}" class="btn btn-secondary w-100">Cancel</a>
                </div>
            </div>

        </form>
    </div>
</body>

</html>