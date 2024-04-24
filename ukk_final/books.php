<?php
if ($_SESSION['user']['level'] != 'peminjam') {
?>

<div class="">
    <div class="mt-2">
        <div class="grid grid-cols-12 my-2">
            <div class="col-span-12 w-[70rem] bg-white p-8 rounded-lg">
                <a href="?page=add_books"
                    class="text-center bg-[#c2672b] text-white font-bold py-2 px-4 rounded-md hover:bg-white hover:text-[#c2672b] duration-300 ease-in-out capitalize">add
                    data</a>

                <table class="table-auto mt-4 text-sm w-[66rem] border-collapse border border-gray-300 capitalize"
                    id="dataTable">
                    <!-- table for books -->
                    <thead>
                        <tr>
                            <th class="border px-2 py-2">no</th>
                            <th class="border px-2 py-2">title</th>
                            <th class="border px-4 py-2">Writer</th>
                            <th class="border px-4 py-2">Author</th>
                            <th class="border px-2 py-2">release date</th>
                            <th class="border px-[8rem] py-2">description</th>
                            <th class="border px-[4rem] py-2">picture</th>
                            <th class="border px-[2rem] py-2">action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        $query = mysqli_query($koneksi, "SELECT*FROM buku LEFT JOIN kategori on buku.id_kategori = kategori.id_kategori");
                        while ($data = mysqli_fetch_array($query)) {
                            ?>
                            <tr class="py-[4rem] text-center">
                                <td class="border px-4">
                                    <?php echo $i++; ?>
                                </td>
                                </td>
                                <td class="border px-4">
                                    <?php echo $data['judul']; ?>
                                </td>
                                <td class="border border-gray-300 px-4 py-[4rem]">
                                    <?php echo $data['penulis']; ?>
                                </td>
                                <td class="border border-gray-300 px-4 py-[4rem]">
                                    <?php echo $data['penerbit']; ?>
                                </td>
                                </td>
                                <td class="border px-4">
                                    <?php echo $data['tahun_terbit']; ?>
                                </td>
                                <td class="border px-4">
                                    <?php echo $data['deskripsi']; ?>
                                </td>
                                <td class="border px-4 py-2">
                                    <img src="assets/buku/<?php echo $data['foto'] ?>" alt="" width="200">
                                </td>
                                <td class="border border-gray-300 px-8 flex-row">
                                    <a href="?page=edit_books&&id=<?php echo $data['id_buku']; ?>"
                                        class="btn bg-blue-500 hover:bg-white hover:text-blue-500 text-white font-bold py-2 px-4 rounded duration-300 ease-in-out capitalize">edit</a>
                                </td>
                            </tr>
                            <?php
                        }
                        ?>
                    </tbody>
                </table>
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