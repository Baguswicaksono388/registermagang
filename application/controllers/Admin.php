<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // if (!$this->db->get_where('admin', ['id' => $this->session->userdata('id')])->row_array()) {
        //     header('Location: /login');
        // }
        $this->load->model('Admin_model');
    }
    public function index()
    {
        $data['title'] = 'Dasboard';
        $data['admin'] = $this->db->get_where('admin', ['id' => $this->session->userdata('id')])->row_array();
        $data['registrant'] = $this->db->get('resgistrant')->result_array();
        $data['years'] = $this->Admin_model->sortingYears();
        $data['active'] = 'dasboard';
        $this->load->view('admin/template/header', $data);
        $this->load->view('admin/template/topbar');
        $this->load->view('admin/home/index');
        $this->load->view('admin/template/sidebar', $data);
        $this->load->view('admin/template/footer');
    }

    public function registrant()
    {
        $data['title'] = 'Daftar Pemagang';
        $data['admin'] = $this->db->get_where('admin', ['email' => $this->session->userdata('email')])->row_array();
        $data['registrant'] = $this->db->get('resgistrant')->result_array();
        $data['years'] = $this->Admin_model->sortingYears();
        $data['active'] = 'registrant';
        $this->load->view('admin/template/header', $data);
        $this->load->view('admin/template/topbar');
        $this->load->view('admin/users/registrant', $data);
        $this->load->view('admin/template/sidebar', $data);
        $this->load->view('admin/template/footerTable');
    }

    public function profile()
    {
        $data['title'] = 'Profile';
        $data['admin'] = $this->db->get_where('admin', ['id' => $this->session->userdata('id')])->row_array();
        $data['registrant'] = $this->db->get('resgistrant')->result_array();
        $data['years'] = $this->Admin_model->sortingYears();
        $data['active'] = '';
        $this->load->view('admin/template/header', $data);
        $this->load->view('admin/template/topbar');
        $this->load->view('admin/account/profile', $data);
        $this->load->view('admin/template/sidebar', $data);
        $this->load->view('admin/template/footer');
    }

    public function editProfile()
    {
        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Edit Profile';
            $data['admin'] = $this->db->get_where('admin', ['id' => $this->session->userdata('id')])->row_array();
            $data['registrant'] = $this->db->get('resgistrant')->result_array();
            $data['years'] = $this->Admin_model->sortingYears();
            $data['active'] = '';
            $this->load->view('admin/template/header', $data);
            $this->load->view('admin/template/topbar');
            $this->load->view('admin/account/edit_profile', $data);
            $this->load->view('admin/template/sidebar', $data);
            $this->load->view('admin/template/footer');
        } else {
            $this->Admin_model->saveProfile();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Your Profile has been updated! </div>');
            redirect('admin/editProfile');
        }
    }

    public function changePassword()
    {
        $data['title'] = 'Change Password';
        $data['admin'] = $this->db->get_where('admin', ['id' => $this->session->userdata('id')])->row_array();

        $this->form_validation->set_rules('current_password', 'Current Password', 'required|trim');
        $this->form_validation->set_rules('new_password1', 'New Password', 'required|trim|min_length[8]|matches[new_password2]');
        $this->form_validation->set_rules('new_password2', 'Confirm New Password', 'required|trim|min_length[8]|matches[new_password1]');

        if ($this->form_validation->run() == false) {
            $data['registrant'] = $this->db->get('resgistrant')->result_array();
            $data['years'] = $this->Admin_model->sortingYears();
            $data['active'] = '';
            $this->load->view('admin/template/header', $data);
            $this->load->view('admin/template/topbar');
            $this->load->view('admin/account/change_password', $data);
            $this->load->view('admin/template/sidebar', $data);
            $this->load->view('admin/template/footer');
        } else {
            $currernt_password = $this->input->post('current_password');
            $new_password = $this->input->post('new_password1');

            if (!password_verify($currernt_password, $data['admin']['password'])) { //ini berfungsi untuk mencocokan password pada DB
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Wrong Current Password ! </div>');
                redirect('admin/changepassword');
            } else {
                if ($currernt_password == $new_password) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">New password cannot be the same as current password </div>');
                    redirect('admin/changepassword');
                } else {
                    // password yang sudah lolos validasi
                    $this->Admin_model->changePassword();
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Password Changed !</div>');
                    redirect('admin/changepassword');
                }
            }
        }
    }

    public function notivication()
    {
        $data['title'] = 'Pemberitahuan';
        $data['admin'] = $this->db->get_where('admin', ['email' => $this->session->userdata('email')])->row_array();
        $data['registrant'] = $this->db->get_where('resgistrant', ['status' => 0])->result_array();
        $data['years'] = $this->Admin_model->sortingYears();
        $data['active'] = '';
        $this->load->view('admin/template/header', $data);
        $this->load->view('admin/template/topbar');
        $this->load->view('admin/users/notivication', $data);
        $this->load->view('admin/template/sidebar', $data);
        $this->load->view('admin/template/footerTable');
    }

    //Function untuk melihat siapa saja yang sedang dalam proses magang
    public function internshipProcess()
    {
        $data['title'] = 'Dalam Proses Magang';
        $data['admin'] = $this->db->get_where('admin', ['email' => $this->session->userdata('email')])->row_array();
        $data['registrant'] = $this->db->get('resgistrant')->result_array();
        $data['years'] = $this->Admin_model->sortingYears();
        $data['active'] = '';
        $this->load->view('admin/template/header', $data);
        $this->load->view('admin/template/topbar');
        $this->load->view('admin/users/internship_process', $data);
        $this->load->view('admin/template/sidebar', $data);
        $this->load->view('admin/template/footerTable');
    }

    public function recommended()
    {
        $data['title'] = 'Rekomendasi';
        $data['admin'] = $this->db->get_where('admin', ['email' => $this->session->userdata('email')])->row_array();
        $data['registrant'] = $this->db->get('resgistrant')->result_array();
        $data['years'] = $this->Admin_model->sortingYears();
        $data['active'] = '';
        $this->load->view('admin/template/header', $data);
        $this->load->view('admin/template/topbar');
        $this->load->view('admin/users/recommended', $data);
        $this->load->view('admin/template/sidebar', $data);
        $this->load->view('admin/template/footerTable');
    }


    //Fungsi ini digunakan untuk kehalaman untuk melihat data user yang akan dikonfirmasi
    public function toConfirm($id)
    {
        $data['title'] = 'Konfirmasi';
        $data['admin'] = $this->db->get_where('admin', ['email' => $this->session->userdata('email')])->row_array();
        $data['registrant'] = $this->db->get_where('resgistrant', ['status' => 0])->result_array();
        $data['years'] = $this->Admin_model->sortingYears();
        $data['confirm'] = $this->Admin_model->getRegistrantById($id);
        $data['active'] = '';
        $this->load->view('admin/template/header', $data);
        $this->load->view('admin/template/topbar');
        $this->load->view('admin/users/confirm', $data);
        $this->load->view('admin/template/sidebar', $data);
        $this->load->view('admin/template/footer');
    }

    public function toFinishConfirm($id)
    {
        $data['title'] = 'Konfirmasi Selesai Magang';
        $data['admin'] = $this->db->get_where('admin', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('status_magang', 'Keterangan Magang', 'required|trim');
        $this->form_validation->set_rules('recomended', 'Rekomendasi', 'required|trim');

        if ($this->form_validation->run() == false) {
            $data['registrant'] = $this->db->get_where('resgistrant', ['status' => 0])->result_array();
            $data['years'] = $this->Admin_model->sortingYears();
            $data['confirm'] = $this->Admin_model->getRegistrantById($id);
            $data['active'] = '';
            $this->load->view('admin/template/headerForm', $data);
            $this->load->view('admin/template/topbar');
            $this->load->view('admin/users/confirm_finish', $data);
            $this->load->view('admin/template/sidebar', $data);
            $this->load->view('admin/template/footerEditor');
        } else {
            $data2['status_magang'] = $this->input->post('status_magang');
            $data2['recomended'] = $this->input->post('recomended');
            $data2['note'] = $this->input->post('note');
            $this->Admin_model->updateConfirm($id, $data2);
            header('Location: /admin');
        }
    }

    public function editRegistrant($id)
    {
        $data['title'] = 'Edit Pemagang';
        $data['admin'] = $this->db->get_where('admin', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('status', 'Keterangan Konfirmasi', 'required|trim');
        $this->form_validation->set_rules('status_magang', 'Keterangan Magang', 'required|trim');
        $this->form_validation->set_rules('recomended', 'Rekomendasi', 'required|trim');

        if ($this->form_validation->run() == false) {
            $data['registrant'] = $this->db->get_where('resgistrant', ['status' => 0])->result_array();
            $data['years'] = $this->Admin_model->sortingYears();
            $data['confirm'] = $this->Admin_model->getRegistrantById($id);
            $data['active'] = '';
            $this->load->view('admin/template/headerForm', $data);
            $this->load->view('admin/template/topbar');
            $this->load->view('admin/users/edit_registrant', $data);
            $this->load->view('admin/template/sidebar', $data);
            $this->load->view('admin/template/footerEditor');
        } else {
            if ($id != null) {
                $this->Admin_model->updateRegistrant($id);
                header('Location: /admin/editRegistrant/' . $id);
            }
        }
    }

    public function toUnconfirmed()
    {
        $data['title'] = 'Tidak Terkonfirmasi';
        $data['admin'] = $this->db->get_where('admin', ['email' => $this->session->userdata('email')])->row_array();
        $data['registrant'] = $this->db->get_where('resgistrant', ['status' => 1])->result_array();
        $data['years'] = $this->Admin_model->sortingYears();
        $data['active'] = '';
        $this->load->view('admin/template/header', $data);
        $this->load->view('admin/template/topbar');
        $this->load->view('admin/users/notivication', $data);
        $this->load->view('admin/template/sidebar', $data);
        $this->load->view('admin/template/footerTable');
    }

    public function unconfirmed($id)
    {
        if ($id != null) {
            $data['status'] = 1;
            $this->Admin_model->updateConfirm($id, $data);
            header('Location: /admin/toUnconfirmed');
        }
    }

    public function confirmed($id)
    {
        if ($id != null) {
            $data['status'] = 2;
            $this->Admin_model->updateConfirm($id, $data);
            header('Location: /admin/registrant');
        }
    }

    public function confirmStart($id)
    {
        if ($id != null) {
            $data['status_magang'] = 1;
            $this->Admin_model->updateConfirm($id, $data);
            header('Location: /admin/internshipProcess');
        }
    }

    public function writingMail($id)
    {
        $data['title'] = 'Tulis Email';
        $data['admin'] = $this->db->get_where('admin', ['email' => $this->session->userdata('email')])->row_array();
        $data['registrant'] = $this->db->get_where('resgistrant', ['status' => 0])->result_array();
        $data['years'] = $this->Admin_model->sortingYears();
        $data['confirm'] = $this->Admin_model->getRegistrantById($id);
        $data['active'] = '';
        $this->load->view('admin/template/header', $data);
        $this->load->view('admin/template/topbar');
        $this->load->view('admin/users/writing_mail', $data);
        $this->load->view('admin/template/sidebar', $data);
        $this->load->view('admin/template/footerEditor');
    }

    public function sendEmail($id)
    {
        $id = $this->input->post('id');
        $text = $this->input->post('message');

        $data['title'] = 'Tulis Email';
        $data['admin'] = $this->db->get_where('admin', ['email' => $this->session->userdata('email')])->row_array();

        if ($text == "") {
            $data['registrant'] = $this->db->get_where('resgistrant', ['status' => 0])->result_array();
            $data['years'] = $this->Admin_model->sortingYears();
            $data['confirm'] = $this->Admin_model->getRegistrantById($id);
            $data['active'] = '';
            $this->session->set_flashdata('message', 'Sorry, you sent a blank message. Please reset again !');
            $this->load->view('admin/template/header', $data);
            $this->load->view('admin/template/topbar');
            $this->load->view('admin/users/writing_mail', $data);
            $this->load->view('admin/template/sidebar', $data);
            $this->load->view('admin/template/footerEditor');
        } else {
            $this->Admin_model->createMessage();
            redirect('admin/registrant');
        }
    }

    public function errors()
    {
        $data['title'] = 'Internal Server Error';
        $this->load->view('admin/error/505', $data);
    }

    public function reporting($years)
    {
        $data['title'] = 'Laporan Pemagang';
        $data['admin'] = $this->db->get_where('admin', ['email' => $this->session->userdata('email')])->row_array();
        $data['registrant'] = $this->db->get_where('resgistrant', ['status' => 0])->result_array();
        $data['years'] = $this->Admin_model->sortingYears();
        $data['reporting'] = $this->db->get_where('resgistrant', ['angkatan' => $years])->result_array();
        $data['active'] = 'reporting';
        $this->load->view('admin/template/header', $data);
        $this->load->view('admin/template/topbar');
        $this->load->view('admin/users/reporting', $data);
        $this->load->view('admin/template/sidebar', $data);
        $this->load->view('admin/template/footerTable');
    }

    public function delete($id)
    {
        $this->Admin_model->deleteRegistrant($id);
        // $this->session->set_flashdata('flash', 'Data terhapus');
        redirect('admin/registrant');
    }
}
