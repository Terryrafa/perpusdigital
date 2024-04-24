<?php
if ($_SESSION['user']['level'] != 'peminjam') {
?>

<h1 class="text-2xl font-semibold mb-2 capitalize">add books</h1>
<div class="bg-white rounded-lg p-8 px-8 my-8">
    <div class="card-body">
        <div class="grid grid-cols-1 md:grid-cols-12 gap-4">
            <div class="md:col-span-12">
                <form method="post" enctype="multipart/form-data" class="space-y-4">
                    <div class="grid grid-cols-1 md:grid-cols-12 gap-4 mb-3">
                        <div class="md:col-span-2 flex items-center">Category</div>
                        <div class="md:col-span-8 ">
                            <select name="id_kategori" class=" px-3 py-2 bg-white border rounded-md shadow-sm focus:outline-none focus:shadow-sm w-full">
                                <?php
                                $kat = mysqli_query($koneksi, "SELECT*FROM kategori");
                                while ($kategori = mysqli_fetch_array($kat)) {
                                    ?>
                                    <option value="<?php echo $kategori['id_kategori']; ?>">
                                        <?php echo $kategori['kategori']; ?>
                                    </option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-12 gap-4 mb-3">
                        <div class="md:col-span-2">Title</div>
                        <div class="md:col-span-8"><input type="text" class=" px-3 py-2 bg-white border rounded-md shadow-sm focus:outline-none focus:shadow-sm w-full" name="judul"></div>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-12 gap-4 mb-3">
                        <div class="md:col-span-2">Writer</div>
                        <div class="md:col-span-8"><input type="text" class=" px-3 py-2 bg-white border rounded-md shadow-sm focus:outline-none focus:shadow-sm w-full" name="penulis"></div>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-12 gap-4 mb-3">
                        <div class="md:col-span-2">Author</div>
                        <div class="md:col-span-8"><input type="text" class=" px-3 py-2 bg-white border rounded-md shadow-sm focus:outline-none focus:shadow-sm w-full" name="penerbit"></div>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-12 gap-4 mb-3">
                        <div class="md:col-span-2">Release Date</div>
                        <div class="md:col-span-8"><input type="number" class=" px-3 py-2 bg-white border rounded-md shadow-sm focus:outline-none focus:shadow-sm w-full" name="tahun_terbit"></div>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-12 gap-4 mb-3">
                        <div class="md:col-span-2">Description</div>
                        <div class="md:col-span-8">
                            <textarea name="deskripsi" rows="5" class=" px-3 py-2 bg-white border rounded-md shadow-sm focus:outline-none focus:shadow-sm w-full"></textarea>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class=" text-uppercase">Book Cover</label>
                        <input type="file" class=" px-2 ml-6 py-2 bg-white border rounded-md shadow-sm focus:outline-none focus:shadow-sm w-2/3" name="foto" required>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-12 ml-[22.5rem] gap-4 mb-3">
                        <div class="md:col-span-8 flex justify-start items-center space-x-4">
                            <button type="submit" class=" duration-300 ease-in-out bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded mr-2" name="submit" value="submit">Save</button>
                            <button type="reset" class=" duration-300 ease-in-out bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded mr-2">Reset</button>
                            <a href="?page=books" class=" duration-300 ease-in-out bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded">Back</a>
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

                    $lokasi = 'assets/buku/';
                    $nama_foto = rand(0, 999) . '-' . $foto;

                    move_uploaded_file($tmp, $lokasi . $nama_foto);

                    $query = mysqli_query($koneksi, "INSERT INTO buku(id_kategori,judul,penulis,penerbit,tahun_terbit,deskripsi,foto) values('$id_kategori','$judul','$penulis','$penerbit','$tahun_terbit','$deskripsi','$nama_foto')");

                    if ($query) {
                        echo '<script>alert("data have been saved");  </script>';
                    } else {
                        echo '<script>alert("failed to save data");  </script>';
                    }
                }
                ?>
            </div>
        </div>
    </div>
</div>

<?php
}else {
    session_destroy();
    header('location:login.php');
}
?>