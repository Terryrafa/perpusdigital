<?php
if ($_SESSION['user']['level'] != 'peminjam') {
?>
<div class="text-2xl font-semibold mb-2 capitalize">category</div>
<div class="grid grid-cols-1 md:grid-cols-2 bg-white shadow-md rounded-lg w-[60rem] my-6 px-4">
    <div class="col-span-12 md:col-span-12 py-4">
        <a href="?page=add_category"
            class=" bg-[#c2672b] text-white font-bold py-2 px-4 mx-4 rounded-md hover:bg-white hover:text-[#c2672b] duration-300 ease-in-out capitalize">add</a>

        <!-- kategori table -->
        <table class="table-auto border-collapse w-full my-4 mt-8  text-center capitalize" id="dataTable">
            <thead>
                <tr>
                    <th class="border px-4 py-2">no</th>
                    <th class="border px-4 py-2">category name</th>
                    <th class="border px-4 py-2">action</th>
                </tr>
            </thead>

            <tbody>
                <?php
                $i = 1;
                $query = mysqli_query($koneksi, "SELECT*FROM kategori");
                while ($data = mysqli_fetch_array($query)) {
                    ?>

                    <tr>
                        <td class="border px-4 py-4"><?php echo $i++; ?></td>
                        <td class="border px-4 py-4"><?php echo $data['kategori']; ?></td>
                        <td class="border px-4 py-4">
                            <a href="?page=edit_category&&id=<?php echo $data['id_kategori']; ?>"
                                class="btn bg-blue-500 hover:bg-white hover:text-blue-500 text-white font-bold py-2 px-4 rounded duration-300 ease-in-out capitalize">edit</a>
                            <a onclick="return confirm('please confirm your action'); "
                                href="?page=delete_category&&id=<?php echo $data['id_kategori'] ?>"
                                class="btn bg-red-500 hover:bg-white hover:text-red-700 hover:bg-red-700 text-white font-bold py-2 px-4 rounded  duration-300 ease-in-out capitalize">delete</a>
                        </td>
                    </tr>
                    <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

<?php
}else {
    session_destroy();
    header('location:login.php');
}
?>