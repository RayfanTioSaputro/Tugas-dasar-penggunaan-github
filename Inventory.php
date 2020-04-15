<?php
    session_start();
    include "koneksi.php";

    $query = mysqli_query($koneksi, "SELECT MAX(id) AS id FROM `data_produk`");
    $getID =  mysqli_fetch_assoc($query);

    if (isset($_POST['simpan'])) {
        $id = $_POST['id'];
        $nama = $_POST['nama'];
        $harga = $_POST['harga'];   
        $jenis = $_POST['jenis'];
        $merk = $_POST['merk'];
        $gambar = $_POST['gambar'];
        $stok = $_POST['stok'];

        $result = "INSERT INTO `data_produk` (`id`, `nama_produk`, `harga_produk`, `jenis_produk`, `merk_produk`, `url_gambar`, `stok_produk`)
                VALUES ($id, '$nama', $harga, '$jenis', '$merk', '$gambar', $stok)";

        mysqli_query($koneksi, $result);
        header('location: Inventory.php');
    }    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/themify-icons.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <div class="row justify-content-md-center mt-12">
            <div class="col-sm-8">
                <div class="row border-box">
                    <div class="col-sm-9" style="width: 80%; height: 500px; margin: auto; position: relative;">
                        <div class="card" style="height: 80px; width: 100%; position: absolute; left: 50%; transform: translateX(-50%);">
                            <div class="card-header" style="text-align: center;">
                                <div class="sub-title">
                                    <h4>FORM INPUT</h4>
                                </div>
                            </div>
                            <div class="card-body">
                                <form action="" method="post">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="ti-clip"></i></span>
                                        </div>
                                        <input type="number" class="form-control bg-light" value="<?= ($getID['id']+1) ?>" disabled aria-label="Default" aria-describedby="inputGroup-sizing-default" placeholder="AUTO">
                                        <input type="hidden" name="id" value="<?= ($getID['id']+1) ?>">
                                    </div>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="ti-bag"></i></span>
                                        </div>
                                        <input type="text" name="nama" id="inputGroup-sizing-default" class="form-control" placeholder="Nama Produk">
                                    </div>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="ti-money"></i></span>
                                        </div>
                                        <input type="number" name="harga" id="inputGroup-sizing-default" class="form-control" placeholder="Harga Produk">
                                    </div>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="ti-tag"></i></span>
                                        </div>
                                        <select name="jenis" id="inputGroup-sizing-default" class="custom-select">
                                            <option selected>Pilih Jenis Produk</option>
                                            <option value="kaos">Kaos</option>
                                            <option value="celana">Celana</option>
                                            <option value="jaket">Jaket</option>
                                        </select>
                                    </div>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="ti-tag"></i></span>
                                        </div>
                                        <select name="merk" id="inputGroup-sizing-default" class="custom-select">
                                            <option selected>Pilih Merk Produk</option>
                                            <option value="nike">Nike</option>
                                            <option value="adidas">Adidas</option>
                                            <option value="puma">Puma</option>
                                        </select>
                                    </div>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="ti-gallery"></i></span>
                                        </div>
                                        <input type="url" name="gambar" id="inputGroup-sizing-default" class="form-control" placeholder="URL Gambar">
                                    </div>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="ti-archive"></i></span>
                                        </div>
                                        <input type="number" name="stok" id="inputGroup-sizing-default" class="form-control" placeholder="Stok Produk">
                                    </div>
                                    <div class="input-group mb-3">
                                        <input type="submit" name="simpan" class="btn btn-primary" value="Simpan">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="containe-fluid mt-3">
        <div class="row mt-2 ml-2 mr-2">
            <table  class="table table-hover">
                <tr>
                    <th>ID Produk</th>
                    <th>Nama Produk</th>
                    <th>Harga Produk</th>
                    <th>Jenis Produk</th>
                    <th>Merk Produk</th>
                    <th>URL Gambar</th>
                    <th>Stok Produk</th>
                    <th>Action</th>
                </tr>
                <?php
                    $query = mysqli_query($koneksi, "SELECT * FROM `data_produk`");
                    foreach ($query as $data_produk) :
                ?>
                <tr>
                    <td><?= $data_produk['id'] ?></td>
                    <td><?= $data_produk['nama_produk'] ?></td>
                    <td><?= $data_produk['harga_produk'] ?></td>
                    <td><?= $data_produk['jenis_produk'] ?></td>
                    <td><?= $data_produk['merk_produk'] ?></td>
                    <td><img src="<?= $data_produk['url_gambar'] ?>" alt="" width="50px"></td>
                    <td <?php if($data_produk['stok_produk']<= 5) : ?> style="background-color: red; color: white;" 
                        <?php endif; ?> ><?= $data_produk['stok_produk'] ?></td>
                    <td><a href="delete.php?id=<?= $data_produk['id'] ?>">Delete</a></td>
                </tr>

                <?php
                    endforeach;
                ?>
            </table>
        </div>
    </div>
</body>
</html>