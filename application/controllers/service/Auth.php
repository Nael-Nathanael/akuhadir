<?php

/**
 *
 */
class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function login()
    {
        $password = $_POST['password'];

        // find account by username:
        // DANGER
        $accounts  = $this->db->query(
            "SELECT * FROM user_auth"
        );

        foreach ($accounts->result() as $account) {
            // cek password
            $passwordIsValid = password_verify($password, $account->password);

            if ($passwordIsValid) {
                // save ke session
                $this->session->set_userdata(
                    array(
                        "personalData" => $account
                    )
                );

                redirect(base_url());
            }
        }

        sendCalmErrorMessage("Akun tidak ditemukan ^^");
        redirect(base_url());
    }

    public function logout()
    {
        destroySession();
        redirect(base_url());
    }
}
