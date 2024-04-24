<?php
$id = $_GET ["id"];
$query = mysqli_query($koneksi, "DELETE FROM peminjaman where id_peminjam=$id")
?>
<script>
    location.href = "index.php?page=reports";
</script>