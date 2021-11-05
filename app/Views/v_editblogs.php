<div class="container">
    <div class="mt-5">
        <div class="card">
            <div class="card-header">
                Form Edit Blog
            </div>
            <div class="card-body">
                <form action="/blogs/update/<?= $tampilblog['blog_id']; ?>" method="post">
                    <div class="row">
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="judul" placeholder="Judul" id="judul" value="<?= $tampilblog['judul']; ?>"><br>
                            <input type="text" class="form-control" name="slug" placeholder="Slug" id="slug" value="<?= $tampilblog['slug']; ?>"><br>
                        </div>
                        <div class="col-md-8">
                            <textarea rows="10" cols="109" type="text" name="isi" id="isi" value="<?= $tampilblog['isi']; ?>" autocomplete="off" placeholder="Isi" maxlength="3000"></textarea>

                        </div>
                    </div>

                    <br><a href="/blogs"><button type="button" class="btn btn-outline-danger" onclick="return confirm('Discard changes ?'); "> Back </button></a>
                    <button type="submit" class="btn btn-primary"> Update </button>
                </form>
            </div>
        </div>
    </div>
</div>