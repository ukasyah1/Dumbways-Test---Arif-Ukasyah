<?php 
include('functions.php');

$dataRole = getAllRole();
$data = getAll();

include('layouts/header.php'); 

// var_dump($_POST);
?>

<div class="container" style="margin-top: 30px;">
  <?php if(isset($_POST["nama_hero"]) ) : ?>

    <?php if( tambah($_POST, $_FILES) > 0 ) {?>

      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Data Berhasil Ditambahkan</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div> 

      <?php }else{ ?>

        <div class="alert alert-danger alert-dismissible fade show" role="alert">
          <strong>Data gagal Ditambahkan</strong>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div> 

    <?php }?>

  <?php endif; ?>
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambah">
        Tambah Hero Baru
    </button>

    

    <div class="row mt-3">

      
      <?php foreach($data as $hero) : ?>
        <div class="col-sm mb-3">
              <div class="card bg-dark text-white" style="width: 18rem;" >
              <?php echo '<img style="width: 285px; height:150px;" src="data:image/png;base64,'.base64_encode($hero['gambar']).'"/>'; ?>
                  <div class="card-body">
                      <h5 class="card-title"> <?= $hero['nama_hero']?></h5>
                      <p class="card-text"> 
                        Role : <?= $hero['name_role']; ?> <br>
                        Deskripsi : <?= $hero['deskripsi']; ?>
                      </p>
                        <a href="hapus.php?id=<?= $hero['id_hero']; ?>" class="btn btn-danger btn-sm" type="submit">Hapus</a>
                  </div>
              </div>
        </div>
      <?php endforeach; ?>
        

    </div>

</div>

<!-- Modal -->
<div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Daftar Buku</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

      <form method="post" action="" enctype="multipart/form-data">
            <div class="form-group">
                <label for="judul">Nama Hero</label>
                <input type="text" class="form-control" id="judul" aria-describedby="emailHelp" placeholder="Masukan Judul" name="nama_hero" required>
              </div>
            <div class="form-group">
                <label for="exampleFormControlSelect2">Nama Penulis</label>
                <select required multiple class="form-control" id="exampleFormControlSelect2" name="id_role">
                    <?php foreach($dataRole as $role) : ?>
                        <option value=" <?= $role['id_role']; ?>"> <?= $role['name_role']; ?> </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="jmlHalaman">Deskripsi</label>
                <input required type="text" class="form-control" id="jmlHalaman" name="deskripsi" placeholder="Jumlah Halaman">
            </div>
            <div class="form-group">
                <label for="exampleFormControlFile1">Input Gambar dibawah 1 Mb</label>
                <input required type="file" class="form-control-file" id="exampleFormControlFile1" name="gambar">
            </div> 
        
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>



<?php include('layouts/footer.php'); ?>
