<?php
include "koneksi.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100">
    <div class="flex h-screen">

        <!-- image -->

        <div class="hidden md:block md:w-1/2 bg-gray-300 bg-cover bg-center"
            style="background-image: url('https://source.unsplash.com/random');"></div>

        <!-- form -->

        <div class="w-full md:w-1/2 flex items-center justify-center overflow-y-auto scroll-smooth pt-80 pb-10">
            <div class="max-w-md w-full px-4 py-8 bg-white shadow-lg rounded-lg ">
                <h1 class="text-2xl font-semibold mb-6 text-center capitalize">registration</h1>

                <?php
                if (isset($_POST['register'])) {
                    $name = $_POST['name'];
                    $email = $_POST['email'];
                    $no_telepon = $_POST['no_telepon'];
                    $alamat = $_POST['alamat'];
                    $username = $_POST['username'];
                    $level = $_POST['level'];
                    $password = md5($_POST['password']);

                    $insert = mysqli_query($koneksi, "INSERT INTO user (name, email, alamat, no_telepon,username, password, level) VALUES ('$name', '$email', '$alamat', '$no_telepon', '$username', '$password', '3')");

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
                        <label for="address"
                            class="block text-gray-700 text-sm font-bold mb-2 capitalize">address</label>
                        <textarea name="alamat" rows="5"
                            class="w-full appearance-none border border-gray-300 rounded-md py-4 px-[4rem] text-sm leading-2 text-gray-700 focus:outline-none focus:border-blue-500"
                            required></textarea>
                    </div>

                    <!-- name -->
                    <div class="mb-4">
                        <label for="username"
                            class="block text-gray-700 text-sm font-bold mb-2 capitalize">username</label>
                        <input id="username" name="username" type="text"
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500"
                            placeholder="Enter your Username" required>
                    </div>

                    <!-- password -->
                    <div class="mb-4">
                        <label for="password"
                            class="block text-gray-700 text-sm font-bold mb-2 capitalize">password</label>
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
                        </select>
                    </div>

                    <div class="flex items-center justify-between pt-4">
                        <button type="submit" name="register" value="register"
                            class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 focus:outline-none focus:bg-blue-600">Register</button>
                        <a class="px-4 cursor-pointer py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 focus:outline-none focus:bg-blue-600"
                            href="login.php">Login</a>
                    </div>

                    <div class="flex">
                        <div class="flex items-center justify-center text-xs  mx-auto ">
                            &copy;2024 Library
                        </div>
                </form>
            </div>
        </div>
    </div>

</body>

</html>
