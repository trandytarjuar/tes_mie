<?= view('template/header') ?>

<?= view('template/sidebar') ?>
<!-- Left Sidebar End -->

<!-- ============================================================== -->
<!-- Start Page Content here -->
<!-- ============================================================== -->

<?= view('template/wrapper') ?>
<!-- end Topbar -->

<!-- Start Content-->
<div class="container-fluid">

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Hyper</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Tables</a></li>
                        <li class="breadcrumb-item active">Data Tables</li>
                    </ol>
                </div>
                <h4 class="page-title">Data Tables</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->


    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">Mahasiswa</h4>
                    <?php if (session()->has('error')) : ?>
                        <div class="alert alert-success alert-dismissible bg-danger text-white border-0 fade show" role="alert">
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            <strong>Success - </strong> <?= session()->getFlashdata('error'); ?>
                        </div>
                    <?php endif; ?>

                    <div class="tab-content">
                        <div class="tab-pane show active" id="basic-datatable-preview">
                            <form action="<?= base_url('home/tambahmaha') ?>" class="needs-validation" enctype="multipart/form" method="post" novalidate>
                                <?php foreach ($mahasiswa as $row) : ?>
                                    <div class="mb-3">
                                        <label class="form-label" for="validationCustom01">Nama</label>
                                        <input type="text" class="form-control" id="nama_mhs" name="nama_maha" value="<?= $row->nama ?>" required>
                                    </div>
                                    <label class="form-label" for="validationCustom01">Jenis Kelamin</label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1" value="Laki-Laki">
                                        <label class="form-check-label" for="flexRadioDefault1">
                                            Laki_laki
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" value="perempuan" checked>
                                        <label class="form-check-label" for="flexRadioDefault2">
                                            Perempuan
                                        </label>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label" for="validationCustom01">Alamat</label>
                                        <input type="text" class="form-control" id="alamat" name="alamat" value="<?= $row->alamat ?>" required>

                                    </div>
                                    <table class="table table-centered mb-0">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody id="matkulnambah">

                                            <tr>

                                                <td id="formmatkul"><input class="form-control" id="nama_matkul" name="nama_matkul" value="<?= $row->matkul?>" required></td>
                                                <td>
                                                    <a class="btn btn-primary" onclick="tambahmatkul()">tambah</a>
                                                    <!-- <a class="btn btn-danger" onclick="hapusmatkul()">hapus</a> -->
                                                </td>

                                            </tr>
                                            <tr>

                                            </tr>

                                        </tbody>
                                    </table>
                                    <button class="btn btn-primary">simpan</button>
                                    <a href="<?= base_url('/') ?>" class="btn btn-danger">cancel</a>
                                <?php endforeach; ?>
                            </form>
                        </div> <!-- end preview-->


                    </div> <!-- end tab-content-->

                </div> <!-- end card body-->
            </div> <!-- end card -->
        </div><!-- end col-->
    </div>
    <!-- end row-->



    <!-- end row-->

</div> <!-- container -->

</div> <!-- content -->

<!-- Footer Start -->
<?= view('template/footer') ?>

<?= view('js/create') ?>