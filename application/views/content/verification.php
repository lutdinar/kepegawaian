<div class="page has-sidebar-left height-full">
    <header class="blue accent-3 relative nav-sticky">
        <div class="container-fluid text-white">
            <div class="row p-t-b-10 ">
                <div class="col">
                    <h4>
                        <i class="icon-box"></i>
                        Dashboard
                    </h4>
                </div>
            </div>

        </div>
    </header>
    
    <div class="container-fluid relative animatedParent animateOnce">
        <div class="row my-4 text-white no-gutters shadow">
            <div class="col-lg-4">
                <div class="green counter-box p-40 shadow2">
                    <div class="float-right">
                        <span class="icon icon-check s-48"></span>
                    </div>
                    <div class="sc-counter s-36 counter-animated"><?= $totalDone; ?></div>
                    <h6 class="counter-title">Orang sudah selesai</h6>
                </div>
            </div>
            <div class="col-md-4">
                <div class="strawberry counter-box p-40">
                    <div class="float-right">
                        <span class="icon icon-cancel s-48"></span>
                    </div>
                    <div class="sc-counter s-36 counter-animated"><?= $totalProcess; ?></div>
                    <h6 class="counter-title">Orang belum selesai</h6>
                </div>
            </div>
            <div class="col-md-4">
                <div class="light-blue counter-box p-40">
                    <div class="float-right">
                        <span class="icon icon-user s-48"></span>
                    </div>
                    <div class="sc-counter s-36 counter-animated">192</div>
                    <h6 class="counter-title">Orang Pegawai</h6>
                </div>
            </div>
        </div>

        <?php if ($status != "") { ?>
        <div class="row">
            <div class="col-md-12">
                <?php if ($status == 200) { ?>
                <div class="alert alert-success alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                    </button>
                    <strong>Berhasil!</strong> Data Anda telah tersimpan. Terima kasih
                </div> 
                <?php } else { ?>
                <div class="alert alert-danger alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                    </button>
                    <strong>Kesalahan!</strong> Terjadi kesalahan saat menyimpan data Anda. Silahkan coba lagi!
                </div>
                <?php } ?>
            </div>
        </div>
        <?php } ?>

        <div class="d-flex row">
            <div class="col-md-12 pb-4">
                <div class="card shadow">
                    <div class="card-header white">
                        <h5><strong>Pilih NIP Anda!</strong></h5>
                    </div>
                    <div class="card-body">    
                        <div class="card-title">Cari NIP Anda disini</div>
                            <div class="bg-light">
                                <select class="custom-select select2" id="nipSelect" name="nipSelect" required>
                                    <option value="">- Pilih -</option>
                                    <?php 
                                    if (!empty($employees)) {
                                    foreach ($employees as $employee) { ?>
                                    <option value="<?= $employee->nip; ?>" id="<?= $employee->name; ?>"><?= $employee->nip; ?> - <?= $employee->name; ?></option>
                                    <?php } } ?>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-12 pr-0 pl-0" id="formVerification">
                <div class="card mb-3 shadow no-b r-0">
                    <div class="card-header white">
                        <h6><strong>Pengisian Data MySAPK</strong></h6>
                        <p>Pastikan Anda mengisi secara benar dan jujur sesuai dengan yang telah diisikan pada Aplikasi MySAPK</p>
                    </div>
                    <div class="card-body">
                        <form class="needs-validation" action="<?= base_url('Verification/save') ?>" method="POST" novalidate>
                            <div class="form-group">
                                <input type="text" name="nip" id="nip" class="form-control" value="" required placeholder="NIP">
                                <input type="text" name="nama" id="nama" class="form-control" value="" required placeholder="Nama">  
                            </div>

                            <div class="form-row pb-3">
                                <div class="col-md-4">
                                    <label><strong>Ubah Profil</strong></label><br>
                            
                                    <input type="radio" name="ubahProfil" class="with-gap" value="Y" required onchange="ubahProfile(this)">
                                    <label class="pr-4">Sudah</label>

                                    <input type="radio" name="ubahProfil" class="with-gap" value="N" required onchange="ubahProfile(this)">
                                    <label class="m-l-20">Belum</label>
                    
                                    <textarea name="deskripsiUbahProfil" id="deskripsiUbahProfil" class="form-control" cols="30" rows="3" placeholder="Masukan keterangan mengapa Anda belum menyelesaikan Ubah Profil"></textarea>
                                </div>

                                <div class="col-md-4">
                                    <label><strong>Riwayat Pangkat/Golongan</strong></label><br>

                                    <input type="radio" name="pangkatGolongan" class="with-gap" value="Y" required onchange="ubahPangkat(this)">
                                    <label class="pr-4">Sudah</label>

                                    <input type="radio" name="pangkatGolongan" class="with-gap" value="N" required onchange="ubahPangkat(this)">
                                    <label for="pangkatGolongan" class="m-l-20">Belum</label>

                                    <textarea name="deskripsiPangkatGolongan" id="deskripsiPangkatGolongan" class="form-control" cols="30" rows="3" placeholder="Masukan keterangan mengapa Anda belum menyelesaikan Riwayat Pangkat/Golongan"></textarea>
                                </div>

                                <div class="col-md-4">
                                    <label><strong>Riwayat Pendidikan</strong></label><br>

                                    <input type="radio" name="pendidikan" class="with-gap" value="Y" required onchange="ubahPendidikan(this)">
                                    <label class="pr-4">Sudah</label>

                                    <input type="radio" name="pendidikan" class="with-gap" value="N" required onchange="ubahPendidikan(this)">
                                    <label for="pendidikan" class="m-l-20">Belum</label>

                                    <textarea name="deskripsiPendidikan" id="deskripsiPendidikan" class="form-control" cols="30" rows="3" placeholder="Masukan keterangan mengapa Anda belum menyelesaikan Riwayat Pendidikan"></textarea>  
                                    </div>
                            </div>
                            <hr>

                            <div class="form-row pb-3">
                                <div class="col-md-4">
                                <label><strong>Riwayat Jabatan</strong></label><br>
                                
                                <input type="radio" name="jabatan" class="with-gap" value="Y" required onchange="ubahJabatan(this)">
                                <label class="pr-4">Sudah</label>

                                <input type="radio" name="jabatan" class="with-gap" value="N" required onchange="ubahJabatan(this)">
                                <label for="jabatan" class="m-l-20">Belum</label>
                                
                                <textarea name="deskripsiJabatan" id="deskripsiJabatan" class="form-control" cols="30" rows="3" placeholder="Masukan keterangan mengapa Anda belum menyelesaikan Riwayat Jabatan"></textarea>  
                                </div>

                                <div class="col-md-4">
                                <label><strong>Riwayat Peninjauan Masa Kerja</strong></label><br>
                                
                                <input type="radio" name="masaKerja" class="with-gap" value="Y" required onchange=ubahMasaKerja(this)>
                                <label class="pr-4">Sudah</label>

                                <input type="radio" name="masaKerja" class="with-gap" value="N" required onchange="ubahMasaKerja(this)">
                                <label for="masaKerja" class="m-l-20">Belum</label>
                                
                                <textarea name="deskripsiMasaKerja" id="deskripsiMasaKerja" class="form-control" cols="30" rows="3" placeholder="Masukan keterangan mengapa Anda belum menyelesaikan Riwayat Peninjauan Masa Kerja"></textarea>
                                </div>

                                <div class="col-md-4">
                                <label><strong>Riwayat CPNS/PNS</strong></label><br>
                                
                                <input type="radio" name="cpnsPns" class="with-gap" value="Y" required onchange="ubahCpns(this)">
                                <label class="pr-4">Sudah</label>

                                <input type="radio" name="cpnsPns" class="with-gap" value="N" required onchange="ubahCpns(this)">
                                <label for="cpnsPns" class="m-l-20">Belum</label>
                                
                                <textarea name="deskripsiCpnsPns" id="deskripsiCpnsPns" class="form-control" cols="30" rows="3" placeholder="Masukan keterangan mengapa Anda belum menyelesaikan Riwayat CPNS/PNS"></textarea>  
                                </div>
                            </div>
                            <hr>

                            <div class="form-row pb-3">
                                <div class="col-md-4">
                                <label><strong>Riwayat Diklat/Kursus</strong></label><br>
                                
                                <input type="radio" name="diklatKursus" class="with-gap" value="Y" required onchange="ubahDiklat(this)">
                                <label class="pr-4">Sudah</label>

                                <input type="radio" name="diklatKursus" class="with-gap" value="N" required onchange="ubahDiklat(this)">
                                <label for="diklatKursus" class="m-l-20">Belum</label>
                                
                                <textarea name="deskripsiDiklatKursus" id="deskripsiDiklatKursus" class="form-control" cols="30" rows="3" placeholder="Masukan keterangan mengapa Anda belum menyelesaikan Riwayat Diklat/Kursus"></textarea>  
                                </div>

                                <div class="col-md-4">
                                <label><strong>Riwayat Keluarga</strong></label><br>
                                
                                <input type="radio" name="keluarga" class="with-gap" value="Y" required onchange="ubahKeluarga(this)">
                                <label class="pr-4">Sudah</label>

                                <input type="radio" name="keluarga" class="with-gap" value="N" required onchange="ubahKeluarga(this)">
                                <label for="keluarga" class="m-l-20">Belum</label>
                                
                                <textarea name="deskripsiKeluarga" id="deskripsiKeluarga" class="form-control" cols="30" rows="3" placeholder="Masukan keterangan mengapa Anda belum menyelesaikan Riwayat Keluarga"></textarea>  
                                </div>

                                <div class="col-md-4">
                                <label><strong>Riwayat SKP</strong></label><br>
                                
                                <input type="radio" name="skp" class="with-gap" value="Y" required onchange="ubahSkp(this)">
                                <label class="pr-4">Sudah</label>

                                <input type="radio" name="skp" class="with-gap" value="N" required onchange="ubahSkp(this)">
                                <label for="skp" class="m-l-20">Belum</label>
                                
                                <textarea name="deskripsiSkp" id="deskripsiSkp" class="form-control" cols="30" rows="3" placeholder="Masukan keterangan mengapa Anda belum menyelesaikan Riwayat SKP"></textarea>  
                                </div>
                            </div>
                            <hr>

                            <div class="form-row pb-3">
                                <div class="col-md-4">
                                <label><strong>Riwayat Penghargaan</strong></label><br>
                                
                                <input type="radio" name="penghargaan" class="with-gap" value="Y" required onchange="ubahPenghargaan(this)">
                                <label class="pr-4">Sudah</label>

                                <input type="radio" name="penghargaan" class="with-gap" value="N" required onchange="ubahPenghargaan(this)">
                                <label for="penghargaan" class="m-l-20">Belum</label>
                                
                                <textarea name="deskripsiPenghargaan" id="deskripsiPenghargaan" class="form-control" cols="30" rows="3" placeholder="Masukan keterangan mengapa Anda belum menyelesaikan Riwayat Penghargaan"></textarea>  
                                </div>

                                <div class="col-md-4">
                                <label><strong>Riwayat Organisasi</strong></label><br>
                                
                                <input type="radio" name="organisasi" class="with-gap" value="Y" required onchange="ubahOrganisasi(this)">
                                <label class="pr-4">Sudah</label>

                                <input type="radio" name="organisasi" class="with-gap" value="N" required onchange="ubahOrganisasi(this)">
                                <label for="organisasi" class="m-l-20">Belum</label>
                                
                                <textarea name="deskripsiOrganisasi" id="deskripsiOrganisasi" class="form-control" cols="30" rows="3" placeholder="Masukan keterangan mengapa Anda belum menyelesaikan Riwayat Organisasi"></textarea>  
                                </div>

                                <div class="col-md-4">
                                <label><strong>Riwayat CLTN</strong></label><br>
                                
                                <input type="radio" name="cltn" class="with-gap" value="Y" required onchange="ubahCltn(this)">
                                <label class="pr-4">Sudah</label>

                                <input type="radio" name="cltn" class="with-gap" value="N" required onchange="ubahCltn(this)">
                                <label for="cltn" class="m-l-20">Belum</label>
                                
                                <textarea name="deskripsiCltn" id="deskripsiCltn" class="form-control" cols="30" rows="3" placeholder="Masukan keterangan mengapa Anda belum menyelesaikan Riwayat CLTN"></textarea>  
                                </div>
                            </div>
                            <hr>

                            <button class="btn btn-primary" type="submit">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function() {
        'use strict';
        window.addEventListener('load', function() {
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.getElementsByClassName('needs-validation');
            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(forms, function(form) {
                form.addEventListener('submit', function(event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        }, false);
    })();

    $('#nipSelect').select2();
    $('#formVerification').hide();
    $('#deskripsiUbahProfil').hide();
    $('#deskripsiPangkatGolongan').hide();
    $('#deskripsiPendidikan').hide();
    $('#deskripsiJabatan').hide();
    $('#deskripsiMasaKerja').hide();
    $('#deskripsiCpnsPns').hide();
    $('#deskripsiDiklatKursus').hide();
    $('#deskripsiKeluarga').hide();
    $('#deskripsiSkp').hide();
    $('#deskripsiPenghargaan').hide();
    $('#deskripsiOrganisasi').hide();
    $('#deskripsiCltn').hide();

    $('#nipSelect').change(function() {
        if (this.value != "") {
            $('#formVerification').show();
            $('#nip').val(this.value);
            $('#nama').val(this.options[this.selectedIndex].id);
        } else {
            $('#formVerification').hide();
            $('#nip').val();
            $('#nama').val();
        }
    });
    
    function ubahProfile(e) {
        if (e.value == "N") {
            $('#deskripsiUbahProfil').show();
        } else {
            $('#deskripsiUbahProfil').hide();
        }
    }

    function ubahPangkat(e) {
        if (e.value == "N") {
            $('#deskripsiPangkatGolongan').show();
        } else {
            $('#deskripsiPangkatGolongan').hide();
        }
    }

    function ubahPendidikan(e) {
        if (e.value == "N") {
            $('#deskripsiPendidikan').show();
        } else {
            $('#deskripsiPendidikan').hide();
        }
    }

    function ubahJabatan(e) {
        if (e.value == "N") {
            $('#deskripsiJabatan').show();
        } else {
            $('#deskripsiJabatan').hide();
        }
    }

    function ubahMasaKerja(e) {
        if (e.value == "N") {
            $('#deskripsiMasaKerja').show();
        } else {
            $('#deskripsiMasaKerja').hide();
        }
    }

    function ubahCpns(e) {
        if (e.value == "N") {
            $('#deskripsiCpnsPns').show();
        } else {
            $('#deskripsiCpnsPns').hide();
        }
    }

    function ubahDiklat(e) {
        if (e.value == "N") {
            $('#deskripsiDiklatKursus').show();
        } else {
            $('#deskripsiDiklatKursus').hide();
        }
    }

    function ubahKeluarga(e) {
        if (e.value == "N") {
            $('#deskripsiKeluarga').show();
        } else {
            $('#deskripsiKeluarga').hide();
        }
    }

    function ubahSkp(e) {
        if (e.value == "N") {
            $('#deskripsiSkp').show();
        } else {
            $('#deskripsiSkp').hide();
        }
    }

    function ubahPenghargaan(e) {
        if (e.value == "N") {
            $('#deskripsiPenghargaan').show();
        } else {
            $('#deskripsiPenghargaan').hide();
        }
    }

    function ubahOrganisasi(e) {
        if (e.value == "N") {
            $('#deskripsiOrganisasi').show();
        } else {
            $('#deskripsiOrganisasi').hide();
        }
    }

    function ubahCltn(e) {
        if (e.value == "N") {
            $('#deskripsiCltn').show();
        } else {
            $('#deskripsiCltn').hide();
        }
    }

</script>