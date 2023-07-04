<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
        <div class="container mt-5">
        <h2 class="text-center">Daftar Products</h2>
        <a class="text-center d-block mb-5" href="/create.php">Tambah Artikel</a>    

        <table class="table table-striped mx-auto w-75 text-center" style="overflow-x:auto;">
            <thead>
                <tr class="head mb-3">
                    <th class="head">ID</th>
                    <th class="head">TITLE</th>
                    <th class="head">POST</th>
                    <th class="head">GAMBAR</th>
                    <th class="head">ACTION</th>
                </tr>
            </thead>
            <tbody class="head">

                <?php
               include('koneksi.php');

                if ($conn->connect_error) {
                    die("An error occurred. Please try again.".$conn->connect_error);
                  }
            
                $sql = "SELECT * FROM tabel_produk";
                $result = $conn->query($sql);  

                if (!$result) {
                    die("Invalid query". $conn->connect_error);
                  }
                
                while($row = $result->fetch_assoc()){
                    echo "  
                    <tr>
                    <td>$row[id]</td>
                    <td>$row[title]</td>
                    <td>$row[post]</td>
                    <td><img src='img/$row[image]' width='70' height='90' /></td>
                   
                    <td class='text-center'>
                    <a class='btn btn-primary btn-sm' href='/edit.php?id=$row[id]'>Ubah</a>
                    <a class='btn btn-danger btn-sm' href='/delete.php?id=$row[id]'>Hapus</a>
                    </td>
                    </tr>
                    ";
                }
                ?>
                
            </tbody>
        </table>
        </div>
</body>
</html>