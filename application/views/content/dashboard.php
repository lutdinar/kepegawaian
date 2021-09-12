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
                    <div class="sc-counter s-36 counter-animated">188</div>
                    <h6 class="counter-title">Orang Pegawai</h6>
                </div>
            </div>
        </div>

        <!-- <div class="paper-card"> -->
            <div class="row my-4">
                <div class="col-md-12">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Daftar Pegawai</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <table class="table table-bordered white">
                                <tbody>
                                <tr>
                                    <th style="width: 10px">No</th>
                                    <th>Nama</th>
                                    <th>Progress</th>
                                    <th style="width: 40px">Label</th>
                                    <th>Aksi</th>
                                </tr>
                                <?php $no=1; foreach ($employees as $employee) { ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $employee->nama; ?></td>
                                    <td>
                                        <div class="progress progress-xs">
                                            <div class="progress-bar progress-bar-danger" style="width: <?= $employee->percent?>%"></div>
                                        </div>
                                    </td>
                                    <?php if ($employee->percent < 30) { ?>
                                    <td><span class="badge text-white bg-red"><?= $employee->percent; ?>%</span>
                                    <?php } else if ($employee->percent >= 31 && $employee->percent < 75) { ?>
                                    <td><span class="badge text-white bg-orange"><?= $employee->percent; ?>%</span>
                                    <?php } else { ?>
                                    <td><span class="badge text-white bg-green"><?= $employee->percent; ?>%</span>
                                    <?php } ?>
                                    </td>
                                    <td>
                                        <button class="btn btn-sm btn-info btn-detail" id="<?= $employee->id; ?>" data-toggle="modal" data-target="#staticBackdrop">Lihat</button>
                                    </td>
                                </tr>
                                <?php } ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer clearfix">
                            <?= $this->pagination->create_links(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <label>Progress :</label>
                <div class="progress">
                    <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 0%" id="percent"></div>
                </div>

                <ul class="list-group mt-3">
                    <li class="list-group-item">
                        Ubah Profil
                        <div class="material-switch float-right">
                            <input id="detailUbahProfil" type="checkbox" disabled/>
                            <label for="detailUbahProfil" class="bg-success"></label>
                        </div>
                        <p id="deskProfil"></p>
                    </li>
                    <li class="list-group-item">
                        Riwayat Pangkat/Golongan
                        <div class="material-switch float-right">
                            <input id="detailPangkat" type="checkbox" disabled/>
                            <label for="detailPangkat" class="bg-success"></label>
                        </div>
                        <p id="deskPangkat"></p>
                    </li>
                    <li class="list-group-item">
                        Riwayat Pendidikan
                        <div class="material-switch float-right">
                            <input id="detailPendidikan" type="checkbox" disabled/>
                            <label for="detailPendidikan" class="bg-success"></label>
                        </div>
                        <p id="deskPendidikan"></p>
                    </li>
                    <li class="list-group-item">
                        Riwayat Jabatan
                        <div class="material-switch float-right">
                            <input id="detailJabatan" type="checkbox" disabled/>
                            <label for="detailJabatan" class="bg-success"></label>
                        </div>
                        <p id="deskJabatan"></p>
                    </li>
                    <li class="list-group-item">
                        Riwayat Peninjauan Masa Kerja
                        <div class="material-switch float-right">
                            <input id="detailMasaKerja" type="checkbox" disabled/>
                            <label for="detailMasaKerja" class="bg-success"></label>
                        </div>
                        <p id="deskMasaKerja"></p>
                    </li>
                    <li class="list-group-item">
                        Riwayat Diklat/Kursus
                        <div class="material-switch float-right">
                            <input id="detailDiklat" type="checkbox" disabled/>
                            <label for="detailDiklat" class="bg-success"></label>
                        </div>
                        <p id="deskDiklat"></p>
                    </li>
                    <li class="list-group-item">
                        Riwayat CPNS/PNS
                        <div class="material-switch float-right">
                            <input id="detailCpns" type="checkbox" disabled/>
                            <label for="detailCpns" class="bg-success"></label>
                        </div>
                        <p id="deskCpns"></p>
                    </li>
                    <li class="list-group-item">
                        Riwayat Keluarga
                        <div class="material-switch float-right">
                            <input id="detailKeluarga" type="checkbox" disabled/>
                            <label for="detailKeluarga" class="bg-success"></label>
                        </div>
                        <p id="deskKeluarga"></p>
                    </li>
                    <li class="list-group-item">
                        Riwayat SKP
                        <div class="material-switch float-right">
                            <input id="detailSkp" type="checkbox" disabled/>
                            <label for="detailSkp" class="bg-success"></label>
                        </div>
                        <p id="deskSkp"></p>
                    </li>
                    <li class="list-group-item">
                        Riwayat Penghargaan
                        <div class="material-switch float-right">
                            <input id="detailPenghargaan" type="checkbox" disabled/>
                            <label for="detailPenghargaan" class="bg-success"></label>
                        </div>
                        <p id="deskPenghargaan"></p>
                    </li>
                    <li class="list-group-item">
                        Riwayat Organisasi
                        <div class="material-switch float-right">
                            <input id="detailOrganisasi" type="checkbox" disabled/>
                            <label for="detailOrganisasi" class="bg-success"></label>
                        </div>
                        <p id="deskOrganisasi"></p>
                    </li>
                    <li class="list-group-item">
                        Riwayat CLTN
                        <div class="material-switch float-right">
                            <input id="detailCltn" type="checkbox" disabled/>
                            <label for="detailCltn" class="bg-success"></label>
                        </div>
                        <p id="deskCltn"></p>
                    </li>
                </ul>
            
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>

<script>
    // $('#deskProfil').hide();
    $('#deskPangkat').hide();
    $('#deskPendidikan').hide();
    $('#deskJabatan').hide();
    $('#deskMasaKerja').hide();
    $('#deskDiklat').hide();
    $('#deskCpns').hide();
    $('#deskKeluarga').hide();
    $('#deskSkp').hide();
    $('#deskPenghargaan').hide();
    $('#deskOrganisasi').hide();
    $('#deskCltn').hide();

    $('.btn-detail').click(function () {
        var data = this.id;

        $.get("<?= base_url('Verification/findDetail') ?>", {emp: data})
        .done(function (data) {
            var dao = JSON.parse(data);

            document.getElementById('staticBackdropLabel').innerHTML = dao.nama;
            document.getElementById('percent').innerHTML = dao.percent+"%";
            document.getElementById('percent').style.width = dao.percent+"%";

            document.getElementById('detailUbahProfil').checked = (dao.ubah_profil == "Y") ? true : false;
            document.getElementById('detailPangkat').checked = (dao.pangkat_golongan == "Y") ? true : false;
            document.getElementById('detailPendidikan').checked = (dao.pendidikan == "Y") ? true : false;
            document.getElementById('detailJabatan').checked = (dao.jabatan == "Y") ? true : false;
            document.getElementById('detailMasaKerja').checked = (dao.peninjauan_masa_kerja == "Y") ? true : false;
            document.getElementById('detailDiklat').checked = (dao.diklat_kursus == "Y") ? true : false;
            document.getElementById('detailCpns').checked = (dao.cpns_pns == "Y") ? true : false;
            document.getElementById('detailKeluarga').checked = (dao.keluarga == "Y") ? true : false;
            document.getElementById('detailSkp').checked = (dao.skp == "Y") ? true : false;
            document.getElementById('detailPenghargaan').checked = (dao.penghargaan == "Y") ? true : false;
            document.getElementById('detailOrganisasi').checked = (dao.organisasi == "Y") ? true : false;
            document.getElementById('detailCltn').checked = (dao.cltn == "Y") ? true : false;

            document.getElementById('deskProfil').innerHTML = dao.deskripsi_ubah_profil;
            document.getElementById('deskPangkat').innerHTML = dao.deskripsi_pangkat_golongan;
            document.getElementById('deskPendidikan').innerHTML = dao.deskripsi_pendidikan;
            document.getElementById('deskJabatan').innerHTML = dao.deskripsi_jabatan;
            document.getElementById('deskMasaKerja').innerHTML = dao.deskripsi_peninjauan_masa_kerja;
            document.getElementById('deskDiklat').innerHTML = dao.deskripsi_diklat_kursus;
            document.getElementById('deskCpns').innerHTML = dao.deskripsi_cpns_pns;
            document.getElementById('deskKeluarga').innerHTML = dao.deskripsi_keluarga;
            document.getElementById('deskSkp').innerHTML = dao.deskripsi_skp;
            document.getElementById('deskPenghargaan').innerHTML = dao.deskripsi_penghargaan;
            document.getElementById('deskOrganisasi').innerHTML = dao.deskripsi_organisasi;
            document.getElementById('deskCltn').innerHTML = dao.deskripsi_cltn;

            (!document.getElementById('detailUbahProfil').checked) ? $('#deskProfil').show() : $('#deskProfil').hide();
            (!document.getElementById('detailPangkat').checked) ? $('#deskPangkat').show() : $('#deskPangkat').hide();
            (!document.getElementById('detailPendidikan').checked) ? $('#deskPendidikan').show() : $('#deskPendidikan').hide();
            (!document.getElementById('detailJabatan').checked) ? $('#deskJabatan').show() : $('#deskJabatan').hide();
            (!document.getElementById('detailMasaKerja').checked) ? $('#deskMasaKerja').show() : $('#deskMasaKerja').hide();
            (!document.getElementById('detailDiklat').checked) ? $('#deskDiklat').show() : $('#deskDiklat').hide();
            (!document.getElementById('detailCpns').checked) ? $('#deskCpns').show() : $('#deskCpns').hide();
            (!document.getElementById('detailKeluarga').checked) ? $('#deskKeluarga').show() : $('#deskKeluarga').hide();
            (!document.getElementById('detailSkp').checked) ? $('#deskSkp').show() : $('#deskSkp').hide();
            (!document.getElementById('detailPenghargaan').checked) ? $('#deskPenghargaan').show() : $('#deskPenghargaan').hide();
            (!document.getElementById('detailOrganisasi').checked) ? $('#deskOrganisasi').show() : $('#deskOrganisasi').hide();
            (!document.getElementById('detailCltn').checked) ? $('#deskCltn').show() : $('#deskCltn').hide();
        })
        .fail(function () {
            alert("Terjadi kesalahan saat memuat data");
            window.location.reload();
        })
    });
</script>