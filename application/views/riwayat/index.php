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
                    <form action="" method="get" class="row d-flex flex-wrap align-content-center">
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
                    </form>
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
                                        <td><?= $item['status'] ?></td>
                                        <td><?= date('d-m-Y', strtotime($item['created_at'])) ?></td>
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