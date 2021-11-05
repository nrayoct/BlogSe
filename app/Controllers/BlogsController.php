<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\BlogModel;

class BlogsController extends BaseController
{
    protected $BlogModel;
    public function __construct()
    {
        $this->BlogModel = new BlogModel();
    }
    public function index()
    {   //untuk ngakses
        $blog = $this->BlogModel->findAll(); //untuk nyambungin ke model, untuk pke fungsi yg ada di basemodel. 
        $data = [
            'tampilblog' => $blog
            //menggunakan findall untuk ambil dan tampil semua data. salah satu fungsi dr basemodel
        ];
        echo view('v_blogs', $data);
    }

    public function home()
    {
        $blog = $this->BlogModel->findAll();
        $data = [
            'title' => "Blog - Home",
            'tampilblog' => $blog,
        ];
        //closure : ini kalo ga ada controller
        echo view('layout/header', $data);
        echo view('v_home');
        echo view('layout/footer');
    }

    public function tambahblog()
    {
        session();
        $data = [
            'validation' => \Config\Services::validation(),
            'title' => "Blog - Kelola Blog"
        ];
        //untuk nampilin form tambah blog/isi artikel

        echo view('layout/header', $data);
        echo view('v_tambahblog');
        echo view('layout/footer');
    }

    public function posting()
    {

        $data = [
            'judul' => $this->request->getpost('judul'),
            //getPost ini utk ambil data dari item POST yng ada di form v_blog
            'slug' => $this->request->getpost('slug'),
            'isi' => $this->request->getpost('isi'),
        ];
        $blog = new BlogModel();
        //gunakan insert untuk masukin data ke database. bawaan dri basemodel
        $post = $blog->insert($data);
        if ($post) {
            session()->setFlashdata('message', 'Post Has Been Added');
            session()->setFlashdata('alert-class', 'alert-success');
            return redirect()->to('/blogs');
        }
    }
    //membuat dan mengarahkan button hapus. 
    public function delete($slug)
    {
        $blog = model("BlogModel");
        // $blog = new BlogModel();
        //fungsi delete ini untuk ngapus yang ada di halaman web dan ngambil serta ngapus yg di db
        $blog->where(['slug' => $slug])->delete();
        session()->setFlashdata('message', ' Post Deleted Successfully');
        session()->setFlashdata('alert-class', 'alert-danger');
        return redirect()->to('/blogs');
    }

    public function edit($slug)
    {

        $data = [
            'title' => "Blog - Edit Blog",
            'tampilblog' => $this->BlogModel->getBlog($slug)
        ];
        echo view('layout/header', $data);
        echo view('v_editblogs', $data);
        echo view('layout/footer');
    }

    public function update($slug)
    {
        $blog = model("BlogModel");
        $data = $this->request->getPost();
        $blog->update($slug, $data);
        session()->setFlashdata('message', 'Post Has Been Updated');
        session()->setFlashdata('alert-class', 'alert-success');
        return redirect()->to('/blogs');
    }
}
