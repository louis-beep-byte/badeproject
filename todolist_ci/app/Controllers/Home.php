<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class Home extends BaseController
{
    public function index()
    {
        $session = session();

        if ($session->has('logged_in') && $session->get('logged_in') === true) {
            return redirect()->to('/todolist');
        }

        return view('home'); // Your homepage view
    }

    public function phpDbTest()
{
    $mysqli = new \mysqli("127.0.0.1", "root", "", "todolist_ci", 3306);

    if ($mysqli->connect_errno) {
        die("❌ Connection failed: " . $mysqli->connect_error);
    }

    echo "✅ PHP can connect to MySQL successfully!";
}

    
}
