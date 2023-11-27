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
    <link rel="stylesheet" href="/css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Exo+2:ital,wght@0,200;0,500;1,400;1,500;1,700&display=swap" rel="stylesheet">
    <style>
        .container {
            width: 100%;
            margin: 150px auto;
            padding: 20px;
            border-radius: 10px;
            font-family: 'Exo 2', sans-serif;
        }
        body{
            background: url(https://img.freepik.com/premium-vector/comic-templat-background-design-pop-art-illustration_10876-868.jpg?w=2000);
            height: 160vh;
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }
    </style>
    <title>Database Komik</title>
</head>

<body>
    <div class="container mt-5">
        <h1 class="title text-center">Database Komik</h1>
        <div class="data-container container mt-3">
            <a href="/komik/create" class="btn btn-success">Tambah Data</a>
            <a href="/logout" class="btn btn-danger">Logout</a>

            <table class="table table-secondary table-hover table-bordered mt-3">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Gambar</th>
                        <th scope="col">Judul</th>
                        <th scope="col">Penulis</th>
                        <th scope="col">Tanggal Rilis</th>
                        <th scope="col">Genre</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (!$komik) {
                        echo "<tr><td colspan='7' class='text-center'>Data tidak ditemukan</td></tr>";
                    }
                    ?>
                    <?php $i = 1; ?>
                    <?php foreach ($komik as $f) : ?>
                        <tr>
                            <th scope="row"><?= $i++; ?></th>
                            <td><img src="/img/<?= $f['gambar']; ?>" alt="loveincontract" width="150px" height="200px"></td>
                            <td><?= $f['judul']; ?></td>
                            <td><?= ucwords($f['penulis']); ?></td>
                            <td><?= $f['tanggal_rilis']; ?></td>
                            <td><?= $f['genre']; ?></td>
                            <td><a href="/komik/detail/<?= $f['id']; ?>" class="btn btn-primary">Detail</a></td>
                        </tr>
                    <?php endforeach ?>

                </tbody>
            </table>
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