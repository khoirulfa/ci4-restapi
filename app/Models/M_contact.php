<?php namespace App\Models;

use CodeIgniter\Model;

class M_contact extends Model
{
   protected $table      = 'contacts';
   protected $primaryKey = 'id';

   protected $allowedFields = ["name", "number"];

   protected $validationRules = [
      'name'   => 'required',
      'number' => 'required|numeric|max_length[15]|is_unique[contacts.number]'
   ];

   protected $validationMessages = [
      'name'   => [
         'required'  => 'Nama tidak boleh kosong'
      ],
      'number' => [
         'required'  => 'Nomor tidak boleh kosong',
         'numeric'   => 'Yang anda masukkan bukan nomor',
         'max_length'=> 'Nomor terlalu panjang',
         'is_unique' => 'Nomor sudah ada di database'
      ]
      ]; 
}