<div class="card shadow mb-4">
   <div class="card-header py-3 text-center">
      <h6 class="m-0 font-weight-bold text-primary">Pengembalian Buku</h6>
   </div>
   <br>
   <div class="col-md-6 mb-4 text-left">
      <a href="?page=fungsi/tambah_pengembalian" class="btn btn-primary">Kembalikan Buku</a>
   </div>
   <div class="card-body">
      <div class="table-responsive">
         <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
               <tr>
                  <th>No</th>
                  <th>User</th>
                  <th>Buku</th>
                  <th>Tanggal peminjaman</th>
                  <th>Tanggal Pengembalian</th>
                  <th>Status pengembalian</th>
                  <th>Aksi</th>
               </tr>
            </thead>
            <tbody>
               <?php
               $i = 1;
               $query = mysqli_query($koneksi, "SELECT * FROM pengembalian LEFT JOIN user on user.id_user = pengembalian.id_user LEFT JOIN buku on buku.id_buku = pengembalian.id_buku WHERE pengembalian.id_user=" . $_SESSION['user']['id_user']);
               while ($data = mysqli_fetch_array($query)) {
               ?>
                  <tr>
                     <td><?php echo $i++; ?></td>
                     <td><?php echo $data['nama']; ?></td>
                     <td><?php echo $data['judul']; ?></td>
                     <td><?php echo $data['tanggal_pengembalian']; ?></td>
                     <td><?php echo $data['tanggal_pengembalian']; ?></td>
                     <td><?php echo $data['status_pengembalian']; ?></td>
                     <td>
                        <?php
                        if ($data['status_pengembalian'] != 'dikembalikan') {
                        ?>
                           <a class="fa fa-edit btn-info btn-circle" href="?page=fungsi/ubah_pengembalian&&id=<?php echo $data['id_pengembalian']; ?>"></a>
                           <a onclick="return confirm('asli bli pen diapus kuh?')" class="fa fa-trash btn-danger btn-circle" href="?page=fungsi/hapus_pengembalian&&id=<?php echo $data['id_pengembalian']; ?>"></a>
                        <?php
                        }   
                        ?>
                     </td>
                  </tr>
               <?php
               }
               ?>

               </tr>
            </tbody>
         </table>
      </div>
   </div>
</div>