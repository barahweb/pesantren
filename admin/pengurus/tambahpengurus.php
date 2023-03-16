  <?php

    if (isset($_POST['submit'])) {
        if (tambahAdmin($_POST) > 0) {
            echo "<script>
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'Data berhasil ditambahkan',
                    showConfirmButton: false,
                    timer: 1500
                }).then(() => {
                    document.location.href = 'index.php?page=tambahpengurus'
                })
            </script>";
        } else {
            echo "<script>
                Swal.fire({
                    position: 'center',
                    icon: 'error',
                    title: 'Data gagal ditambahkan',
                    showConfirmButton: false,
                    timer: 1500
                }).then(() => {
                    document.location.href = 'index.php?page=tambahpengurus'
                })
            </script>";
        }
    }
    ?>


  <!-- Main Content -->
  <div class="main-content">
      <section class="section">
          <div class="section-header">
              <h1>Tambah Pengurus</h1>
              <div class="section-header-breadcrumb">
                  <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                  <div class="breadcrumb-item"><a href="index.php?page=pengurus">Pengurus</a></div>
                  <div class="breadcrumb-item">Tambah Pengurus</div>
              </div>
          </div>

          <div class="section-body">

              <div class="row">
                  <div class="col-12 col-md-12 col-lg-12">
                      <div class="card">
                          <form class="" id="formadmin" method="post" action="">
                              <div class="card-body">
                                  <div class="row">
                                      <div class="col-lg-6">
                                          <div class="form-group">
                                              <label>Nama Pengurus</label>
                                              <input type="text" name="nama" id="nama" class="form-control" required>
                                          </div>
                                      </div>
                                      <div class="col-lg-6">
                                          <div class="form-group">
                                              <label for="email">Email</label>
                                              <input class="form-control" type="email" name="email" id="email" required>
                                          </div>
                                      </div>

                                      <div class="col-lg-6">
                                          <div class="form-group">
                                              <label for="password">Password</label>
                                              <input class="form-control" type="password" name="password" id="password" required>
                                          </div>
                                      </div>

                                      <div class="col-lg-6">
                                          <div class="form-group">
                                              <label for="tanggal">Tanggal Lahir</label>
                                              <input class="form-control" type="date" name="tanggal" id="tanggal" required>
                                          </div>
                                      </div>

                                      <div class="col-lg-6">
                                          <div class="form-group">
                                              <label for="nohp">No Hp</label>
                                              <input class="form-control" type="text" name="nohp" id="nohp" required>
                                          </div>
                                      </div>

                                      <div class="col-lg-6">
                                          <div class="form-group">
                                              <label for="bidang">Bidang</label>
                                              <input class="form-control" type="text" name="bidang" id="bidang" required>
                                          </div>
                                      </div>

                                      <div class="col-lg-12">
                                          <div class="form-group">
                                              <label for="nohp">Hak Akses</label>
                                              <select name="hak" id="hak" class="form-control">
                                                  <option value="Pengurus">Pengurus</option>
                                                  <option value="Pimpinan">Pimpinan</option>
                                              </select>
                                          </div>
                                      </div>
                                      <div class="col-lg-12">
                                          <div class="form-group">
                                              <label for="alamat">Alamat</label>
                                              <textarea name="alamat" id="alamat" class="form-control" cols="30" rows="10" required></textarea>
                                          </div>
                                      </div>
                                  </div>


                              </div>
                              <div class="card-footer text-right">
                                  <button class="btn btn-primary" type="submit" name="submit">Submit</button>
                              </div>
                          </form>
                      </div>
                  </div>

              </div>
          </div>
      </section>
  </div>