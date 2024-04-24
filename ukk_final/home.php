
<h1 class="text-2xl font-semibold mb-2">Dashboard</h1>
<p class="capitalize">Welcome to your dashboard.</p>

<div class="inline-block w-min-screen text-center mt-4">
    <?php if ($_SESSION['user']['level'] != 'peminjam') { ?>
        <div class="w-full">
            <div class="grid grid-cols-4 gap-4">
                <!-- Box Button 1 -->
                <div
                    class="bg-white shadow-md p-4 px-[2rem] rounded-lg cursor-pointer transition duration-300 transform hover:scale-105">
                    <h3 class="text-lg font-semibold mb-2">Total Category</h3>
                    <p class="text-gray-700 mb-4">
                        <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT*FROM kategori")); ?>
                    </p>
                    <a href="?page=category" class="text-blue-500 hover:text-blue-700">View Details</a>
                </div>

                <!-- Box Button 2 -->
                <div
                    class="bg-white shadow-md p-4 rounded-lg cursor-pointer transition duration-300 transform hover:scale-105">
                    <h3 class="text-lg font-semibold mb-2">Total Books</h3>
                    <p class="text-gray-700 mb-4">
                        <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT*FROM buku")); ?>
                    </p>
                    <a href="?page=books" class="text-blue-500 hover:text-blue-700">View Details</a>
                </div>

                <!-- Box Button 3 -->
                <div
                    class="bg-white shadow-md p-4 rounded-lg cursor-pointer transition duration-300 transform hover:scale-105">
                    <h3 class="text-lg font-semibold mb-2">Total Review</h3>
                    <p class="text-gray-700 mb-4">
                        <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT*FROM ulasan")); ?>
                    </p>
                    <a href="?page=review" class="text-blue-500 hover:text-blue-700">View Details</a>
                </div>

                <!-- Box Button 4 -->

                <div
                    class="bg-white shadow-md p-4 rounded-lg cursor-pointer transition duration-300 transform hover:scale-105">
                    <h3 class="text-lg font-semibold mb-2">Total User</h3>
                    <p class="text-gray-700 mb-4">
                        <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT*FROM user")); ?>
                    </p>
                    <a href="?page=users" class="text-blue-500 hover:text-blue-700">View Details</a>
                </div>
            </div>
        </div>

        <br>
        <div class="flex flex-col">
            <div class="bg-white shadow-md rounded-lg">
                <div class="p-4">
                    <table class="table-auto w-full">
                        <tr>
                            <td class="w-32 font-semibold border p-2 pr-[6rem]">Name</td>
                            <td class="border p-2">
                                <?php echo $_SESSION['user']['name']; ?>
                            </td>
                        </tr>
                        <tr>
                            <td class="font-semibold border p-2 pr-[6rem]">Level</td>
                            <td class="border p-2">
                                <?php echo $_SESSION['user']['level']; ?>
                            </td>
                        </tr>
                        <tr>
                            <td class="font-semibold border p-2 pr-[6rem]">Date</td>
                            <td class="border p-2">
                                <?php echo date('d-m-y'); ?>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
            <?php
    }
    ?>

        <div class="w-[68rem]">
            <div class="text-center">
                <h2 class="text-2xl font-bold my-8">Books</h2>
                <div class="grid grid-cols-2">
                    <?php
                    $no = 1;
                    $query = mysqli_query($koneksi, "SELECT * from buku LEFT JOIN kategori on buku.id_kategori = kategori.id_kategori");
                    while ($data = mysqli_fetch_array($query)) {
                        ?>

                        <div class="flex flex-col mt-8 items-center">
                            <?php $no++; ?>
                            <div
                                class="bg-white rounded-lg overflow-hidden shadow-md w-[20rem] h-fit p-4 cursor-pointer transition duration-300 transform hover:scale-105">
                                <img src="assets/buku/<?php echo $data['foto'] ?>"
                                    class="w-[20rem] h-[24rem] rounded-lg shadow-md" alt="...">
                                <div class="p-4">
                                    <p class="text-gray-600 text-sm">
                                        <?php echo $data['kategori']; ?>
                                    </p>
                                    <h3 class="text-xl font-semibold text-gray-800 my-2">
                                        <?php echo $data['judul']; ?>
                                    </h3>
                                    <p class="text-gray-700">
                                        Penulis: <?php echo $data['penulis']; ?>
                                    </p>
                                    <p class="text-gray-700">
                                        Penerbit: <?php echo $data['penerbit']; ?>
                                    </p>
                                    <p class="text-gray-700">
                                        Tahun Terbit: <?php echo $data['tahun_terbit']; ?>
                                    </p>

                                    <div class="mt-4">

                                    <?php 
                                        if($_SESSION['user']['level'] == 'peminjam') {
                                    ?>
                                    <a href="?page=add_debtor"
                                        class=" bg-[#c2672b] text-white font-bold  py-2 px-4 mx-4 rounded-md hover:bg-white hover:text-[#c2672b] duration-300 ease-in-out capitalize">save</a>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>

