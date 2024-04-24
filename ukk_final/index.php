<?php
// login

include "koneksi.php";
if (!isset($_SESSION['user'])) {
    header('location:login.php');
    exit();
}

$username = $_SESSION['user']['username'];
$level = $_SESSION['user']['level'];
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com">
    <link rel="stylesheet" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <div class="bg-gray-100 h-screen">

        <div class="bg-gray-100 max-h-fit">
            <!-- sidebars -->
            <div class="flex">
                <div class="uppercase bg-[#c2672b] text-gray-100 w-48 flex flex-col z-20 fixed h-screen rounded-r-md">
                    <div class="p-4 ">
                        <span class="text-2xl font-semibold">toshokan</span>
                    </div>
                    <!-- navbar -->
                    <nav class="flex-1 mx-4">
                        <p class="py-3 text-sm font-bold">main</p>
                        <a href="?page=home"
                            class="block pl-8 pb-3 text-lg capitalize hover:font-bold hover:scale-105 duration-300 ease-in-out">dashboard</a>
                        <p class="py-3 text-sm font-bold uppercase ">navigation</p>
                        <?php
                        if ($_SESSION['user']['level'] != 'peminjam') {

                            ?>

                            <a href="?page=category"
                                class="block pl-8 py-2 text-lg hover:font-bold hover:scale-105 duration-300 ease-in-out capitalize">category</a>
                            <a href="?page=books"
                                class="block pl-8 py-2 text-lg hover:font-bold hover:scale-105 duration-300 ease-in-out capitalize">books</a>

                            <?php
                        } else {

                            ?>

                            <!-- <a href="?page=debtor" class="block pl-8 py-2 text-lg hover:font-bold hover:scale-105 duration-300 ease-in-out capitalize">debtor</a> -->

                            <?php
                        }
                        ?>
                        <a href="?page=review"
                            class="block pl-8 py-2 text-lg hover:font-bold hover:scale-105 duration-300 ease-in-out capitalize">review</a>
                        <?php
                        if ($_SESSION['user']['level'] != 'peminjam') {

                            ?>



                            <a href="?page=reports"
                                class="block pl-8 py-2 text-lg hover:font-bold hover:scale-105 duration-300 ease-in-out capitalize">reports</a>
                            <?php
                        }
                        ?>
                        <?php 
                        if ($_SESSION['user']['level'] == 'admin') {
                        ?>
                        <a href="?page=users"
                            class="block pl-8 py-2 text-lg hover:font-bold hover:scale-105 duration-300 ease-in-out capitalize">users</a>
                            <?php
                        }
                            ?>
                    </nav>
                    <!-- user status -->
                    <div class="p-4 py-[2.5rem] font-bold justify-between bg-[#b05e27]">
                        <div class="status">
                            <div class="font-light capitalize mt-[-1rem]">login as:</div>
                            <p></p>
                            <?php
                            echo $_SESSION['user']['name'];
                            ?>
                        </div>

                        <a href="logout.php" onclick="return confirm('Please confirm your action')"
                            class="status ml-[6rem] mt-[-0.8rem] rounded-md hover:bg-white hover:scale-105 hover:text-black px-2 duration-300 ease-in-out text-end capitalize">logout</a>
                    </div>
                </div>

                <!-- main -->
                <div class="flex">
                    <div class="z-10 ml-[14rem] py-8 flex flex-col">
                        <?php
                        $page = isset($_GET['page']) ? $_GET['page'] : 'home';
                        if (file_exists($page . '.php')) {
                            include $page . '.php';
                        } else {
                            include '404.php';
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
