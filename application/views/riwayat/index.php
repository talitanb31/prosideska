<div class="content">
    <div class="row">
        <div class="col-lg-12 ">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page">Riwayat Permintaan Surat</li>
                    <li class="breadcrumb-item " aria-current="page"><a href="<?= site_url("welcome/index") ?>">Dashboard</a></li>
                </ol>
            </nav>

        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table" id="example">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Jenis Surat</th>
                                    <th>User</th>
                                    <th>Admin</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                <?php foreach ($data as $item) : ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= ucwords($item['jenis']) ?></td>
                                        <td><?= $item['penduduk'] ?></td>
                                        <td><?= $item['admin'] !== null ? $item['admin'] : '-' ?></td>
                                        <td><?= $item['status'] ?></td>
                                        <td>
                                            <a href="<?= site_url("listpermintaan/printPdf/") ?><?= $item['id'] . '/' . strtolower(str_replace(' ', '-', $item['jenis']) . '/' . $item['nik']) ?>" target="_blank" onclick="return confirm('Apakah anda yakin ingin mencetak surat ?')" class="btn btn-primary"><i class="fa fa-print"></i></a>
                                        </td>
                                    </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
