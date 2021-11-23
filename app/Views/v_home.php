<?= $this->extend('/layout/template'); ?>
<?= $this->section('content'); ?>

<div class="container my-5">
    <h1>SELAMAT DATANG DI BLOG SEDERHANA</h1>
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
                        <button type="button" class="btn btn-success btn-sm" onclick="window.location='<?= site_url('blogs/artikel/' . $blog['slug']) ?>'">detail</button>
                    </td>
                </tr>
            <?php
            endforeach;
            ?>
        </tbody>
    </table>


</div>

<?= $this->endSection(); ?>