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
                                <tr>
                                    <td>1</td>
                                    <td>Surat Nikah</td>
                                    <td>Muhammad Khalil Z.</td>
                                    <td>Admin Desa</td>
                                    <td>Pending</td>
                                    <td>
                                        <a href="#" class="btn btn-success"><i class="fa fa-check"></i></a>
                                        <a href="#" onclick="return confirm('Apakah anda yakin ingin menolak ?')" class="btn btn-danger"><i class="fa fa-close"></i></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Surat Nikah</td>
                                    <td>Abdul Rasyid</td>
                                    <td>Admin Desa</td>
                                    <td>Diproses</td>
                                    <td>
                                        <a href="#" onclick="return confirm('Apakah anda yakin ingin mencetak surat ini ?')" class="btn btn-primary"><i class="fa fa-print"></i></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>Surat Nikah</td>
                                    <td>Ahmad Jamil</td>
                                    <td>Admin Desa</td>
                                    <td>Selesai</td>
                                    <td>
                                        <a href="#" onclick="return confirm('Apakah anda yakin ingin mencetak surat ini ?')" class="btn btn-primary"><i class="fa fa-print"></i></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>Surat Nikah</td>
                                    <td>Rika Suryani</td>
                                    <td>Admin Desa</td>
                                    <td>Ditolak</td>
                                    <td>
                                        -
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>