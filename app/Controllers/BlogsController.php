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
            'title' => "Blog - Blog",
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
            'tampilblog' => $blog
        ];
        //closure : ini kalo ga ada controller
        echo view('v_home', $data);
    }

    public function detail($slug)
    {
        //divideo wpu model part 2 menit ke 3.50
        //ngambil slug
        $blog = $this->BlogModel->getBlog($slug);
        $data = [
            'title' => "Blog - Detail",
            'tampilblog' => $blog
        ];

        //jika artikel tidak ada
        if (empty($data['tampilblog'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Article ' . $slug . ' not found.');
        }
        return view('v_detailblog', $data);
    }

    public function tambahblog()
    {
        session(); //jalanin fungsi session untuk ambil validasi yang tadi
        $data = [
            'validation' => \Config\Services::validation(),
            'title' => "Blog - Kelola Blog"
        ];
        //untuk nampilin form tambah blog/isi artikel
        echo view('v_tambahblog', $data);
    }

    public function posting()
    {
        //validasi input
        if (!$this->validate([
            'judul' => [
                'rules' => 'required|is_unique[blogs.judul]',
                'errors' => [
                    'required' => '{field} artikel harus diisi!',
                    'is_unique' => '{field} artikel sudah terdaftar!'
                ]
            ],
            'isi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} artikel harus diisi!'
                ]
            ]
        ])) {
            $validation = \Config\Services::validation();

            return redirect()->to('/blogs/tambahblog')->withInput()->with('validation', $validation);
        }


        $slug = url_title($this->request->getVar('judul'), '-', true);
        $this->BlogModel->save([
            'judul' => $this->request->getVar('judul'),
            //getPost ini utk ambil data dari item POST yng ada di form v_blog
            'slug' => $slug,
            'isi' => $this->request->getVar('isi')
        ]);
        session()->setFlashdata('message', 'Post Has Been Added');
        session()->setFlashdata('alert-class', 'alert-success');
        return redirect()->to('/blogs');
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
        session();
        $data = [
            'title' => "Blog - Edit Blog",
            'validation' => \Config\Services::validation(),
            'tampilblog' => $this->BlogModel->getBlog($slug)
        ];
        echo view('v_editblogs', $data);
    }

    public function update($blog_id)
    {
        //cek judul
        $blogLama = $this->BlogModel->getBlog($this->request->getVar('slug'));
        if ($blogLama['judul'] == $this->request->getVar('judul')) {
            $rule_judul = 'required';
        } else {
            $rule_judul = 'required|is_unique[blogs.judul]';
        }

        //validasi input
        if (!$this->validate([
            'judul' => [
                'rules' => $rule_judul,
                'errors' => [
                    'required' => '{field} artikel harus diisi!',
                    'is_unique' => '{field} artikel sudah terdaftar!'
                ]
            ],
            'isi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} artikel harus diisi!'
                ]
            ]
        ])) {
            $validation = \Config\Services::validation();

            return redirect()->to('/blogs/edit/' . $this->request->getVar('slug'))->withInput()->with('validation', $validation);
        }

        $slug = url_title($this->request->getVar('judul'), '-', true);
        $this->BlogModel->save([
            'blog_id' => $blog_id,
            'judul' => $this->request->getVar('judul'),
            //getPost ini utk ambil data dari item POST yng ada di form v_blog
            'slug' => $slug,
            'isi' => $this->request->getVar('isi')
        ]);
        session()->setFlashdata('message', 'Post Has Been Updated');
        session()->setFlashdata('alert-class', 'alert-success');
        return redirect()->to('/blogs');
    }
}
