<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pendaftaran extends CI_Controller
{
    public function index()
    {
        $this->load->view('guest/index');
    }

    public function registrant()
    {
        $this->db->set('create_at', 'NOW()', false);
        $start = $this->input->post('start');
        $d = strtotime($start);
        $data = [
            'name' => $this->input->post('name'),
            'email' => $this->input->post('email'),
            'phone' => $this->input->post('phone'),
            'instance' => $this->input->post('instance'),
            'start' => $start,
            'finish' => $this->input->post('finish'),
            'angkatan' => date('Y', $d)
        ];

        //Cek jika ada gambar yang akan di Upload
        $upload_image = $_FILES['photo']['error'];

        if (!$upload_image) {
            $config['allowed_types'] = 'gif|jpg|png'; // type gambar yang boleh diupload
            $config['max_size'] = '2048'; //ukuran gambar yang boleh diakses
            $config['upload_path'] = APPPATH . '../uploads/foto/';

            $config['overwrite'] = true;
            $config['file_name'] = $this->input->post('photo');

            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            if ($this->upload->do_upload('photo')) {
                $data['photo'] = $this->upload->file_name;
                echo "berhasil";

                //$data['pictures'] = $this->input->post('pictures');
                echo "------" . $data['photo'];
                echo "berhasil";
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Terjadi Kesalahan saat uploads gambar! </div>');
                header('Location: /pendaftaran');
                return;
            }
        }

        $this->db->insert('resgistrant', $data);

        $check = $this->db->get_where('years', ['registration_year' => date('Y', $d)])->row_array();
        if ($check) {
            // var_dump(date('Y', $d));
            // var_dump($check);
            redirect('pendaftaran');
        } else {
            $this->db->set('create_at', 'NOW()', false);
            $data2['registration_year'] = date('Y', $d);
            // var_dump(date('Y', $d));
            // var_dump($data2);
            $this->db->insert('years', $data2);
            redirect('pendaftaran');
        }
    }
}
