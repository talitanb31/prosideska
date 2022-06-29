<div class="content">
    <div class="row">
        <div class="col-lg-12 ">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page">Permintaan Surat</li>
                    <li class="breadcrumb-item " aria-current="page"><a href="<?= site_url("welcome/index") ?>">Dashboard</a></li>
                </ol>
            </nav>

        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <!-- <form action="" method="get" class="row d-flex flex-wrap align-content-center">
                        <div class="col">
                            <div class="form-group">
                                <label for="jenis">Pilih jenis surat</label>
                                <select name="jenis" id="jenis" class="form-control mt-2">
                                    <option value="semua">Semua</option>
                                    <?php foreach ($jenisSurat as $value) : ?>
                                        <option value="<?= $value['id'] ?>" <?= isset($_GET['jenis']) && $_GET['jenis'] == $value['id'] ? 'selected' : '' ?>><?= $value['jenis'] ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                        </div>
                        <div class="col pt-4">
                            <button type="submit" class="btn btn-primary">Filter</button>
                        </div>
                    </form> -->
                    <div class="table-responsive">
                        <table class="table" id="example">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Jenis Surat</th>
                                    <th>User</th>
                                    <th>Admin</th>
                                    <th>Status</th>
                                    <th>Dibuat pada</th>
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
                                        <!-- <td><?= $item['status'] == 'diproses' ? 'menunggu persetujuan kepala desa' : $item['status'] ?></td> -->
                                        <td><?= $item['status'] ?></td>
                                        <td><?= date('d-m-Y', strtotime($item['created_at'])) ?></td>
                                        <td>
                                            <?php if ($item['status'] == 'pending' && $_SESSION['level'] == 'kepaladesa') : ?>
                                                <a href="<?= site_url("listpermintaan/terima/") ?><?= $item['id'] . '/' . $item['nik'] ?>" onclick="return confirm('Apakah anda yakin ingin menerima ?')" class="btn btn-success"><i class="fa fa-check"></i></a>
                                                <a href="<?= site_url("listpermintaan/tolak/") ?><?= $item['id'] . '/' . $item['nik'] ?>" onclick="return confirm('Apakah anda yakin ingin menolak ?')" class="btn btn-danger"><i class="fa fa-close"></i></a>
                                            <?php elseif ($item['status'] == 'pending' && $_SESSION['level'] == 'admin') : ?>
                                                <a href="<?= site_url("listpermintaan/update/") ?><?= $item['id'] ?>" onclick="return confirm('Apakah anda yakin ingin dirubah ?')" class="btn btn-warning"><i class="fa fa-pencil"></i></a>
                                                <a href="<?= site_url("listpermintaan/printPdf/") ?><?= $item['id'] . '/' . strtolower(str_replace(' ', '-', $item['jenis']) . '/' . $item['nik']) ?>" target="_blank" onclick="return confirm('Apakah anda yakin ingin mencetak surat ?')" class="btn btn-primary"><i class="fa fa-print"></i></a>

                                                <!-- <button type="button" class="btn btn-primary editPermintaan" data-id="<?= $item['id'] ?>" data-toggle="modal" data-target="#ListPermintaanModal">
                                                    Edit
                                                </button> -->
                                            <?php elseif ($item['status'] == 'diproses' && $_SESSION['level'] == 'admin') : ?>
                                                <a href="<?= site_url("listpermintaan/printPdf/") ?><?= $item['id'] . '/' . strtolower(str_replace(' ', '-', $item['jenis']) . '/' . $item['nik']) ?>" target="_blank" onclick="return confirm('Apakah anda yakin ingin mencetak surat ?')" class="btn btn-primary"><i class="fa fa-print"></i></a>
                                                <a href="<?= site_url("listpermintaan/done/") ?><?= $item['id'] . '/' . $item['nik'] ?>" target="_blank" onclick="return confirm('Konfirmasi selesai?')" class="btn btn-warning"><i class="fa fa-check-square"></i> Selesai</a>
                                            <?php elseif ($item['status'] == 'selesai') : ?>
                                                <a href="<?= site_url("listpermintaan/printPdf/") ?><?= $item['id'] . '/' . strtolower(str_replace(' ', '-', $item['jenis']) . '/' . $item['nik']) ?>" target="_blank" onclick="return confirm('Apakah anda yakin ingin mencetak surat ?')" class="btn btn-primary"><i class="fa fa-print"></i></a>
                                            <?php else : ?>
                                                -
                                            <?php endif; ?>
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

<!-- Edit list permintaan Modal -->
<div class="modal fade" id="ListPermintaanModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <input type="hidden" name="id" class="id" id="id">
            <div class="modal-body">
                <form action="">
                    <div id="form_data">

                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- edit  -->