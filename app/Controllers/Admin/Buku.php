<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Buku_model;
use App\Models\Dosen_model;
use App\Models\Kategori_buku_model;
use CodeIgniter\Validation\Rules;

class Buku extends BaseController 
{ 
    public function index()
    {
        checklogin();
        $m_buku          = new Buku_model();
        $m_kategori_buku = new Kategori_buku_model();
        $buku            = $m_buku->listing();
        // var_dump($buku);
        $total             = $m_buku->total();
        $data = ['title' => 'Data File buku (' . $total . ')',
            'buku'   => $buku,
            'content'    => 'admin/buku/index',
        ];
        echo view('admin/layout/wrapper', $data);
    }
     // Tambah 
     public function tambah()
     {
        
        checklogin();
        
        $m_buku          = new Buku_model();
        $m_kategori_buku = new Kategori_buku_model();
        $m_dosen          = new Dosen_model();
        $dosen            = $m_dosen->listing();
        $kategori_buku   = $m_kategori_buku->listing();
     

         // Start validasi
         if ($this->request->getMethod() === 'post' && $this->validate(
             [
                 'judul_buku' => 'required',
                 'gambar' => [
                     'mime_in[gambar,image/jpg,image/jpeg,image/gif,image/png]',
                     'max_size[gambar,4096]',
                 ],
                 'fileUpload' => [
                    // 'uploaded[fileUpload]',
                    'mime_in[fileUpload,image/jpg,image/jpeg,image/gif,image/png,application/pdf,document/doc,application/msword,application/xls,application/xlsx,application/ppt,application/pptx]',
                    'max_size[fileUpload,4096]',
                ],
             ]
         )) {
             if (! empty($_FILES['gambar']['name']) && ! empty($_FILES['fileUpload']['name'])) {
                 // Image upload
                    $avatar   = $this->request->getFile('gambar');
                    $namabaru = str_replace(' ', '-', $avatar->getName());
                    $avatar->move(WRITEPATH . '../assets/upload/buku/', $namabaru);
                    // Create thumb
                    $image = \Config\Services::image()
                        ->withFile(WRITEPATH . '../assets/upload/buku/' . $namabaru)
                        ->fit(100, 100, 'center')
                        ->save(WRITEPATH . '../assets/upload/buku/thumbs/' . $namabaru);
                         //FileUpload
                    $file   = $this->request->getFile('fileUpload');
                    $newnamefile = str_replace(' ', '-', $file->getName());
                    $file->move(WRITEPATH . '../assets/upload/file/', $namabaru);
                    $data =[
                        'jenis_kode'=>$this->request->getVar('jenis_kode'),
                        'kode_buku'=>$this->request->getVar('kode_buku'),
                        'id_dosen'=>$this->request->getVar('id_dosen'),
                        'id_kategori_buku'=>$this->request->getVar('id_kategori_buku'),
                        'id_user'=>$this->session->get('id_user'),
                        'judul_buku'=>$this->request->getVar('judul_buku'),
                        'jenis_buku'=>$this->request->getVar('jenis_buku'),
                        'isi'=>$this->request->getVar('isi'),
                        'gambar'=>$namabaru,
                        'file'=>$newnamefile,
                        'penulis'=>$this->request->getVar('penulis'),
                        'penerbit'=>$this->request->getVar('penerbit'),
                        'tanggal_terbit'     =>date('Y-m-d', strtotime($this->request->getVar('tanggal_terbit'))) . ' ' . date('H:i', strtotime($this->request->getVar('jam'))),
                        'tanggal_publish'=>date('Y-m-d', strtotime($this->request->getVar('tanggal_publish'))) . ' ' . date('H:i', strtotime($this->request->getVar('jam'))),
                        'website'=>$this->request->getVar('website'),
                        'keyword'=>$this->request->getVar('keyword'),
                        'status'=>$this->request->getVar('status'),
                    ];
                    $buku = $m_buku->tambah($data);
                    return redirect()->to(base_url('admin/buku/'))->with('sukses', 'Data Berhasil di Simpan');
             }else if(! empty($_FILES['gambar']['name'])&& empty($_FILES['fileUpload']['name'])) {
                    $avatar   = $this->request->getFile('gambar');
                    $namabaru = str_replace(' ', '-', $avatar->getName());
                    $avatar->move(WRITEPATH . '../assets/upload/buku/', $namabaru);
                    // Create thumb
                    $image = \Config\Services::image()
                        ->withFile(WRITEPATH . '../assets/upload/buku/' . $namabaru)
                        ->fit(100, 100, 'center')
                        ->save(WRITEPATH . '../assets/upload/buku/thumbs/' . $namabaru);
                    $data =[
                        'jenis_kode'=>$this->request->getVar('jenis_kode'),
                        'kode_buku'=>$this->request->getVar('kode_buku'),
                        'id_dosen'=>$this->request->getVar('id_dosen'),
                        'id_kategori_buku'=>$this->request->getVar('id_kategori_buku'),
                        'id_user'=>$this->session->get('id_user'),
                        'judul_buku'=>$this->request->getVar('judul_buku'),
                        'jenis_buku'=>$this->request->getVar('jenis_buku'),
                        'isi'=>$this->request->getVar('isi'),
                        'gambar'=>$namabaru,
                        'penulis'=>$this->request->getVar('penulis'),
                        'penerbit'=>$this->request->getVar('penerbit'),
                        'tanggal_terbit'     =>date('Y-m-d', strtotime($this->request->getVar('tanggal_terbit'))) . ' ' . date('H:i', strtotime($this->request->getVar('jam'))),
                        'tanggal_publish'=>date('Y-m-d', strtotime($this->request->getVar('tanggal_publish'))) . ' ' . date('H:i', strtotime($this->request->getVar('jam'))),
                        'website'=>$this->request->getVar('website'),
                        'keyword'=>$this->request->getVar('keyword'),
                        'status'=>$this->request->getVar('status'),
                    ];

                    $buku = $m_buku->tambah($data);
                    return redirect()->to(base_url('admin/buku/'))->with('sukses', 'Data Berhasil di Simpan');
                    
             }else if( empty($_FILES['gambar']['name'])&& !empty($_FILES['fileUpload']['name'])) {
                    //FileUpload
                    $file   = $this->request->getFile('fileUpload');
                    $newnamefile = str_replace(' ', '-', $file->getName());
                    $file->move(WRITEPATH . '../assets/upload/file/', $namabaru);
                    //kumpulkan data
                    $data =[
                        'jenis_kode'=>$this->request->getVar('jenis_kode'),
                        'kode_buku'=>$this->request->getVar('kode_buku'),
                        'id_dosen'=>$this->request->getVar('id_dosen'),
                        'id_kategori_buku'=>$this->request->getVar('id_kategori_buku'),
                        'id_user'=>$this->session->get('id_user'),
                        'judul_buku'=>$this->request->getVar('judul_buku'),
                        'jenis_buku'=>$this->request->getVar('jenis_buku'),
                        'isi'=>$this->request->getVar('isi'),
                        'file'=>$newnamefile,
                        'penulis'=>$this->request->getVar('penulis'),
                        'penerbit'=>$this->request->getVar('penerbit'),
                        'tanggal_terbit'     =>date('Y-m-d', strtotime($this->request->getVar('tanggal_terbit'))) . ' ' . date('H:i', strtotime($this->request->getVar('jam'))),
                        'tanggal_publish'=>date('Y-m-d', strtotime($this->request->getVar('tanggal_publish'))) . ' ' . date('H:i', strtotime($this->request->getVar('jam'))),
                        'website'=>$this->request->getVar('website'),
                        'keyword'=>$this->request->getVar('keyword'),
                        'status'=>$this->request->getVar('status'),
                        ];

                        $buku = $m_buku->tambah($data);
                        return redirect()->to(base_url('admin/buku/'))->with('sukses', 'Data Berhasil di Simpan');
                        
             }
                
                // masuk database
                $data =[
                    'jenis_kode'        =>$this->request->getVar('jenis_kode'),
                    'kode_buku'         =>$this->request->getVar('kode_buku'),
                    'id_dosen'=>$this->request->getVar('id_dosen'),
                    'id_kategori_buku'  =>$this->request->getVar('id_kategori_buku'),
                    'id_user'           =>$this->session->get('id_user'),
                    'judul_buku'        =>$this->request->getVar('judul_buku'),
                    'jenis_buku'        =>$this->request->getVar('jenis_buku'),
                    'isi'               =>$this->request->getVar('isi'),
                    'penulis'           =>$this->request->getVar('penulis'),
                    'penerbit'          =>$this->request->getVar('penerbit'),
                    'tanggal_terbit'     =>date('Y-m-d', strtotime($this->request->getVar('tanggal_terbit'))) . ' ' . date('H:i', strtotime($this->request->getVar('jam'))),
                    'tanggal_publish'   =>date('Y-m-d', strtotime($this->request->getVar('tanggal_publish'))) . ' ' . date('H:i', strtotime($this->request->getVar('jam'))),
                    'website'           =>$this->request->getVar('website'),
                    'keyword'           =>$this->request->getVar('keyword'),
                    'status'            =>$this->request->getVar('status'),
            ];
            // var_dump($data);
            $buku = $m_buku->tambah($data);
            return redirect()->to(base_url('admin/buku/'))->with('sukses', 'Data Berhasil di Simpan');

         }
 
        //form tambah data
        $data = ['title'        => 'Tambah buku',
                'kategori_buku' => $kategori_buku,
                'dosen'         => $dosen,
                'content'       => 'admin/buku/tambah',
        ];
        echo view('admin/layout/wrapper', $data);
     }

   
    // edit
    public function edit($id_buku)
    {
        checklogin();
        $m_kategori_buku = new Kategori_buku_model();
        $m_buku          = new Buku_model();
        $m_dosen          = new Dosen_model();
        $dosen            = $m_dosen->listing();
        $kategori_buku   = $m_kategori_buku->listing();
        $buku            = $m_buku->detail($id_buku);
        if ($this->request->getMethod() === 'post' && $this->validate(
            [
                'judul_buku' => 'required',
                'gambar' => [
                    'mime_in[gambar,image/jpg,image/jpeg,image/gif,image/png]',
                    'max_size[gambar,4096]',
                ],
                'fileUpload' => [
                   // 'uploaded[fileUpload]',
                   'mime_in[fileUpload,image/jpg,image/jpeg,image/gif,image/png,application/pdf,document/doc,application/msword,application/xls,application/xlsx,application/ppt,application/pptx]',
                   'max_size[fileUpload,4096]',
               ],
            ]
        )) {
            if (! empty($_FILES['gambar']['name']) && ! empty($_FILES['fileUpload']['name'])) {
                // Image upload
                   $avatar   = $this->request->getFile('gambar');
                   $namabaru = str_replace(' ', '-', $avatar->getName());
                   $avatar->move(WRITEPATH . '../assets/upload/buku/', $namabaru);
                   // Create thumb
                   $image = \Config\Services::image()
                       ->withFile(WRITEPATH . '../assets/upload/buku/' . $namabaru)
                       ->fit(100, 100, 'center')
                       ->save(WRITEPATH . '../assets/upload/buku/thumbs/' . $namabaru);
                        //FileUpload
                   $file   = $this->request->getFile('fileUpload');
                   $newnamefile = str_replace(' ', '-', $file->getName());
                   $file->move(WRITEPATH . '../assets/upload/file/', $namabaru);
                   $data =[
                       'id_buku'            =>$id_buku,
                       'jenis_kode'         =>$this->request->getVar('jenis_kode'),
                       'kode_buku'          =>$this->request->getVar('kode_buku'),
                       'id_dosen'           =>$this->request->getVar('id_dosen'),
                       'id_kategori_buku'   =>$this->request->getVar('id_kategori_buku'),
                       'id_user'            =>$this->session->get('id_user'),
                       'judul_buku'         =>$this->request->getVar('judul_buku'),
                       'jenis_buku'         =>$this->request->getVar('jenis_buku'),
                       'isi'                =>$this->request->getVar('isi'),
                       'gambar'             =>$namabaru,
                       'file'               =>$newnamefile,
                       'penulis'            =>$this->request->getVar('penulis'),
                       'penerbit'           =>$this->request->getVar('penerbit'),
                       'tanggal_terbit'     =>date('Y-m-d', strtotime($this->request->getVar('tanggal_terbit'))) . ' ' . date('H:i', strtotime($this->request->getVar('jam'))),
                       'tanggal_publish'    =>date('Y-m-d', strtotime($this->request->getVar('tanggal_publish'))) . ' ' . date('H:i', strtotime($this->request->getVar('jam'))),
                       'website'            =>$this->request->getVar('website'),
                       'keyword'            =>$this->request->getVar('keyword'),
                       'status'             =>$this->request->getVar('status'),
                   ];
                   $buku = $m_buku->edit($data);
                   return redirect()->to(base_url('admin/buku/'))->with('sukses', 'Data Berhasil di Simpan');
            }else if(! empty($_FILES['gambar']['name'])&& empty($_FILES['fileUpload']['name'])) {
                   $avatar   = $this->request->getFile('gambar');
                   $namabaru = str_replace(' ', '-', $avatar->getName());
                   $avatar->move(WRITEPATH . '../assets/upload/buku/', $namabaru);
                   // Create thumb
                   $image = \Config\Services::image()
                       ->withFile(WRITEPATH . '../assets/upload/buku/' . $namabaru)
                       ->fit(100, 100, 'center')
                       ->save(WRITEPATH . '../assets/upload/buku/thumbs/' . $namabaru);
                   $data =[
                        'id_buku'            =>$id_buku,
                       'jenis_kode'=>$this->request->getVar('jenis_kode'),
                       'kode_buku'=>$this->request->getVar('kode_buku'),
                       'id_dosen'=>$this->request->getVar('id_dosen'),
                       'id_kategori_buku'=>$this->request->getVar('id_kategori_buku'),
                       'id_user'=>$this->session->get('id_user'),
                       'judul_buku'=>$this->request->getVar('judul_buku'),
                       'jenis_buku'=>$this->request->getVar('jenis_buku'),
                       'isi'=>$this->request->getVar('isi'),
                       'gambar'=>$namabaru,
                       'penulis'=>$this->request->getVar('penulis'),
                       'penerbit'=>$this->request->getVar('penerbit'),
                       'tanggal_terbit'=>date('Y-m-d', strtotime($this->request->getVar('tanggal_terbit'))) . ' ' . date('H:i', strtotime($this->request->getVar('jam'))),
                       'tanggal_publish'=>date('Y-m-d', strtotime($this->request->getVar('tanggal_publish'))) . ' ' . date('H:i', strtotime($this->request->getVar('jam'))),
                       'website'=>$this->request->getVar('website'),
                       'keyword'=>$this->request->getVar('keyword'),
                       'status'=>$this->request->getVar('status'),
                   ];

                   $buku = $m_buku->edit($data);
                   return redirect()->to(base_url('admin/buku/'))->with('sukses', 'Data Berhasil di Simpan');
                   
            }else if( empty($_FILES['gambar']['name'])&& !empty($_FILES['fileUpload']['name'])) {
                   //FileUpload
                   $file   = $this->request->getFile('fileUpload');
                   $newnamefile = str_replace(' ', '-', $file->getName());
                   $file->move(WRITEPATH . '../assets/upload/file/', $newnamefile);
                   //kumpulkan data
                   $data =[
                    'id_buku'            =>$id_buku,
                       'jenis_kode'=>$this->request->getVar('jenis_kode'),
                       'kode_buku'=>$this->request->getVar('kode_buku'),
                       'id_dosen'=>$this->request->getVar('id_dosen'),
                       'id_kategori_buku'=>$this->request->getVar('id_kategori_buku'),
                       'id_user'=>$this->session->get('id_user'),
                       'judul_buku'=>$this->request->getVar('judul_buku'),
                       'jenis_buku'=>$this->request->getVar('jenis_buku'),
                       'isi'=>$this->request->getVar('isi'),
                       'file'=>$newnamefile,
                       'penulis'=>$this->request->getVar('penulis'),
                       'penerbit'=>$this->request->getVar('penerbit'),
                       'tanggal_terbit'=>date('Y-m-d', strtotime($this->request->getVar('tanggal_terbit'))) . ' ' . date('H:i', strtotime($this->request->getVar('jam'))),
                       'tanggal_publish'=>date('Y-m-d', strtotime($this->request->getVar('tanggal_publish'))) . ' ' . date('H:i', strtotime($this->request->getVar('jam'))),
                       'website'=>$this->request->getVar('website'),
                       'keyword'=>$this->request->getVar('keyword'),
                       'status'=>$this->request->getVar('status'),
                       ];

                       $buku = $m_buku->edit($data);
                       return redirect()->to(base_url('admin/buku/'))->with('sukses', 'Data Berhasil di Simpan');
                       
            }
               
               // masuk database
               $data =[
                    'id_buku'            =>$id_buku,
                   'jenis_kode'        =>$this->request->getVar('jenis_kode'),
                   'kode_buku'         =>$this->request->getVar('kode_buku'),
                   'id_dosen'          =>$this->request->getVar('id_dosen'),
                   'id_kategori_buku'  =>$this->request->getVar('id_kategori_buku'),
                   'id_user'           =>$this->session->get('id_user'),
                   'judul_buku'        =>$this->request->getVar('judul_buku'),
                   'jenis_buku'        =>$this->request->getVar('jenis_buku'),
                   'isi'               =>$this->request->getVar('isi'),
                   'penulis'           =>$this->request->getVar('penulis'),
                   'penerbit'          =>$this->request->getVar('penerbit'),
                   'tanggal_terbit'=>date('Y-m-d', strtotime($this->request->getVar('tanggal_terbit'))) . ' ' . date('H:i', strtotime($this->request->getVar('jam'))),
                   'tanggal_publish'   =>date('Y-m-d', strtotime($this->request->getVar('tanggal_publish'))) . ' ' . date('H:i', strtotime($this->request->getVar('jam'))),
                   'website'           =>$this->request->getVar('website'),
                   'keyword'           =>$this->request->getVar('keyword'),
                   'status'            =>$this->request->getVar('status'),
           ];
           // var_dump($data);
           $buku = $m_buku->edit($data);
           return redirect()->to(base_url('admin/buku/'))->with('sukses', 'Data Berhasil di Simpan');

        }

        //form tambah data
        $data = ['title'        => 'Tambah buku',
                'kategori_buku' => $kategori_buku,
                'buku'          => $buku,
                'dosen'         => $dosen,
                'content'       => 'admin/buku/edit',
        ];
        echo view('admin/layout/wrapper', $data);
    }

