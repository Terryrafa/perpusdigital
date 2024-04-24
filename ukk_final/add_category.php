<?php
if ($_SESSION['user']['level'] != 'peminjam') {
?>

<h1 class="mt-4 text-2xl capitalize">add category</h1>
<div class="bg-white w-[40rem] shadow-md rounded-md p-6 my-8">
    <div class="row">
        <div class="cols-md-12">
            <form method="post">
                <?php
                if (isset($_POST['submit'])) {
                    $kategori = $_POST['kategori'];
                    $query = mysqli_query($koneksi, "INSERT INTO kategori (kategori) values ('$kategori')");

                    if ($query) {
                        echo '<script> alert("data have been saved") </script>';
                    } else {
                        echo '<script> alert("data failed to save") </script>';
                    }
                }
                ?>

                <div class="flex mb-4">
                    <div class="m-2 capitalize">category name</div>
                    <div class="flex-1 border-solid border-2 rounded-xl px-1">
                        <input type="text" class="w-full border-slate-700 rounded-md p-1" name="kategori">
                    </div>
                </div>

                <div class="flex">
                    <div class="ml-[21.5rem]">
                        <button type="submit"
                            class=" duration-300 ease-in-out bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded mr-2"
                            name="submit" value="submit">Save</button>
                        <button type="reset"
                            class=" duration-300 ease-in-out bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded mr-2">Reset</button>
                        <a href="?page=category"
                            class=" duration-300 ease-in-out bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded">Back</a>
                    </div>
                </div>
            </form>
            <?php
                if (isset($_POST['submit'])) {
                    mysqli_error($koneksi);
                    $id_kategori = $_POST['id_kategori'];
                    $judul = $_POST['judul'];
                    $penulis =$_POST['penulis'];
                    $penerbit = $_POST['penerbit'];
                    $tahun_terbit = $_POST['tahun_terbit'];
                    $deskripsi = $_POST['deskripsi'];

                    $foto = $_FILES['foto']['name'];
                    $tmp = $_FILES['foto']['tmp_name'];

                    $lokasi = 'assets/';
                    $nama_foto = rand(0, 999) . '-' . $foto;

                    move_uploaded_file($tmp, $lokasi . $nama_foto);

                    $query = mysqli_query($koneksi, "INSERT INTO buku(id_kategori,judul,penulis,penerbit,tahun_terbit,deskripsi,foto) values('$id_kategori','$judul','$penulis','$penerbit','$tahun_terbit','$deskripsi','$nama_foto')");

                    if ($query) {
                        echo '<script>alert("data berhasil tersimpan");  </script>';
                    } else {
                        echo '<script>alert("data gagal");  </script>';
                    }
                }
                ?>
        </div>
    </div>
</div>

<?php
}else {
    session_destroy();
}
?>