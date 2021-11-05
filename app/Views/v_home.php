<h1>SELAMAT DATANG DI BLOG SEDERHANA</h1>
<hr>
<br>
<!-- <div class="load-more">
    <div class="card card-inline">
        <div class="card-header">

        </div>
    </div>
</div> -->
<table class="table table-hover">
    <thead>
        <th>No</th>
        <th>Judul</th>
        <th>Slug</th>
        <th>Isi</th>
        <th>Created Date</th>
        <th>Updated Date</th>
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
            </tr>
        <?php
        endforeach;
        ?>
    </tbody>
</table>