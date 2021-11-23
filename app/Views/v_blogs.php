<?= $this->extend('/layout/template'); ?>
<?= $this->section('content'); ?>

<div class="container my-5">
    <h1>KUMPULAN ARTIKEL BLOG SEDERHANA</h1>
    <div class="d-grid gap-2 d-md-flex justify-content-md-center">
        <a href="/blogs/tambahblog"><button type="button" class="btn btn-primary">Tambah Posting</button></a>
    </div>
    <?php
    // Display Response
    if (session()->has('message')) {
    ?>
        <div class="alert <?= session()->getFlashdata('alert-class') ?>" role="alert">
            <?= session()->getFlashdata('message') ?>
        </div>
    <?php
    }
    ?>
    <br>

    <table class="table table-hover" width="1000px" cellpadding="8" cellspacing="0">
        <thead>
            <th>No</th>
            <th>Judul</th>
            <th>Slug</th>
            <th>Isi</th>
            <th>Created Date</th>
            <th>Updated Date</th>
            <th>Aksi</th>
        </thead>
        <tbody>
            <?php
            foreach ($tampilblog as $i => $blog) : ?>
                <tr>
                    <th scope="row"><?= $i + 1; ?></th>
                    <td><?= $blog['judul']; ?></td>
                    <td><?= $blog['slug']; ?></td>
                    <td><?= $blog['isi']; ?></td>
                    <td><?= $blog['created_at']; ?></td>
                    <td><?= $blog['updated_at']; ?></td>
                    <td>
                        <a href="/blogs/edit/<?= $blog['slug'] ?>" class="btn btn-sm btn-warning me-1"></i> Edit </a>
                        <form action="/blogs/<?= $blog['slug'] ?>" method="post" class="d-inline">
                            <?= csrf_field(); ?>
                            <input type="hidden" name="_method" value="DELETE">
                            <button type="submit" class="btn btn-outline-danger" onclick="return confirm('Are you sure want to DELETE this post ?'); ">Delete</button>
                        </form>
                        <!-- <a href="/blogs/editblog"><button>Edit</button></a> -->

                    </td>
                </tr>
            <?php
            endforeach;
            ?>
        </tbody>
    </table>
    <script>
        function hapus(blog_id) {
            message = confirm('Apakah Anda Yakin Ingin Menghapus Postingan Ini? Postingan Akan Terhapus Permanen');
            if (message) {
                window.location.href = ("<?= site_url('blogs/hapus/') ?>") + slug;
            } else return false;
        }
    </script>

</div>

<?= $this->endSection(); ?>