<?php
include "koneksi.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100">
    <div class="flex h-screen">
        <!-- Image -->
        <div class="hidden md:block md:w-1/2 bg-gray-300 bg-cover bg-center"
            style="background-image: url('https://source.unsplash.com/random');"></div>

        <!-- Login Form -->
        <div class="w-full md:w-1/2 flex items-center justify-center">
            <div class="max-w-md w-full px-4 py-8 bg-white shadow-lg rounded-lg">
                <h1 class="text-4xl text-gray-700 font-semibold mb-6 text-center">Login</h1>

                <?php
                if (isset($_POST['login'])) {
                    $username = $_POST['username'];
                    $password = md5($_POST['password']);

                    $data = mysqli_query($koneksi, "SELECT*FROM user Where username ='$username' and password = '$password'");

                    $cek = mysqli_num_rows($data);

                    if ($cek > 0) {
                        $_SESSION['user'] = mysqli_fetch_array($data);
                        echo '<script>alert("Wellcome"); location.href="index.php"; </script>';
                    } else {
                        echo '<script>alert("Something Went Wrong")  </script>';
                    }
                }
                ?>
                <form action="#" method="POST">
                    <div class="mb-4">
                        <label for="username" class="block text-gray-700 text-sm font-bold mb-2">Username</label>
                        <input type="username" placeholder="Username" id="username" name="username"
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500">
                    </div>
                    <div class="mb-6">
                        <label for="password" class="block text-gray-700 text-sm font-bold mb-2">Password</label>
                        <input type="password" id="password" name="password"
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500"
                            placeholder="Enter your password">
                    </div>
                    <div class="flex items-center justify-between">
                        <button type="submit" name="login" value="login"
                            class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 focus:outline-none focus:bg-blue-600">Login</button>
                        <a class="px-4 cursor-pointer py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 focus:outline-none focus:bg-blue-600"
                            href="register.php">Register</a>
                    </div>

                    <div class="flex">
                        <div class="flex items-center text-gray-600 justify-center text-xs mx-auto mt-6 ">
                            &copy;2024 Library
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
