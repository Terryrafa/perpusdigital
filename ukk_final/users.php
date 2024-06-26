<?php
if ($_SESSION['user']['level'] != 'peminjam') {
?>
<h1 class="text-2xl font-semibold mb-2 capitalize">users</h1>
<div class="w-screen mt-4">
    <div class="grid grid-cols-1 md:grid-cols-12 bg-white shadow-md p-4 rounded-lg w-[54rem] my-6">
        <div class="col-md-12">
            <a href="?page=add_users"
                class=" bg-[#c2672b] text-white font-bold py-2 px-4 rounded-md hover:bg-white hover:text-[#c2672b] duration-300 ease-in-out capitalize"></i>add</a>
            <table class="table-auto border-collapse w-[50rem] my-4 mt-8 text-center capitalize" id="dataTable">
                <thead class="capitalize">
                    <tr>
                        <th class="border border-gray-300 px-4 py-2">No</th>
                        <th class="border border-gray-300 px-4 py-2">User</th>
                        <th class="border border-gray-300 px-4 py-2">Level</th>
                        <th class="border border-gray-300 px-4 py-2">action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    $query = mysqli_query($koneksi, "SELECT*FROM user");
                    while ($data = mysqli_fetch_array($query)) {
                        ?>
                        <tr class="capitalize">
                            <td class="border px-4 py-2"><?php echo $i++; ?></td>
                            <td class="border px-4 py-2"><?php echo $data['name']; ?></td>
                            <td class="border px-4 py-2"><?php echo $data['level']; ?></td>
                            <td class="border px-4 py-4">
                                <a onclick="return confirm('please confirm your action'); "
                                    href="?page=delete_user&&id=<?php echo $data['id_user'] ?>"
                                    class=" bg-red-500 hover:bg-white hover:text-red-700 hover:bg-red-700 text-white font-bold py-2 px-4 rounded  duration-300 ease-in-out capitalize">delete</a>
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