<?php namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Contacts extends Seeder
{
	public function run()
	{
		$contactData = [
			'name'   => 'Wkwkwkwk',
			'number' => '0895555555555'
		];

		$this->db->table('contacts')->insert($contactData);
	}
}
