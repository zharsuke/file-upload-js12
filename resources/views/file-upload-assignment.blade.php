<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- <link href="/css/bootstrap.min.css" rel="stylesheet"> --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-3">
        <h2>Image Upload</h2>
        <hr>
        <form action="{{ url('/file-upload-assignment') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="berkas" class="form-label">Nama Gambar</label>
                <input type="text" class="form-control" id="nama_berkas" name="nama_berkas">
                @error('nama_berkas')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                <br>
                <label for="berkas" class="form-label">Gambar Profile</label>
                <input type="file" class="form-control" id="berkas" name="berkas">
                @error('berkas')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary my-2">Upload</button>
        </form>
    </div>
</body>

</html>
