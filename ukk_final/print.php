<?php
if ($_SESSION['user']['level'] != 'peminjam') {
?>
<h2 align="center">Borrowed Books Report</h2>
<table class="table-auto border-collapse w-[50rem] my-4 mt-8 text-center capitalize" border="1" id="dataTable"
    width="100%" cellspacing="0">
    <thead>
        <tr>
            <th class="px-4 py-2">No</th>
            <th class="px-4 py-2">User</th>
            <th class="px-4 py-2">Books</th>
            <th class="px-4 py-2">Date Borrow</th>
            <th class="px-4 py-2">Date Return</th>
            <th class="px-4 py-2">Status</th>
        </tr>
    </thead>
    <tbody>
        <?php
        include "koneksi.php";
        $i = 1;
        $query = mysqli_query($koneksi, "SELECT*FROM peminjaman LEFT JOIN user ON user.id_user = peminjaman.id_user LEFT JOIN buku ON buku.id_buku = peminjaman.id_buku");
        while ($data = mysqli_fetch_array($query)) {
            ?>
            <tr>
                <td class="px-4 py-2"><?php echo $i++; ?></td>
                <td class="px-4 py-2"><?php echo $data['name']; ?></td>
                <td class="px-4 py-2"><?php echo $data['judul']; ?></td>
                <td class="px-4 py-2"><?php echo $data['tanggal_peminjaman']; ?></td>
                <td class="px-4 py-2"><?php echo $data['tanggal_pengembalian']; ?></td>
                <td class="px-4 py-2"><?php echo $data['status_peminjaman']; ?></td>
            </tr>
            <?php
        }
        ?>
    </tbody>
</table>
<script>
    window.print();
    setTimeout(function () {
        window.close();
    }, 100);
</script>
<?php
}else {
    session_destroy();
    header('location:login.php');
}
?>