<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
    public function index()
    {
        //ini akan mengembalikan halaman ke halaman users, jika sudah login
        if ($this->session->userdata('email')) {
            redirect('admin');
        }

        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[8]', ['min_length' => 'Password too short (Min. 8 character)']);

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Sign in';
            $this->load->view('login/template/header', $data);
            $this->load->view('login/index');
            $this->load->view('login/template/footer');
        } else {
            // validasi success
            $this->_login();
        }
    }

    public function forgotPassword()
    {
        if ($this->session->userdata('email')) {
            redirect('admin');
        }
        $email = $this->input->post('email');
        $admin = $this->db->get_where('admin', ['email' => $email])->row_array();

        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        if ($this->form_validation->run() == false) {
            $data['title'] = 'Forgot Password';
            $this->load->view('login/template/header', $data);
            $this->load->view('login/forgot_password');
            $this->load->view('login/template/footer');
        } else {
            // validasi success
            if ($admin) {
                //jika ditemukan email pada DB Admin
                $token = base64_encode(random_bytes(32));
                $this->db->set('date_created', 'NOW()', false);
                $user_token = [
                    'email' => $email,
                    'token' => $token
                ];

                $this->db->insert('admin_token', $user_token);
                $this->_sendEmail($token);

                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                please check your email !</div>');
                redirect('login/forgotPassword');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">No email found !</div>');
                redirect('login/forgotPassword');
            }
        }
    }


    public function resetPassword()
    {
        //mendapatkan informasi yang kita butuhkan dengan mengembil informasi yang ada pada link
        $email = $this->input->get('email');
        $token = $this->input->get('token');

        $admin = $this->db->get_where('admin', ['email' => $email])->row_array();

        if ($admin) {
            $admin_token = $this->db->get_where('admin_token', ['token' => $token])->row_array();

            if ($admin_token) {
                //membuat session yang mana hanya dapat dilihat oleh server
                $this->session->set_userdata('reset_email', $email);
                $this->changePassword(); //klo benar akan menampilkan halamanan changePassword
            } else {
                //validasi saat token salah atau tidak ada
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Reset password failed ! Wrong token</div>');
                redirect('login');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Reset password failed ! Wrong email</div>');
            redirect('login');
        }
    }

    public function changePassword()
    {
        if (!$this->session->userdata('reset_email')) {
            redirect('login');
        }

        $this->form_validation->set_rules('password1', 'New Password', 'required|trim|min_length[8]|matches[password2]');
        $this->form_validation->set_rules('password2', 'Repeat Password', 'required|trim|min_length[8]|matches[password1]');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Change Password';
            $this->load->view('login/template/header', $data);
            $this->load->view('login/change_password');
            $this->load->view('login/template/footer');
        } else {
            $password_hash = password_hash($this->input->post('password1'), PASSWORD_BCRYPT, ['cost' => 10]);
            $email = $this->session->userdata('reset_email');

            $this->db->set('password', $password_hash);
            $this->db->where('email', $email);
            $this->db->update('admin');

            $this->db->where('email', $email);
            $this->db->delete('admin_token');

            //sebelum ke halaman login kita hapus dulu sessionnya
            $this->session->unset_userdata('reset_email');

            $this->session->set_flashdata('message', '<div class="alert alert-succes" role="alert">Password has been change ! Please Login</div>');
            redirect('login');
        }
    }


    private function _sendEmail($token)
    {
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
        $this->email->to($this->input->post('email'));
        $this->email->subject('Reset Password');
        $this->email->message('Click this link to to reset your password : <a href="' . base_url() . 'login/resetpassword?email=' . $this->input->post('email') . '&token=' . urlencode($token) .  '">Reset Password</a>');

        //ini untuk pengecekan ketika e-mail akan dikirim berhasil atau tidak
        if ($this->email->send()) {
            return true;
        } else {
            // echo $this->email->print_debugger();
            // die;
            redirect('login/errors');
        }
    }

    private function _login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $admin = $this->db->get_where('admin', ['email' => $email])->row_array();

        if ($admin) {
            if (password_verify($password, $admin['password'])) {
                $data = [
                    'email' => $admin['email'],
                    'id' => $admin['id']
                ];
                $this->session->set_userdata($data);
                redirect('admin');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Wrong password !</div>');
                redirect('login');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">No email found !</div>');
            redirect('login');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role_id');
        $this->session->unset_userdata('id');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">You have been looged out !</div>');
        redirect('login');
    }

    public function errors()
    {
        $data['title'] = 'Internal Server Error';
        $this->load->view('login/error/505', $data);
    }
}
