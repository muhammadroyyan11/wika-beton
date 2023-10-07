<!-- Zero configuration table -->
<section id="basic-datatable">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"><?= $title ?></h4>
                    <div class="pull-right">
                        <button class="btn btn-primary btn-flat" data-toggle="modal" data-target="#default">
                            <i class="fa fa-user-plus"></i> Tambah
                        </button>
                    </div>
                </div>
                <div class="card-content">
                    <div class="card-body card-dashboard">
                        <div class="table-responsive">
                            <table class="table zero-configuration">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Konten</th>
                                        <th>Embed Maps</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($tentang as $key => $data) { ?>

                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><?= $data['about'] ?></td>
                                            <td><?= $data['maps'] ?></td>
                                            <th>
                                                <button class="btn btn-circle btn-warning btn-sm" data-toggle="modal" data-target="#edit<?= $data['id']?>"><i class="fa fa-edit"></i></button>
                                            </th>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- Modal -->
<div class="modal fade text-left" id="default" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg"  role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary white">
                <h4 class="modal-title" id="myModalLabel1">Add <?= strtolower($title) ?></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form form-horizontal" action="<?php echo base_url('tentang/add') ?>" method="post">
                    <div class="form-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group row">
                                    <div class="col-md-4">
                                        <span>Konten</span>
                                    </div>
                                    <div class="col-md-8">
                                        <textarea name="tentang" id="ckeditor" cols="30" rows="10"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group row">
                                    <div class="col-md-4">
                                        <span>Embed Maps</span>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="text" name="maps" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary mr-1 mb-1">Submit</button>
                                <button type="reset" class="btn btn-outline-warning mr-1 mb-1">Reset</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>id_tentang
</div>



<?php
foreach ($tentang as $key => $data) { ?>
    <div class="modal fade text-left" id="edit<?= $data['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary white">
                    <h4 class="modal-title" id="myModalLabel1">Edit <?= strtolower($title) ?></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="form form-horizontal" action="<?php echo base_url('tentang/edit/').$data['id'] ?>" method="post">
                        <div class="form-body">
                            <div class="row">
                            <div class="col-12">
                                <div class="form-group row">
                                    <div class="col-md-4">
                                        <span>Konten</span>
                                    </div>
                                    <div class="col-md-8">
                                        <textarea name="tentang" id="ckeditor2" cols="30" rows="10"><?= $data['about']?></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group row">
                                    <div class="col-md-4">
                                        <span>Embed Maps</span>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="text" name="maps" value="<?= $data['maps']?>" class="form-control">
                                    </div>
                                </div>
                            </div>
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary mr-1 mb-1">Submit</button>
                                    <button type="reset" class="btn btn-outline-warning mr-1 mb-1">Reset</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php }
?>