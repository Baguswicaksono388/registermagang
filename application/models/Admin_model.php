<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_model extends CI_Model
{
    public function saveProfile()
    {
        $image['admin'] = $this->db->get_where('admin', ['id' => $this->session->userdata('id')])->row_array();
        $data['name'] = $this->input->post('name');
        $data['email'] = $this->input->post('email');

        //Cek jika ada gambar yang akan di Upload
        $upload_image = $_FILES['image']['name'];

        if ($upload_image) {
            $config['allowed_types'] = 'gif|jpg|png'; // type gambar yang boleh diupload
            $config['max_size'] = '2048'; //ukuran gambar yang boleh diakses
            $config['upload_path'] = './uploads/profile/'; //tempat dimana kita akan menyimpannya

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('image')) {
                $old_image = $image['admin']['image']; //variabel untuk mengecek gambar yang lama
                if ($old_image != 'user.png') {
                    unlink(FCPATH . 'uploads/profile/' . $old_image); //ini fungsinya untuk menghapus file gambar jika users akan menguploads gambar
                }

                $new_image = $this->upload->data('file_name'); // ini adalah nama file baru yang akan kita masukkan di db->update
                $data['image'] = $new_image;
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Terjadi Kesalahan saat uploads gambar! </div>');
                redirect('admin/editProfile');
            }
        }
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('admin', $data);
    }

    public function changePassword()
    {
        $password_hash = password_hash($this->input->post('new_password1'), PASSWORD_BCRYPT, ['cost' => 10]);
        $this->db->set('password', $password_hash);
        $this->db->where('id', $this->session->userdata('id'));
        $this->db->update('admin');
    }

    public function getRegistrantById($id)
    {
        return $this->db->get_where('resgistrant', ['id' => $id])->row_array();
    }

    public function updateConfirm($id, $data)
    {
        $this->db->where('id', $id);
        // echo var_dump($data);
        return $this->db->update('resgistrant', $data);
    }

    public function updateRegistrant($id)
    {
        $image['registrant'] = $this->db->get_where('resgistrant', ['id' => $id])->row_array();
        $data = [
            'email' => $this->input->post('email'),
            'name' => $this->input->post('name'),
            'phone' => $this->input->post('phone'),
            'instance' => $this->input->post('instance'),
            'start' => $this->input->post('start'),
            'finish' => $this->input->post('finish'),
            'status_magang' => $this->input->post('status_magang'),
            'recomended' => $this->input->post('recomended'),
            'status' => $this->input->post('status'),
            'note' => $this->input->post('note')
        ];

        //Cek jika ada gambar yang akan di Upload
        $upload_image = $_FILES['photo']['error'];

        if (!$upload_image) {
            $config['allowed_types'] = 'gif|jpg|png'; // type gambar yang boleh diupload
            $config['max_size'] = '2048'; //ukuran gambar yang boleh diakses
            $config['upload_path'] = './uploads/foto/'; //tempat dimana kita akan menyimpannya

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('photo')) {
                $old_image = $image['registrant']['photo']; //variabel untuk mengecek gambar yang lama
                if ($old_image != 'user.png') {
                    unlink(FCPATH . 'uploads/foto/' . $old_image); //ini fungsinya untuk menghapus file gambar jika users akan menguploads gambar
                }
                $new_image = $this->upload->data('file_name'); // ini adalah nama file baru yang akan kita masukkan di db->update
                $data['photo'] = $new_image;
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Terjadi Kesalahan saat uploads gambar! </div>');
                redirect('admin/editRegistrant/' . $id);
            }
        }

        $this->db->where('id', $id);
        // echo var_dump($data);
        return $this->db->update('resgistrant', $data);
    }

    public function createMessage()
    {
        $cek_token = base64_encode(random_bytes(64));
        $email = $this->input->post('email');
        $emailMessage = $this->input->post('message');
        $messages = $this->db->get_where('messages', ['message_token' => $cek_token])->row_array();

        if (!$messages) {
            $this->db->set('created', 'NOW()', false);
            $data = [
                'email' => $email,
                'message' => $emailMessage,
                'message_token' => $cek_token
            ];
            $this->db->insert('messages', $data);

            $config = [
                'protocol' => 'smtp',
                'smtp_host' => 'ssl://smtp.googlemail.com',
                'smtp_user' => 'jendelaislam96@gmail.com',
                'smtp_pass' => 'batainsyaallah',
                'smtp_port' => 465,
                'mailtype' => 'html',
                'charset' => 'utf-8',
                'newline' => "\r\n"
            ];

            $this->load->library('email', $config);
            $this->email->initialize($config);

            $this->email->from('jendelaislam96@gmail.com', 'Belajar Ngoding'); //ini dari siapa email dikirim
            $this->email->to($email);
            $this->email->subject('Balasan HRD');
            $this->email->message($emailMessage);

            if ($this->email->send()) {
                return true;
            } else {
                redirect('admin/errors');
                die;
            }
        }
    }

    public function sortingYears()
    {
        $this->db->order_by('registration_year', "asc");
        $query = $this->db->get('years');
        return $query->result_array();
    }

    public function deleteRegistrant($id)
    {
        $data['is_deleted'] = 1;
        $this->db->where('id', $id);
        $this->db->update('resgistrant', $data);
    }
}
