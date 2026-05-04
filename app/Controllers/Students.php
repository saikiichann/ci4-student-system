<?php
namespace App\Controllers;
use App\Models\StudentModel;

class Students extends BaseController {

    public function index() {
    $model = new StudentModel();
    $search = $this->request->getVar('search');
    if ($search) {
        $data['students'] = $model->where('name', $search)->orWhere('course', $search)->findAll();
    } else {
        $data['students'] = $model->findAll();
    }
    $data['search'] = $search;
    return view('students/index', $data);
}


    public function create() {
        return view('students/create');
    }

    public function store() {
        $model = new StudentModel();
        $model->save([
            'name'   => $this->request->getPost('name'),
            'email'  => $this->request->getPost('email'),
            'course' => $this->request->getPost('course'),
        ]);
        return redirect()->to('/students');
    }

    public function edit($id) {
        $model = new StudentModel();
        $data['student'] = $model->find($id);
        return view('students/edit', $data);
    }

    public function update($id) {
        $model = new StudentModel();
        $model->save([
            'id'     => $id,
            'name'   => $this->request->getPost('name'),
            'email'  => $this->request->getPost('email'),
            'course' => $this->request->getPost('course'),
        ]);
        return redirect()->to('/students');
    }

    public function delete($id) {
        $model = new StudentModel();
        $model->where('id', $id)->delete();
        return redirect()->to('/students');
    }
}
