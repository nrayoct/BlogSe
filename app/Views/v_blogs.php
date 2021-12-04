<?= $this->extend('/layouts/template'); ?>
<?= $this->section('content'); ?>

<div class="site-section">
    <div class="container">
        <div class="section-title">
            <h2>Kelola Blog</h2>
        </div>
        <div class="d-grid gap-2 d-md-flex justify-content-md-center">
            <a href="/blogs/tambahblog"><button class="btn btn-primary">Tambah Blog</button></a>
        </div>
        <br><br>
        <table class="table-hover" width="1100px" cellpadding="8" cellspacing="0">
            <thead align="center">
                <th width="100px">Judul</th>
                <th width="100px">Slug</th>
                <th width="400px">Isi</th>
                <th>Created Date</th>
                <th>Updated Date</th>
                <th>Aksi</th>
            </thead>
            <tbody class="align-top">
                <?php
                $blog_id = 0;
                foreach ($tampilblog as $row) :
                    $blog_id++;
                ?>
                    <tr>
                        <td><?= $row['judul']; ?></td>
                        <td><?= $row['slug']; ?></td>
                        <td><?= $row['isi']; ?></td>
                        <td><?= $row['created_at']; ?></td>
                        <td><?= $row['updated_at']; ?></td>
                        <td>
                            <button type="button" class="btn btn-success btn-sm" onclick="window.location='<?= site_url('blogs/editblog/' . $row['slug']) ?>'">Edit</button>
                            <button type="button" class="btn btn-danger btn-sm" onclick="hapus('<?= $row['slug'] ?>')">Hapus</button>
                        </td>
                    </tr>
                <?php
                endforeach;
                ?>
            </tbody>
        </table>
        <script>
            function hapus(slug) {
                message = confirm('Apakah Anda yakin ingin menghapus postingan?');
                if (message) {
                    window.location.href = ("<?= site_url('blogs/hapus/') ?>") + slug;
                } else return false;
            }
        </script>

    </div>
</div>

<?= $this->endSection(); ?>