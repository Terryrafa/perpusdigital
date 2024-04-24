<?php
if ($_SESSION['user']['level'] != 'peminjam') {
?>

<h1 class="text-2xl font-semibold mb-2 capitalize">add users</h1>
<div class="bg-white rounded-lg p-8 my-8 w-[40rem]">
    <div class="col-md-12">
        <?php
        if (isset($_POST['register'])) {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $no_telepon = $_POST['no_telepon'];
            $alamat = $_POST['alamat'];
            $username = $_POST['username'];
            $level = $_POST['level'];
            $password = $_POST['password'];

            $insert = mysqli_query($koneksi, "INSERT INTO user (name, email, alamat, no_telepon,username, password, level) VALUES ('$name', '$email', '$alamat', '$no_telepon', '$username', '$password', '$level')");

            if ($insert) {
                echo '<script> alert(wellcome); location:href="login.php";</script>';
            } else {
                echo '<script> alert(something went wrong);</script>';
            }
        }
        ?>

        <form action="#" method="post">
            <!-- full name -->

            <div class="mb-4">
                <label for="name" class="block text-gray-700 text-sm font-bold mb-2 capitalize">full
                    name</label>
                <input id="name" name="name" type="text"
                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500"
                    placeholder="Enter your username" required>
            </div>

            <!-- email -->
            <div class="mb-4">
                <label for="email" class="block text-gray-700 text-sm font-bold mb-2 capitalize">email</label>
                <input id="email" name="email" type="email"
                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500"
                    placeholder="Enter your Email" required>
            </div>

            <!-- phone num -->
            <div class="mb-4">
                <label for="phonenum" class="block text-gray-700 text-sm font-bold mb-2 capitalize">phone
                    number</label>
                <input id="no_telepon" name="no_telepon" type="text"
                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500"
                    placeholder="Enter your Phone Number" required>
            </div>

            <!-- address -->
            <div class="mb-4">
                <label for="address" class="block text-gray-700 text-sm font-bold mb-2 capitalize">address</label>
                <textarea name="alamat" rows="5"
                    class="w-full appearance-none border border-gray-300 rounded-md py-4 px-[4rem] text-sm leading-2 text-gray-700 focus:outline-none focus:border-blue-500"
                    required></textarea>
            </div>

            <!-- name -->
            <div class="mb-4">
                <label for="username" class="block text-gray-700 text-sm font-bold mb-2 capitalize">username</label>
                <input id="username" name="username" type="text"
                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500"
                    placeholder="Enter your Username" required>
            </div>

            <!-- password -->
            <div class="mb-4">
                <label for="password" class="block text-gray-700 text-sm font-bold mb-2 capitalize">password</label>
                <input id="password" name="password" type="password"
                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500"
                    placeholder="Enter your Password" required>
            </div>

            <!-- level -->
            <div class="mb-4">
                <label for="level" class="block text-gray-700 text-sm font-bold mb-2 capitalize">level</label>
                <select name="level" require
                    class="appearance-none block w-full bg-white border border-gray-300 py-2 px-4 rounded-md shadow-sm focus:outline-none focus:border-blue-500">
                    <option value="peminjam">Rent</option>
                    <option value="petugas">Petugas</option>
                </select>
            </div>

            <div class="flex items-center justify-between pt-4">
                <button type="submit" name="register" value="register"
                    class="ml-[27rem] px-4 py-2 bg-[#c2672b] text-white rounded-lg hover:bg-white focus:outline-none hover:text-[#c2672b] capitalize duration-300 ease-in-out ">add
                    new user</button>
            </div>

            <div class="flex">
                <div class="flex items-center justify-center text-xs pt-4  mx-auto ">
                    &copy;2024 Library
                </div>
        </form>
    </div>
</div>

<?php
}else {
    session_destroy();
    header('location:login.php');
}
?>