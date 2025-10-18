<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Add News</title>
    @vite(['resources/js/app.tsx'])
</head>
<body>
<div class="container my-4">
    <h1 class="text-primary mb-4">Add New News</h1>
    <form id="addNewsForm" enctype="multipart/form-data" method="POST" action="{{ route('news.store') }}">
        @csrf
        
        <div class="row mb-3 align-items-center text-primary">
            <div class="col-md-3">
                <label for="header" class="form-label fs-4">Header</label>
            </div>
            <div class="col-md-9">
                <input type="text" class="form-control" id="header" name="header" required>
            </div>
        </div>

        <div class="row mb-3 align-items-center text-primary">
            <div class="col-md-3">
                <label for="shortText" class="form-label fs-4">Short Text</label>
            </div>
            <div class="col-md-9">
                <input type="text" class="form-control" id="shortText" name="shortText" required>
            </div>
        </div>

        <div class="row mb-3 align-items-start text-primary">
            <div class="col-md-3">
                <label for="article" class="form-label fs-4">Article</label>
            </div>
            <div class="col-md-9">
                <textarea class="form-control" id="article" name="article" rows="4" required></textarea>
            </div>
        </div>

        <div class="row mb-3 align-items-center text-primary">
            <div class="col-md-3">
                <label class="form-label fs-4">Upload Image</label>
            </div>
            <div class="col-md-9">
                <input type="file" class="form-control" id="image" name="image" accept="image/*" required>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-md-3">
                <button type="submit" class="btn btn-primary w-100">Add News</button>
            </div>
            <div class="col-md-3">
                <a href="{{ url('/') }}" class="btn btn-secondary w-100">Back to news list</a>
            </div>
        </div>
    </form>
</div>
</body>
</html>