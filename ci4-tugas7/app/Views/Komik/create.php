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
            font-size: 40px;
        }

        .container {
          
            padding: 20px;
            border-radius: 10px;
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
        <h1 class="title text-center">Create Data Komik</h1>
        <div class="create-container bg-light text-dark container mt-3">
            <form action="/komik/save" method="post" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <div class="error">
                    <?php if (isset($validation)) : ?>
                        <div class="alert alert-danger" role="alert">
                            <?= $validation->listErrors(); ?>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="mb-3">
                    <label for="judul" class="form-label">Judul Komik</label>
                    <input type="text" class="form-control" id="judul" name="judul" autofocus required>
                </div>
                <div class="mb-3">
                    <label for="penulis" class="form-label">Penulis</label>
                    <input type="text" class="form-control" id="penulis" name="penulis" required
                    <?php 
                    if (session()->get('level') == '1'){
                        $penulis = session()->get('nama');
                        echo "value='$penulis' readonly";
                    } ?>>
                </div>
                <div class="mb-3">
                    <label for="tanggal_rilis" class="form-label">Tanggal Rilis</label>
                    <input type="date" class="form-control" id="tanggal_rilis" name="tanggal_rilis" required>
                </div>
                <div class="mb-3">
                    <label for="genre" class="form-label">Genre</label>
                    <input type="text" class="form-control" id="genre" name="genre" required>
                </div>
                <div class="mb-3">
                    <label for="gambar" class="form-label">Gambar</label>
                    <input class="form-control" id="gambar" name="gambar" type="file">
                </div>
                <div class="mb-3">
                    <label for="deskripsi" class="form-label">Deskripsi</label>
                    <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3" ></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
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