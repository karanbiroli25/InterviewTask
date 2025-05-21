<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Price Distribution</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container">
        <div class="row mt-5">
            @include('probability_message')
            <form action="{{ url('prizes/store') }}" method="post">
                @csrf
                <div class="mb-3 mt-3">
                    <label for="title" class="form-label">Title:</label>
                    <input type="text" value="{{ old('title') }}" class="form-control" id="title" placeholder="Enter title" name="title" required>
                    
                </div>
                <div class="mb-3 mt-3">
                    <label for="Probability" class="form-label">Probability:</label>
                    <input type="text" value="{{ old('probability') }}" class="form-control" id="Probability" placeholder="Enter Probability" name="probability"     required>
                </div>

                <div class="mb-3 mt-3">
                    <button type="submit" class="btn btn-primary">create</button>
                </div>

            </form>
        </div>
    </div>
</body>
</html>