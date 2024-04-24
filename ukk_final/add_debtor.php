
<h1 class="text-2xl font-semibold mb-2">Debtor</h1>
<div class="bg-white rounded-lg p-4 my-8 w-[30rem]">
    <div class="grid grid-cols-12">
      <div class="col-span-12">
        <form method="post">

          <?php
            
          if (isset($_POST['submit'])) {
            $id_buku = $_POST['id_buku'];
            $id_user = $_SESSION['user']['id_user'];
            $tanggal_peminjaman = $_POST['tanggal_peminjaman'];
            $tanggal_pengembalian = $_POST['tanggal_pengembalian'];
            $status_peminjaman = $_POST['status_peminjaman'];

            $query = mysqli_query($koneksi, "INSERT INTO peminjaman(id_buku,id_user,tanggal_peminjaman,tanggal_pengembalian,status_peminjaman) VALUES('$id_buku','$id_user','$tanggal_peminjaman','$tanggal_pengembalian','$status_peminjaman')");

            if ($query) {
              echo '<script>alert("data have been saved.");</script>';
            } else {
              echo '<script>alert("data failed to save.");</script>';
            }
          }
          ?>
          <div class="grid grid-cols-1 md:grid-cols-12 gap-4 mb-3">
            <div class="md:col-span-2 mt-2">Book</div>
            <div class="md:col-span-8">
              <select name="id_buku" class="p-2  px-[5.2rem] bg-white border rounded-md shadow-sm focus:outline-none focus:shadow-sm ml-[4rem]">
                <?php
                $buk = mysqli_query($koneksi, "SELECT*FROM buku");
                while ($buku = mysqli_fetch_array($buk)) {
                ?>
                  <option value="<?php echo $buku['id_buku']; ?>"><?php echo $buku['judul']; ?></option>
                <?php
                }
                ?>
              </select>
            </div>
          </div>

          <div class="grid grid-cols-1 md:grid-cols-12 gap-4 mb-3">
            <div class="md:col-span-2">Date Borrow</div>
            <div class="col-md-8">
              <input type="date" class="p-2 px-[4.3rem] bg-white border rounded-md shadow-sm focus:outline-none focus:shadow-sm ml-[4rem]" name="tanggal_peminjaman">
            </div>
          </div>
          <div class="grid grid-cols-1 md:grid-cols-12 gap-4 mb-3">
            <div class="md:col-span-2">Date Return</div>
            <div class="col-md-8">
              <input type="date" class="p-2 px-[4.3rem] bg-white border rounded-md shadow-sm focus:outline-none focus:shadow-sm ml-[4rem]"  name="tanggal_pengembalian">
            </div>
          </div>
          <div class="grid grid-cols-1 md:grid-cols-12 gap-4 mb-3">
            <div class="md:col-span-2">Borrow Status</div>
            <div class="col-md-8">
              <select name="status_peminjaman" class="p-2 px-[5rem] bg-white border rounded-md shadow-sm focus:outline-none focus:shadow-sm ml-[4rem] w-[18rem]" name="status_peminjaman">
                <option value="dipinjam">Borrowed</option>
                <option value="dikembalikan">Return</option>
              </select>
            </div>
          </div>
          <div class="grid grid-cols-1 md:grid-cols-12 ml-[10.5rem] gap-4 mb-3">
            <div class="md:col-span-8 flex justify-start items-center space-x-4">
              <button type="submit" class=" duration-300 ease-in-out bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded mr-2" name="submit" value="submit">Save</button>
              <button type="reset" class=" duration-300 ease-in-out bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded mr-2">Reset</button>
              <a href="?page=home" class=" duration-300 ease-in-out bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded">Back</a>
            </div>
          </div>
        </form>
      </div>
    </div>
</div>

<?php
