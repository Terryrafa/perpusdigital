<?php
if ($_SESSION['user']['level'] != 'peminjam') {
?>

<h1 class="text-2xl font-semibold mb-2">Reports</h1>
<div class="card mt-4">
    <div class="grid grid-cols-1 md:grid-cols-12 bg-white shadow-md p-4 rounded-lg w-[54rem] my-6">
        <div class="col-md-12">
            <a href="print.php" target="_blank"
                class=" bg-[#c2672b] text-white font-bold py-2 px-4 rounded-md hover:bg-white hover:text-[#c2672b] duration-300 ease-in-out"></i>Print</a>
            <table class="table-auto border-collapse w-[50rem] my-4 mt-8 text-center capitalize" id="dataTable">
                <thead>
                    <tr>
                        <th class="border border-gray-300 px-4 py-2">No</th>
                        <th class="border border-gray-300 px-4 py-2">User</th>
                        <th class="border border-gray-300 px-4 py-2">Books</th>
                        <th class="border border-gray-300 px-4 py-2">Date Borrow</th>
                        <th class="border border-gray-300 px-4 py-2">Date Return</th>
                        <th class="border border-gray-300 px-4 py-2">Status</th>
                        <th class="border border-gray-300 px-4 py-2">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    $query = mysqli_query($koneksi, "SELECT*FROM peminjaman LEFT JOIN user ON user.id_user = peminjaman.id_user LEFT JOIN buku ON buku.id_buku = peminjaman.id_buku");
                    while ($data = mysqli_fetch_array($query)) {
                        ?>
                        <tr class="capitalize">
                            <td class="border border-gray-300 px-4 py-2"><?php echo $i++; ?></td>
                            <td class="border border-gray-300 px-4 py-2"><?php echo $data['name']; ?></td>
                            <td class="border border-gray-300 px-4 py-2"><?php echo $data['judul']; ?></td>
                            <td class="border border-gray-300 px-4 py-2"><?php echo $data['tanggal_peminjaman']; ?></td>
                            <td class="border border-gray-300 px-4 py-2"><?php echo $data['tanggal_pengembalian']; ?></td>
                            <td class="border border-gray-300 px-4 py-2"><?php echo $data['status_peminjaman']; ?></td>
                            <td class="border border-gray-300 px-4 py-4">
                            <a onclick="return confirm('please confirm your action');"
                                    href="?page=delete_report&&id=<?php echo $data['id_peminjam']; ?>"
                                    class="btn bg-red-500 hover:bg-white hover:text-red-700 hover:bg-red-700 text-white font-bold py-2 px-4 rounded  duration-300 ease-in-out">Delete</a>
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
<?php
}else {
    session_destroy();
    header('location:login.php');
}
?>