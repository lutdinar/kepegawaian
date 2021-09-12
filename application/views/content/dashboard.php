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
                                        <button class="btn btn-sm btn-info" id="<?= $employee->id; ?>" data-toggle="modal" data-target="#detailModal">Lihat</button>
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

