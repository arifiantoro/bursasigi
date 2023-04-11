<?php

namespace App\Models;

use CodeIgniter\Model;

class LowonganModel extends Model
{
    protected $table = 'lowongan';
    protected $allowedFields = ['id_perusahaan', 'posisi', 'tanggal_dibuka', 'tanggal_ditutup', 'kota_domisili', 'deskripsi_lowongan', 'tags'];
}
