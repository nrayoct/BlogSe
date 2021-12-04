<?php

namespace App\Models;

use CodeIgniter\Model;

class BlogModel extends Model
{
    protected $table                = 'blogs'; #mendefinisikan tabel kita ngarah ke mana
    protected $allowedFields        = ['judul', 'slug', 'isi', 'created_at', 'updated_at']; #bisa diisi dg fiel2 apa yg bs di akses di tabel kita
    protected $primaryKey           = 'blog_id';
    protected $useTimestamps        = true;

    public function getTampilBlog($slug = false)
    {
        if ($slug == false) {
            return $this->findAll();
        }

        return $this->where(['slug' => $slug])->first();
    }
}
