<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="//js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
    <script type="text/javascript">
        bkLib.onDomLoaded(nicEditors.allTextAreas);
    </script>
    <title>Blog - Blogs</title>
</head>

<body>
    <div class="container-fluid">
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link <?= \Config\Services::request()->uri->getSegment(1) == '' ? 'active' : '' ?> " aria-current="page" href="/">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?= \Config\Services::request()->uri->getSegment(1) == 'blogs' ? 'active' : '' ?>" href="/blogs">Blog</a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?= \Config\Services::request()->uri->getSegment(1) == 'about' ? 'active' : '' ?>" href="/about">About</a>
            </li>
        </ul>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->

    <h1>KUMPULAN ARTIKEL BLOG SEDERHANA</h1>
    <hr>
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
    <table class="table table-hover">
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
                        <a href="/blogs/edit/<?= $blog['slug'] ?>" class="btn btn-outline-primary"> Edit </a>
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
                window.location.href = ("<?= site_url('blogs/hapus/') ?>") + blog_id;
            } else return false;
        }
    </script>