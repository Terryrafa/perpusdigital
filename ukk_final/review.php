
<h1 class="text-2xl font-semibold mb-2 capitalize">review</h1>
<div class="card mt-4">

<?php
        if ($_SESSION ['user']['level'] != "peminjam") {
        ?>
    <div class="w-[20rem] text-center">
    <div class="bg-white shadow-md p-4 px-[2rem] rounded-lg">
        <h3 class="text-lg font-semibold mb-2">Total Review</h3>
        <p class="text-gray-700 mb-4">
            <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT*FROM ulasan")); ?>
        </p>
    </div>
    </div>

    <?php
        }
    ?>

    <div class="grid grid-cols-1 md:grid-cols-12 bg-white shadow-md p-4 rounded-lg w-[54rem] my-6">
        <div class="col-md-12">
            <?php
            if ($_SESSION['user']['level'] == 'peminjam') {
                ?>
                <a href="?page=add_review"
                    class=" bg-[#c2672b] text-white font-bold py-2 px-4 rounded-md hover:bg-white hover:text-[#c2672b] duration-300 ease-in-out">Add</a>
                <?php
            }
            ?>

            <table class="table-auto border-collapse w-[50rem] my-4 mt-8 text-center capitalize" id="dataTable">
                <thead>
                    <tr>
                        <th class="border border-gray-300 px-4 py-2">No</th>
                        <th class="border border-gray-300 px-4 py-2">User</th>
                        <th class="border border-gray-300 px-4 py-2">Books</th>
                        <th class="border border-gray-300 px-[4rem] py-2">Review</th>
                        <th class="border border-gray-300 px-4 py-2">Rating</th>
                        <th class="border border-gray-300 px-[4rem] py-2">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    $query = mysqli_query($koneksi, "SELECT*FROM ulasan LEFT JOIN user ON user.id_user = ulasan.id_user LEFT JOIN buku ON buku.id_buku = ulasan.id_buku");
                    while ($data = mysqli_fetch_array($query)) {
                        ?>
                        <tr class="capitalize">
                            <td class="border border-gray-300 px-4 py-4"><?php echo $i++; ?></td>
                            <td class="border border-gray-300 px-4 py-4"><?php echo $data['name']; ?></td>
                            <td class="border border-gray-300 px-4 py-4"><?php echo $data['judul']; ?></td>
                            <td class="border border-gray-300 px-4 py-4"><?php echo $data['ulasan']; ?></td>
                            <td class="border border-gray-300 px-4 py-4"><?php echo $data['rating']; ?></td>

                            <?php
                            if ($_SESSION['user']['id_user'] == $data['id_user']) {
                            ?>
                            <td class="border border-gray-300 px-4 py-4">
                                <a href="?page=edit_review&&id=<?php echo $data['id_ulasan']; ?>"
                                    class="btn bg-blue-500 hover:bg-white hover:text-blue-500 text-white font-bold py-2 px-4 rounded duration-300 ease-in-out">Edit</a>
                                <a onclick="return confirm('please confirm your action');"
                                    href="?page=delete_review&&id=<?php echo $data['id_ulasan']; ?>"
                                    class="btn bg-red-500 hover:bg-white hover:text-red-700 hover:bg-red-700 text-white font-bold py-2 px-4 rounded  duration-300 ease-in-out">Delete</a>
                            </td>
                        </tr>
                        <?php
                            }
                        ?>
                        <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>