
<h1 class="text-2xl font-semibold mb-2">Report</h1>

<div class="grid grid-cols-1 md:grid-cols-12 bg-white shadow-md p-4 rounded-lg w-[60rem] my-6">
    <div class="col-span-12 md:col-span-12 py-4">
        <div class="col-span-12">
            <a href="?page=add_debtor" class=" bg-[#c2672b] text-white font-bold py-2 my-4 px-4 rounded-md hover:bg-white hover:text-[#c2672b] duration-300 ease-in-out"> <i class="fa fa-plus"></i><span>Add Debtor</span></a>
            <table class="table-auto mt-8 text-sm w-full border-collapse border border-gray-300 text-center capitalize" id="dataTable">
                <tr>
                    <th class="border border-gray-300 px-4 py-2">No</th>
                    <th class="border border-gray-300 px-4 py-2">User</th>
                    <th class="border border-gray-300 px-4 py-2">Books</th>
                    <th class="border border-gray-300 px-4 py-2">Date Borrow</th>
                    <th class="border border-gray-300 px-4 py-2">Date Return</th>
                    <th class="border border-gray-300 px-4 py-2">Status</th>
                    <th class="border border-gray-300 px-[6rem] py-2">Action</th>
                </tr>
                <?php
                $i = 1;
                $query = mysqli_query($koneksi, "SELECT*FROM peminjaman LEFT JOIN user on user.id_user = peminjaman.id_user LEFT JOIN buku on buku.id_buku = peminjaman.id_buku WHERE peminjaman.id_user=" . $_SESSION['user']['id_user']);
                while ($data = mysqli_fetch_array($query)) {
                ?>
                    <tr>
                        <td class="px-4 py-2">
                            <?php echo $i++; ?>
                        </td>
                        <td class="px-4 py-2">
                            <?php echo $data['name']; ?>
                        </td>
                        <td class="px-4 py-2">
                            <?php echo $data['judul']; ?>
                        </td>
                        <td class="px-4 py-2">
                            <?php echo $data['tanggal_peminjaman']; ?>
                        </td>
                        <td class="px-4 py-2">
                            <?php echo $data['tanggal_pengembalian']; ?>
                        </td>
                        <td class="px-4 py-2">
                            <?php echo $data['status_peminjaman']; ?>
                        </td>
                        <td class="px-4 py-4">
                            <?php
                            if ($data['status_peminjaman'] != 'dikembalikan') {
                            ?>
                                <a href="?page=edit_debtor&&id=<?php echo $data['id_peminjam']; ?>" class="btn bg-blue-500 hover:bg-white hover:text-blue-500 text-white font-bold py-2 px-4 rounded duration-300 ease-in-out">Edit</a>
                                <a onclick="return confirm('please confirm your action');" href="?page=delete_debtor&&id=<?php echo $data['id_peminjam']; ?>" class="btn bg-red-500 hover:bg-white hover:text-red-700 hover:bg-red-700 text-white font-bold py-2 px-4 rounded  duration-300 ease-in-out">Delete</a>
                            <?php
                            }
                            ?>
                        </td>
                    <?php
                }
                    ?>
            </table>
        </div>
    </div>
</div>

