<?php

namespace App\Controllers;

use App\Controllers\BaseControllers;
use App\Models\BlogModel;

class BlogsController extends BaseController
{
    protected $BlogModel;
    public function __construct()
    {
        $this->BlogModel = new BlogModel();
    }

    public function index()
    {
        $keyword = $this->request->getVar('keyword');
        $tampilblog = null;
        if ($keyword) {
            $tampilblog = $this->BlogModel->like('judul', $keyword)->get()->getResultArray();
        } else {
            $tampilblog = $this->BlogModel->findAll();
        }

        // $blog = $this->BlogModel->findAll();
        $data = [
            'title' => "Blog - Blogs",
            'tampilblog' => $tampilblog   //mengambil dan menampilkan data. findAll fungsi bawaan model (code igniter base model)
        ];
        return view('v_blogs', $data);
    }

    public function home()
    {
        $keyword = $this->request->getVar('keyword');
        $tampilblog = null;
        if ($keyword) {
            $tampilblog = $this->BlogModel->like('judul', $keyword)->get()->getResultArray();
        } else {
            $tampilblog = $this->BlogModel->findAll();
        }
        // $blog = $this->BlogModel->findAll();
        $data = [
            'title' => "Blog - Home",
            'tampilblog' => $tampilblog //mengambil dan menampilkan semua data. findAll fungsi bawaan model (code igniter base model)
        ];
        //closure : ini kalo ga ada controller
        return view('v_home', $data);
    }

    public function about()
    {   //untuk menampilkan form tambah blog
        $data = [
            'title' => "About"
        ];

        return view('v_about', $data);
    }

    public function detail($slug)
    {
        //divideo wpu model part 2 menit ke 3.50
        //ngambil slug
        $blog = $this->BlogModel->getTampilBlog($slug);
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
    {   //validasi input
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
        return redirect()->to('/blogs');
    }

    public function hapus($slug)
    {
        $BlogModel = model('BlogModel');
        $BlogModel->where(['slug' => $slug])->delete();     //delete adalah fungsi bawaan model untuk menghapus data
        return redirect()->to('/blogs');
    }

    public function editblog($slug)
    {
        session();
        $data = [
            'title' => "Blog - Edit Blog",
            'validation' => \Config\Services::validation(),
            'tampilblog' => $this->BlogModel->getTampilBlog($slug)
        ];
        return view('v_editblog', $data);
    }


    public function updateblog($blog_id)
    { //cek judul
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

            return redirect()->to('/blogs/editblog/' . $this->request->getVar('slug'))->withInput()->with('validation', $validation);
        }

        $slug = url_title($this->request->getVar('judul'), '-', true);
        $this->BlogModel->save([
            'blog_id' => $blog_id,
            'judul' => $this->request->getVar('judul'),
            //getPost ini utk ambil data dari item POST yng ada di form v_blog
            'slug' => $slug,
            'isi' => $this->request->getVar('isi')
        ]);
        return redirect()->to('/blogs');
    }
}
