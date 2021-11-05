<?php

namespace App\Models;

use CodeIgniter\Model;

class BlogModel extends Model
{
    //model dibuat untuk mengurus masalah database
    protected $table                = 'blogs'; #mendefinisikan tabel kita ngarah ke mana
    //protected $primaryKey           = 'posts_id'; #sesuaiin dg PK yg udh d buat
    protected $allowedFields        = ['judul', 'slug', 'isi', 'created_at', 'updated_at']; #bisa diisi dg fiel2 apa yg bs di akses di tabel kita
    protected $primaryKey           = 'blog_id';
    protected $useTimestamps        = true;

    public function getBlog($slug = false)
    {
        if ($slug == false) {
            return $this->findAll();
        }

        return $this->where(['slug' => $slug])->first();
    }
    // function __construct()
    // {
    //     $this->db = db_connect(); //untuk connect ke db
    // }
    // function tampilblog()
    // {
    //     return $this->db->table('blogs')->get(); //untuk mengakses db di tabel blogs dan di tampilkan
    // }
    // function post($data)
    // {
    //     return $this->db->table('blogs')->insert($data);
    // }
    // function hapus($blog_id)
    // {
    //     return $this->db->table('blogs')->delete(['blog_id' => $blog_id]);
    // }
    // function editdata($blog_id)
    // {
    //     return $this->db->table('blogs')->getWhere(['blog_id' => $blog_id]);
    // }
    // function updatedata($data, $blog_id)
    // {
    //     return $this->db->table('blogs')->update($data, ['blog_id' => $blog_id]);
    // }
}
