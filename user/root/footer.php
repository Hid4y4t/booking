<footer id="footer" class="footer">
    
<?php
                                            //koneksi
                                            include '../koneksi/koneksi.php';
                                            $no = 1;
                                            $data = mysqli_query($conn, "select * from perusahaan");
                                            while ($d = mysqli_fetch_array($data)) {
                                            ?>
<div class="copyright">
      &copy; Copyright <strong><span><?php echo $d['nama_usaha']; ?></span></strong>. 
    </div>
   


    <?php
                                            }
                                            ?>
   


 
  </footer>