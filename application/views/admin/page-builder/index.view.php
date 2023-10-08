<div class="row">
    <div class="col-md-12 mb-4">
        <a href="<?= URL_WEBSITE; ?>/admin/builder/create" class="btn btn-primary">Tambah Halaman</a>
    </div>
    <div class="col-md-12">
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col" width="20px">#</th>
                        <th scope="col">Title</th>
                        <th scope="col" width="200px">Date</th>
                        <th scope="col" width="155px">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($data['lists'] as $list) : ?>
                        <tr>
                            <th scope="row"><?= $no++; ?></th>
                            <td><?= $list['title'] ?></td>
                            <td><?= date('d-m-Y H:i:s', strtotime($list['created_at'])); ?></td>
                            <td>
                                <a href="<?= URL_WEBSITE . DS . 'p' . DS . $list['slug'], URL_END; ?>" target="_blank" class="btn btn-info"><i class="fa fa-eye"></i></a>
                                <a href="<?= URL_WEBSITE . DS; ?>admin/builder/edit<?= DS . $list['id_page_builder']; ?>" class="btn btn-warning"><i class="fa fa-edit"></i></a>

                                <button onclick="deleteData(<?= $list['id_page_builder'] ?>);" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
    <!-- <div class="col-md-12">
        <nav aria-label="Page navigation example">
            <ul class="pagination">
                <li class="page-item"><a class="page-link" href="#"><i class="fa fa-arrow-left"></i></a></li>
                <li class="page-item"><a class="page-link" href="#"><i class="fa fa-arrow-right"></i></a></li>
            </ul>
        </nav>
    </div> -->
</div>

<div class="modal" tabindex="-1" id="ModalDelete">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Modal body text goes here.</p>
            </div>
            <div class="modal-footer">
                <form method="post" action="<?= URL_WEBSITE; ?>/admin/builder/delete/">
                    <input type="hidden" id="id_delete" name="id_delete">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" name="deleted" value="true" class="btn btn-danger"><i class="fa fa-trash"></i> Hapus</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    function deleteData(id) {
        $('#ModalDelete').modal('show');
        $('.modal-title').text('Hapus Data');
        $('.modal-body p').text('Halaman Akan di Hapus apakah kamu yakin?');
        $('#id_delete').val(id);
    }
</script>