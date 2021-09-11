<?php namespace App\Controllers;

use App\Models\M_contact;
use CodeIgniter\RESTful\ResourceController;

class C_contacts extends ResourceController
{
	protected $modelName = 'App\Models\M_contacts';
	protected $format		= 'json';

	protected $model;
	public function __construct()
	{
		$this->model = new M_contact(); 
	}

	public function index()
	{
		$data = [
			'message' => 'success',
			'data'    => $this->model->findAll()
		];
		return $this->respond($data, 200);
	}

	public function show($id = null)
	{
		$data = [
			'message'	=> 'success',
			'data'		=> $this->model->find($id)
		];

		return $this->respond($data, 200);
	}

	public function create()
	{
		$valid = $this->validate(
			$this->model->getValidationRules(),
			$this->model->getValidationMessages()
		);

		if ($valid) {
			$this->model->save(
				$this->request->getPost()
			);

			$response = [
				'message'	=> 'success'
			];

			return $this->respond($response, 201);
		} else {
			$response = [
				'message'	=> 'fail',
				'errors'		=> $this->validator->getErrors()
			];
			return $this->respond($response, 422);
		}

	}

	//--------------------------------------------------------------------

}
