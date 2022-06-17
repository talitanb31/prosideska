<div class="content">
    <!-- Pie Chart -->
    <input type="hidden" id="total_selesai" value="<?= $total_surat_selesai ?>">
    <input type="hidden" id="total_pending" value="<?= $total_surat_pending ?>">
    <input type="hidden" id="total_proses" value="<?= $total_surat_diproses ?>">
    <input type="hidden" id="total_tolak" value="<?= $total_surat_ditolak ?>">
    <!-- END Pie Chart -->
    <!-- Line Chart -->
    <input type="hidden" id="m1" value="<?= $januari ?>">
    <input type="hidden" id="m2" value="<?= $februari ?>">
    <input type="hidden" id="m3" value="<?= $mei ?>">
    <input type="hidden" id="m4" value="<?= $april ?>">
    <input type="hidden" id="m5" value="<?= $mei ?>">
    <input type="hidden" id="m6" value="<?= $juni ?>">
    <input type="hidden" id="m7" value="<?= $juli ?>">
    <input type="hidden" id="m8" value="<?= $agustus ?>">
    <input type="hidden" id="m9" value="<?= $september ?>">
    <input type="hidden" id="m10" value="<?= $oktober ?>">
    <input type="hidden" id="m11" value="<?= $november ?>">
    <input type="hidden" id="m12" value="<?= $desember ?>">
    <!-- END Line Chart -->

    <div class="row">
        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
                <div class="card-body ">
                    <div class="row">
                        <div class="col-5 col-md-4">
                            <div class="icon-big text-center icon-warning">
                                <i class="nc-icon nc-globe text-warning"></i>
                            </div>
                        </div>
                        <div class="col-7 col-md-8">
                            <div class="numbers">
                                <p class="card-category">Jenis Surat</p>
                                <p class="card-title"><?= $total_jenis_surat ?>
                                <p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer ">
                    <hr>
                    <div class="stats">
                        <i class="fa fa-refresh"></i>
                        Total saat ini
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
                <div class="card-body ">
                    <div class="row">
                        <div class="col-5 col-md-4">
                            <div class="icon-big text-center icon-warning">
                                <i class="nc-icon nc-money-coins text-success"></i>
                            </div>
                        </div>
                        <div class="col-7 col-md-8">
                            <div class="numbers">
                                <p class="card-category">Kartu Keluarga</p>
                                <p class="card-title"><?= $total_kartu_keluarga ?>
                                <p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer ">
                    <hr>
                    <div class="stats">
                        <i class="fa fa-calendar-o"></i>
                        Total saat ini
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
                <div class="card-body ">
                    <div class="row">
                        <div class="col-5 col-md-4">
                            <div class="icon-big text-center icon-warning">
                                <i class="nc-icon nc-vector text-danger"></i>
                            </div>
                        </div>
                        <div class="col-7 col-md-8">
                            <div class="numbers">
                                <p class="card-category">Penduduk</p>
                                <p class="card-title"><?= $total_penduduk ?>
                                <p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer ">
                    <hr>
                    <div class="stats">
                        <i class="fa fa-clock-o"></i>
                        Total saat ini
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
                <div class="card-body ">
                    <div class="row">
                        <div class="col-5 col-md-4">
                            <div class="icon-big text-center icon-warning">
                                <i class="nc-icon nc-favourite-28 text-primary"></i>
                            </div>
                        </div>
                        <div class="col-7 col-md-8">
                            <div class="numbers">
                                <p class="card-category">Admin</p>
                                <p class="card-title"><?= $total_admin ?>
                                <p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer ">
                    <hr>
                    <div class="stats">
                        <i class="fa fa-refresh"></i>
                        Total saat ini
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="card ">
                <div class="card-header ">
                    <h5 class="card-title">Statistik Surat</h5>
                    <p class="card-category">Statistik pengajuan surat</p>
                </div>
                <div class="card-body ">
                    <canvas id="chartStatistikSurat"></canvas>
                </div>
                <div class="card-footer ">
                    <div class="legend">
                        <i class="fa fa-circle text-gray"></i> Pending
                        <i class="fa fa-circle text-primary"></i> Diproses
                        <i class="fa fa-circle text-danger"></i> Ditolak
                        <i class="fa fa-circle text-success"></i> Selesai
                    </div>
                    <hr>
                    <div class="stats">
                        <i class="fa fa-calendar"></i> Total pengajuan surat
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card ">
                <div class="card-header ">
                    <h5 class="card-title">Pengajuan Surat</h5>
                    <p class="card-category">24 Hours performance</p>
                </div>
                <div class="card-body ">
                    <canvas id="lineChart" width="400" height="100"></canvas>
                </div>
                <div class="card-footer ">
                    <hr>
                    <div class="stats">
                        <i class="fa fa-history"></i> Tahun ini
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>