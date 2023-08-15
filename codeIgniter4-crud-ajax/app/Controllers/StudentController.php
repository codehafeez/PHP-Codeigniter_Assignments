<?php

namespace App\Controllers;

use App\Models\StudentModel;

class StudentController extends BaseController
{
    // view index file
	public function index()
    {	
		return view('index');
    }
	
	// create new student records
	public function CreateStudent()
    {
        $StudentModel = new StudentModel();

        $data = [
            'firstname' => $this->request->getPost("student_firstname"),
			'lastname' => $this->request->getPost("student_lastname"),
        ];

		$StudentModel->save($data);

		$output = array('status' => 'Student Inserted Successfully', 'data' => $data);
				
		return $this->response->setJSON($output);
	
    }

	//fetch all students records 
	public function ReadStudent()
	{
		$StudentModel = new StudentModel();
		
		$data['allstudents'] = $StudentModel->findAll();
		
		return $this->response->setJSON($data);
	}
	
	//edit or get specific student record id
	public function EditStudent()
	{
		$StudentModel = new StudentModel();
		
		$id = $this->request->getGet('sid');
		
		$data['row'] = $StudentModel->find($id);
		
		return $this->response->setJSON($data);
		
	}
	// update existing student records
    public function UpdateStudent()
    {
        $StudentModel = new StudentModel();

		$id = $this->request->getPost("update_id");

        $data = [
            'firstname' => $this->request->getPost("update_firstname"),
            'lastname' => $this->request->getPost("update_lastname"),
        ];

        $StudentModel->update($id, $data);

		$output = array('status' => 'Student Updated Successfully', 'data' => $data);
				
		return $this->response->setJSON($output);
		
    }

	// delete existing student records
    public function DeleteStudent()
    {
        $StudentModel = new StudentModel();

		$id = $this->request->getGet("delete_id");
		
        $StudentModel->delete($id);

		$output = array('status' => 'Deleted Successfully');
				
		return $this->response->setJSON($output);
    }
}