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
            height: 100vh;
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }
    </style>
    <title>Database Komik</title>
</head>

<body>
    <div class="container mt-3 align-center">
        <h1 class="title text-center">Database Komik</h1>
        <div class="card bg-light mt-3 mb-3" >
            <div class="row g-0">
                <div class="col-md-4">
                    <img src="/img/<?= $komik['gambar']; ?>" class="img-fluid rounded-start" alt="...">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title"><?= $komik['judul']; ?></h5>
                        <p class="card-text"><?= $komik['deskripsi']; ?></p>
                        <p class="card-text"><small class="text-muted"><?= $komik['genre']; ?></small></p>
                        <p class="card-text"><small class="text-muted"><?= $komik['tanggal_rilis']; ?></small></p>
                        <a href="/komik" class="btn btn-primary">Kembali</a>
                        <a href="/komik/edit/<?= $komik['id']; ?>" class="btn btn-secondary">Edit</a>
                        <a href="/komik/delete/<?= $komik['id']; ?>" class="btn btn-danger">Hapus</a>
                    </div>
                </div>
            </div>
        </div>
    </div>




    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
</body>

</html>