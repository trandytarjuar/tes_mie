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
                    <a href="<?= base_url('/home/create') ?>" class="btn btn-primary">Add</a>
                    <div class="tab-content">
                        <?php if (session()->has('success')) : ?>
                            <div class="alert alert-success alert-dismissible bg-success text-white border-0 fade show" role="alert">
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                <strong>Success - </strong> <?= session()->getFlashdata('success'); ?>
                            </div>
                        <?php endif; ?>
                        <div class="tab-pane show active" id="basic-datatable-preview">
                            <table id="tes" class="table dt-responsive nowrap w-100">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Name</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Alamat</th>
                                        <th>Jumlah Mata Kuliah</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; ?>
                                    <?php foreach ($Mahasiswa as $row) : ?>
                                        <?php if ($row->deleteDate == null) : ?>
                                            <tr>
                                                <td><?= $no++ ?></td>
                                                <td><?= $row->nama ?></td>
                                                <td><?= $row->jenis_kelamin ?></td>
                                                <td><?= $row->alamat ?></td>
                                                <td><?= $row->jumlah_sks ?></td>
                                                <td>
                                                <a class="btn btn-primary" href="<?= base_url('home/edit/') . $row->id ?>">Edit</a>
                                                    <a class="btn btn-danger" onclick="delete_mahasiswa('<?= $row->id ?>')">Delete</a>
                                                </td>
                                            </tr>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
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

<?= view('js/index') ?>