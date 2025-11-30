<?php

namespace App\Controllers;

use App\Models\TaskModel;

class Todo extends BaseController
{
    protected $taskModel;

    public function __construct()
    {
        $this->taskModel = new TaskModel();
        helper(['form', 'url']);
    }

    public function index()
    {
        $userId = session()->get('user_id');
        $data['tasks'] = $this->taskModel->where('user_id', $userId)->findAll();
        return view('todolist/index', $data);
    }

    public function add()
    {
        $userId = session()->get('user_id');
        $title = $this->request->getPost('title');
        $description = $this->request->getPost('description');

        $this->taskModel->save([
            'user_id' => $userId,
            'title' => $title,
            'description' => $description,
        ]);

        return redirect()->to('/todolist');
    }

    public function complete($id)
    {
        $this->taskModel->update($id, ['status' => 'completed']);
        return redirect()->to('/todolist');
    }

    public function delete($id)
    {
        $this->taskModel->delete($id);
        return redirect()->to('/todolist');
    }
}
