<?php

namespace App\Models;

use CodeIgniter\Model;

class PerusahaanModel extends Model
{
    protected $table = 'lowongan';
    protected $allowedFields = ['user_id', 'nama_perusahaan', 'alamat_perusahaan', 'kota', 'bidang_usaha', 'deskripsi_usaha', 'pasfoto'];
}
