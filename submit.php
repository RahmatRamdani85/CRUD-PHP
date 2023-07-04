<?php
include('koneksi.php');

if (isset($_POST['submit'])) { 

    // $id = $_POST["id"];
    $title = $_POST['title'];
    $post = $_POST['post'];
    $image = $_FILES["image"]['name'];
    $size = $_FILES["image"]['size'];
    $error = $_FILES["image"]['error'];
    $tmpName = $_FILES["image"]['tmp_name'];

    if ($error === 4) {
        echo '<script>
        alert("masukkan gambar dulu mas.e..")
        window.location = "/create.php"
        </script>';
        return false;
     } 

     $ekstensiGbrValid = ['jpg', 'jpeg', 'png', 'gif', "ico", "webp"];
     $ekstensiGbr = explode('.', $image);
     $ekstensiGbr = strtolower(end($ekstensiGbr));

     if (!in_array($ekstensiGbr, $ekstensiGbrValid)) {
        echo '<script>
        alert("File yang dimasukkan bukan gambar loh..")
        window.location = "/create.php"
        </script>';
        return false;
     }

     if ($size > 2000000) {
        echo '<script>
        alert("Ukuran gambar terlalu besar, tidak boleh lebih dari 2 MB..")
        window.location = "/create.php"
        </script>';
        return false;
     }

    move_uploaded_file($tmpName, 'img/'.$image);
      
    $sql = "INSERT INTO tabel_produk(title, post, image) VALUES ('$title','$post','$image')";
    // "UPDATE products SET id='$id', nama='$nama', harga='$harga', gambar='$gambar' WHERE id=$id";
    $result = mysqli_query($conn, $sql);
}

if ($result) {
    echo '<script>
    alert("Data Product created")
    window.location = "/index.php"
    </script>';
    }
    else
    {
    echo 'failed create product' ;
    }
    mysqli_close($sql);


?>