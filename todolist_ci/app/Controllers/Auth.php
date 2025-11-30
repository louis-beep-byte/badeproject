<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use Config\Database;

class Auth extends Controller
{
    public function testDb()
    {
        try {
            $db = Database::connect();
            $query = $db->query("SELECT DATABASE() AS db");
            $row = $query->getRow();

            echo "✅ Database connected: " . $row->db;
        } catch (\Throwable $e) {
            echo "❌ Database connection failed: " . $e->getMessage();
        }
    }
    public function register()
{
    $data = [];

    if ($this->request->getMethod() === 'post') {
        $rules = [
            'username' => 'required|min_length[3]|max_length[20]|is_unique[users.username]',
            'password' => 'required|min_length[6]',
        ];

        if (!$this->validate($rules)) {
            $data['validation'] = $this->validator;
        } else {
            $userModel = new \App\Models\UserModel();

            $userData = [
                'username'    => $this->request->getPost('username'),
                'password'    => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
                'ip_address'  => $this->request->getIPAddress(),
                'mac_address' => 'Unavailable',
                'user_agent'  => $this->request->getUserAgent()->getAgentString(),
            ];

            $userModel->save($userData);
            session()->setFlashdata('success', 'Registration successful! Please log in.');
            return redirect()->to('/login');
        }
    }

    return view('auth/register', $data);
}

}
