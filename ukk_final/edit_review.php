
<h1 class="text-2xl font-semibold mb-2 capitalize">edit review</h1>

<div class="bg-white rounded-lg p-8 my-8 w-[40rem]">
    <div class="grid grid-cols-1 md:grid-cols-12 gap-4">
        <div class="col-md-12">
            <form method="post" class="space-y-4">
                <?php
                $id = $_GET['id'];

                if (isset($_POST['submit'])) {

                    $id_buku = $_POST['id_buku'];
                    $id_user = $_SESSION['user']['id_user'];
                    $ulasan = $_POST['ulasan'];
                    $rating = $_POST['rating'];

                    $query = mysqli_query($koneksi, "UPDATE ulasan SET id_buku='$id_buku', ulasan='$ulasan',rating='$rating' WHERE id_ulasan=$id");

                    if ($query) {
                        echo '<script>alert("data have been saved");  </script>';
                    } else {
                        echo '<script>alert("failed to save data");  </script>';
                    }
                }
                $query = mysqli_query($koneksi, "SELECT*FROM ulasan where id_ulasan=$id");
                $data = mysqli_fetch_array($query);
                ?>

                <div class="grid grid-cols-1 md:grid-cols-12 gap-4 mb-3">
                    <div class="col-span-2 flex items-center capitalize">books</div>
                    <div class="col-span-8">
                        <select name="id_buku"
                            class="ml-[4rem] px-3 py-2 bg-white border rounded-md shadow-sm focus:outline-none focus:shadow-sm w-[30rem]">
                            <?php
                            $buk = mysqli_query($koneksi, "SELECT*FROM buku");
                            while ($buku = mysqli_fetch_array($buk)) {
                                ?>
                                <option <?php if ($data['id_buku'] == $buku['id_buku'])
                                    echo 'selected'; ?>
                                    value="<?php echo $buku['id_buku']; ?>"><?php echo $buku['judul']; ?></option>
                                <?php
                            }
                            ?>
                        </select>
                    </div>
                </div>

                <div class="grid grid-cols-12 gap-4 mb-3">
                    <div class="col-span-2 capitalize">review</div>
                    <div class="col-span-8">
                        <textarea name="ulasan" rows="5"
                            class="ml-[4rem] px-3 py-2 bg-white border rounded-md shadow-sm focus:outline-none focus:shadow-sm w-[30rem]"><?php echo $data['ulasan']; ?></textarea>
                    </div>
                </div>

                <div class="grid-cols-12 gap-4 mb-3 flex">
                    <div class="col-span-12 capitalize">rating</div>
                    <div class="col-span-8">
                        <select name="rating"
                            class="ml-[1.8rem] px-3 py-2 bg-white border rounded-md shadow-sm focus:outline-none focus:shadow-sm w-[30rem]">
                            <?php
                            for ($i = 1; $i <= 10; $i++) {
                                ?>
                                <option <?php if ($data['rating'] == $i)
                                    echo 'selected'; ?>><?php echo $i ?></option>
                                <?php
                            }
                            ?>
                        </select>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-12 ml-[13rem] gap-4 mb-3">
                    <div class="col-span-8 flex justify-start items-center space-x-4">
                        <button type="submit"
                            class=" duration-300 ease-in-out bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded mr-2"
                            name="submit" value="submit">Save</button>
                        <button type="reset"
                            class=" duration-300 ease-in-out bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded mr-2">Reset</button>
                        <a href="?page=review"
                            class=" duration-300 ease-in-out bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded">Back</a>
                            <a onclick="return confirm('please confirm your action');"
                                    href="?page=delete_review&&id=<?php echo $data['id_ulasan']; ?>"
                                    class="btn bg-red-500 hover:bg-white hover:text-red-700 hover:bg-red-700 text-white font-bold py-2 px-4 rounded  duration-300 ease-in-out">Delete</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
