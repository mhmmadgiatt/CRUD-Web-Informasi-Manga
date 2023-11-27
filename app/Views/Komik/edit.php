<!-- 
    Nama        : Muhammad Giat
    NPM         : 140810210013
    Tanggal     : 9 November 2022
    Deskripsi   : Web CRUD CI 4
 -->
 
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Exo+2:ital,wght@0,200;0,500;1,400;1,500;1,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/css/style.css">
    <style>
        .title {
            font-family: 'Exo 2', sans-serif;
            font-weight: 500;
        }

        .container{
            font-family: 'Exo 2', sans-serif;
        }

        body{
            background: url(https://img.freepik.com/premium-vector/comic-templat-background-design-pop-art-illustration_10876-868.jpg?w=2000);
            height: 150vh;
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }
    </style>
    <title>Database Komik</title>
</head>

<body>
    <div class="container mt-5">
        <h1 class="title text-center">Edit Data Komik</h1>
        <div class="create-container bg-light text-dark container mt-3">
            <form action="/komik/update/<?= $komik['id']; ?>" method="post" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <div class="mb-3">
                    <label for="judul" class="form-label">Judul Komik</label>
                    <input type="text" class="form-control" id="judul" name="judul" autofocus required value="<?= $komik['judul'] ?>">
                </div>
                <div class="mb-3">
                    <label for="penulis" class="form-label">Penulis</label>
                    <input type="text" class="form-control" id="penulis" name="penulis" required value="<?= $komik['penulis'] ?>">
                </div>
                <div class="mb-3">
                    <label for="tanggal_rilis" class="form-label">Tanggal Rilis</label>
                    <input type="date" class="form-control" id="tanggal_rilis" name="tanggal_rilis" required value="<?= $komik['tanggal_rilis'] ?>">
                </div>
                <div class="mb-3">
                    <label for="genre" class="form-label">Genre</label>
                    <input type="text" class="form-control" id="genre" name="genre" required value="<?= $komik['genre'] ?>">
                </div>
                <div class="row mb-3">
                    <label for="gambar" class="form-label">Ubah Gambar</label>
                    <div class="row">
                        <div class="col-4">
                            <img src="/img/<?= $komik['gambar'] ?>" class="img-thumbnail img-preview" width="150px" height="200px">
                        </div>
                        <div class="col-8">
                            <input class="form-control" id="gambar" name="gambar" type="file" value="<?= $komik['gambar'] ?>">
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="deskripsi" class="form-label">Deskripsi</label>
                    <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3"><?= $komik['deskripsi'] ?></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>




        <!-- Optional JavaScript; choose one of the two! -->

        <!-- Option 1: Bootstrap Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <script>
            const gambar = document.querySelector('#gambar');
            const imgPreview = document.querySelector('.img-preview');

            gambar.addEventListener('change', function() {
                const file = this.files[0];

                if (file) {
                    const reader = new FileReader();
                    reader.addEventListener('load', function() {
                        imgPreview.src = reader.result;
                    });
                    reader.readAsDataURL(file);
                }
            });
        </script>
</body>

</html>