    //REPORT BUKU PERDOSEN
    public function reportbuku(){
        checklogin();
        $m_kategori_buku = new Kategori_buku_model();
        $m_buku          = new Buku_model();
        $bukuperdosen    = $m_buku->listperdosen();
        $data = ['title'        => 'Report Total Buku Per Dosen',
                'reportbuku'    => $bukuperdosen,
                'content'       => 'admin/buku/reportbuku',
        ];
        echo view('admin/layout/wrapper', $data);
       
    }

    public function detailperdosen($id){
        checklogin();
        $id_dosen =$id;
        $m_kategori_buku    = new Kategori_buku_model();
        $m_buku             = new Buku_model();
        $m_dosen            = new Dosen_model();
        $detailbukudosen    = $m_buku->listdetailperdosen($id);
        $detaildosen        = $m_dosen->detail($id_dosen);
        $data = ['title'    =>'Detail Buku Oleh : ('. $detaildosen['nama'].')',
                'detailbukudosen' => $detailbukudosen,
                'content'       => 'admin/buku/reportdetailbuku',
        ];
        echo view('admin/layout/wrapper', $data);

    }


    // unduh
    public function unduh1($id_buku)
    {
        checklogin();
        $m_kategori_buku = new Kategori_buku_model();
        $m_buku          = new Buku_model();
        $kategori_buku   = $m_kategori_buku->listing();
        $buku            = $m_buku->detail($id_buku);
        $buku_fix        = str_replace('-', ' ', $buku['file']);
        echo $buku_fix;
        // return $this->response->download('../assets/upload/file/' . $buku_fix, null);
    }
    public function unduh($id_buku)
    {
        checklogin(); // Uncomment if checklogin is a valid function
        $m_kategori_buku = new Kategori_buku_model();
        $m_buku          = new Buku_model();
        $kategori_buku   = $m_kategori_buku->listing(); 
        $buku            = $m_buku->detail($id_buku);
        // $buku_fix        = str_replace('-', ' ', $buku['file']);
        $buku_fix = $buku['file'];
        // Check if the book file exists
        $file_path = FCPATH . '../assets/upload/file/' . $buku_fix;
        if (file_exists($file_path)) {
             // Set appropriate headers
            $this->response->setHeader('Content-Type', mime_content_type($file_path));
            $this->response->setHeader('Content-Disposition', 'attachment; filename="' . $buku_fix . '"');

            // Send the file for download
            return $this->response->download($file_path, null);
        } else {
            echo 'file tidak ada';
            // File not found
            // throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }


    // Delete
    public function delete($id_buku)
    {
        checklogin();
        $m_buku = new Buku_model();
        $data       = ['id_buku' => $id_buku];
        $m_buku->delete($data);
        // masuk database
        $this->session->setFlashdata('sukses', 'Data telah dihapus');

        return redirect()->to(base_url('admin/buku'));
    }
}