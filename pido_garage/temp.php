<div class="col"> 
    <div class="card h-100 shadow-sm"> 
        <img src="https://www.freepnglogos.com/uploads/notebook-png/download-laptop-notebook-png-image-png-image-pngimg-2.png" class="card-img-top" alt="..."> 
        <div class="card-body"> <div class="clearfix mb-3"> 
            <span class="float-start badge rounded-pill bg-primary" style="font-size:20px">ASUS Rog</span> 
            <span class="float-end price-hp" style="font-size:20px">12354.00€</span> 
        </div>
        <div class="text-center my-4"> <a href="#" class="btn btn-warning">Check offer</a> 
        </div> 
        </div> 
    </div> 
</div>

<form action="#" method="POST" id="form-edit" enctype="multipart/form-data">
    <div class="form-group"> 
        <label for="username">
            <h6>Nama Mobil</h6>
        </label> 
        <input type="text" name="nama_mobil" placeholder="Card Owner Name" required class="form-control "> 
    </div>
    <div class="form-group"> 
        <label for="merk_mobil">
            <h6>Merk Mobil</h6>
        </label>
        <div class="input-group">
            <select class="form-select" name="merk_mobil" required>
            <option value="<?=$listChef['id_chef']?>">
                                </option>
            </select>       
        </div>
    </div>
    <div class="form-group"> 
        <label for="jenis_mobil">
            <h6>Jenis Mobil</h6>
        </label>
        <div class="input-group">
            <select class="form-select" name="jenis_mobil" required>
            </select>       
        </div>
    </div>
    <div class="form-group"> 
        <label for="tahun_produksi">
            <h6>Tahun Produksi</h6>
        </label>
        <div class="input-group"> 
            <input type="number" name="tahun_produksi" placeholder="Valid card number" class="form-control " required>    
        </div>
    </div>
    <div class="form-group"> 
        <label for="cardNumber">
            <h6>Harga</h6>
        </label>
        <div class="input-group"> 
            <input type="number" name="cardNumber" placeholder="Valid card number" class="form-control " required>    
        </div>
    </div>
    <div class="form-group"> 
        <label for="cardNumber">
            <h6>Foto Mobil</h6>
        </label>
        <div class="input-group">
            <img src="assets/images/supra.png" alt="" width="300" height="300">
            <br>
            <label for="foto_makanan" class="form-label">Abaikan Jika tidak mengganti foto</label>
            <input type="file" name="foto_mobil">    
        </div>
    </div>
    </div>
    <div class="card-footer"> 
        <button type="submit" class="subscribe btn btn-primary btn-block shadow-sm"> Confirm Payment 
        </button>
    </div>
</form>


<section>
        <div class="row text-center mt-4">
          <div class="col-lg-4 col-sm-6 col-xs-12 wow fadeInUp">
            <div class="pricing_design">
              <div class="single-pricing">
                <div class="price-head">
                  <img
                    src="assets/images/dummy.jpeg"
                    class="card-img-top"
                    height="230 px"
                    alt="..." />
                  <h2>NAMA_MOBIL</h2>
                  <h1>Rp. 18999999</h1>
                </div>
                <ul>
                  <li><b>Merk</b> Toyota</li>
                  <li><b>Jenis</b> Sport</li>
                  <li><b>Tahun Pembuatan</b> Email</li>
                </ul>
                <div class="text-center mt-1">
                  <a
                    href="editMobil.php?id='.$row['id_mobil'].'"
                    class="btn btn-warning"
                    >Edit</a
                  >
                  <a
                    href="index.php?delete='.$row['id_mobil'].'"
                    class="btn btn-danger"
                    id="btn-delete"
                    >Delete</a
                  >
                </div>
              </div>
            </div>
          </div>
          <!--- END COL -->
        </div>
      </section>

      <div class="container mt-4" style="width: 750px">
        <center>
            <h2>Tambah Data</h2>
        <center>
        <form>
          <div class="input-group">
            <input type="text" name="add" class="form-control" size="10px" />
            <div class="input-group-append">
              <button type="submit" class="btn btn-primary" name="btn-add">
                Tambah Data
              </button>
            </div>
          </div>
        </form>
      </div>