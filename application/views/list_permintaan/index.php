<div class="content">
    <div class="row">
        <div class="col-lg-12 ">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page">Permintaan Surat</li>
                    <li class="breadcrumb-item " aria-current="page"><a href="<?=site_url("welcome/index")?>">Dashboard</a></li>
                </ol>
            </nav>
         
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                <!-- <div class="d-flex justify-content-start mb-4">
                    <a href="" class="btn btn-primary p-3">Tambah Data</a>
                </div> -->
                    <div class="table-responsive">
                        <table class="table">
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
                                <?php foreach($data as $item) : ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= ucwords($item['jenis']) ?></td>
                                        <td><?= $item['penduduk'] ?></td>
                                        <td><?= $item['admin'] !== null ? $item['admin'] : '-' ?></td>
                                        <td><?= $item['status'] ?></td>
                                        <td>
                                            <?php if($item['status'] == 'pending'): ?>
                                            <a href="<?= site_url("listpermintaan/terima/") ?><?= $item['id'].'/'.$item['nik'] ?>" onclick="return confirm('Apakah anda yakin ingin menerima ?')" class="btn btn-success"><i class="fa fa-check"></i></a>
                                            <a href="<?= site_url("listpermintaan/tolak/") ?><?= $item['id'].'/'.$item['nik'] ?>" onclick="return confirm('Apakah anda yakin ingin menolak ?')" class="btn btn-danger"><i class="fa fa-close"></i></a>
                                            <?php elseif($item['status'] == 'diproses' || $item['status'] == 'selesai'): ?>
                                            <a href="<?= site_url("listpermintaan/cetak/") ?><?= $item['id'].'/'.$item['nik'] ?>" onclick="return confirm('Apakah anda yakin ingin mencetak surat ?')" class="btn btn-primary"><i class="fa fa-print"></i></a>
                                            <?php else: ?>
                                                -
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                <?php endforeach?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>