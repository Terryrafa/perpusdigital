<?php
$id = $_GET["id"];
$query = mysqli_query($koneksi, "DELETE FROM user WHERE id_user=$id")

?>

<script>
    location.href = "index.php?page=users";
</script>
