<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\Request;
use Myth\Auth\Config\Auth as AuthConfig;
use Myth\Auth\Entities\User;
use Myth\Auth\Models\UserModel;

class Perusahaan extends BaseController
{
	protected $auth;
	/**
	 * @var AuthConfig
	 */
	protected $config;

	public function index()
	{
		return view('admin/nav/header', ['title' => 'Daftar Perusahaan Terafiliasi']) . view('admin/Perusahaan/member') . view('admin/nav/footer');
	}

	public function tambah()
	{
		return view('admin/nav/header', ['title' => 'Tambah Perusahaan']) . view('admin/Perusahaan/tambah') . view('admin/nav/footer');
	}

	public function perusahaanGet()
	{
		$db = db_connect();
		$perusahaan = $db->table('perusahaan')
			->select('perusahaan.*,users.username, users.email, users.firstname, users.lastname')
			->join('users', 'perusahaan.user_id = users.id', 'LEFT')
			->get()->getResult();
		$data = array();
		for ($i = 0; $i < count($perusahaan); $i++) {
			$data[$i] = (object) array(
				'no' => $i + 1,
				'user_id' => $perusahaan[$i]->user_id,
				'nama_perusahaan' =>  dekripsi($perusahaan[$i]->nama_perusahaan),
				'alamat_perusahaan' =>  dekripsi($perusahaan[$i]->alamat_perusahaan),
				'kota' =>  dekripsi($perusahaan[$i]->kota),
				'bidang_usaha' =>  dekripsi($perusahaan[$i]->bidang_usaha),
				'deskripsi_usaha' =>  dekripsi($perusahaan[$i]->deskripsi_usaha),
				'nama_lengkap' => $perusahaan[$i]->firstname . ' ' . $perusahaan[$i]->lastname,
				'username' => $perusahaan[$i]->username
			);
		}
		// dd($data);
		// json_encode($data);
		return json_encode($data);
	}

	public function detail($id = null)
	{
		$db = db_connect();
		$cari = $db->table('perusahaan')->where('user_id', $id)->get()->getFirstRow();

		$data = (object) array(
			'nama_perusahaan' =>  dekripsi($cari->nama_perusahaan),
			'alamat_perusahaan' =>  dekripsi($cari->alamat_perusahaan),
			'kota' =>  dekripsi($cari->kota),
			'bidang_usaha' =>  dekripsi($cari->bidang_usaha),
			'deskripsi_usaha' =>  dekripsi($cari->deskripsi_usaha),
			'user_id' => $cari->user_id
		);

		// dd($data);

		return view('admin/nav/header', ['title' => 'Detail Peerusahaan']) . view('admin/perusahaan/detail', ['perusahaan' => $data]) . view('admin/nav/footer');
	}

	public function tambahPerusahaan()
	{
		// $this->session = service('session');
		$this->config = config('Auth');

		if (!$this->config->allowRegistration) {
			return json_encode(400, 'Registrasi Masih Ditutup');
		}

		$users = model(UserModel::class);

		// Validate basics first since some password rules rely on these fields
		$rules = [
			'username' => 'required|alpha_numeric_space|min_length[3]|max_length[30]|is_unique[users.username]',
			'email'    => 'required|valid_email|is_unique[users.email]',
		];

		if (!$this->validate($rules)) {
			return json_encode($this->validator->getErrors());
		}

		// Validate passwords since they can only be validated properly here
		$rules = [
			'password'     => 'required|strong_password',
			'pass_confirm' => 'required|matches[password]',
		];

		if (!$this->validate($rules)) {
			return json_encode($this->validator->getErrors());
		}

		// Save the user
		$allowedPostFields = array_merge(['password'], $this->config->validFields, $this->config->personalFields);
		$user = new User($this->request->getPost($allowedPostFields));


		$this->config->requireActivation === null ? $user->activate() : $user->generateActivateHash();

		// dd($user);

		// Ensure default group gets assigned if set
		// if (! empty($this->config->defaultUserGroup)) {
		$users = $users->withGroup('perusahaan');
		// }

		if (!$users->save($user)) {
			return json_encode($users->errors());
		}

		if ($this->config->requireActivation !== null) {
			$activator = service('activator');
			$sent = $activator->send($user);

			if (!$sent) {
				// return redirect()->back()->withInput()->with('error', $activator->error() ?? lang('Auth.unknownError'));
			}
		}

		$lastid = $users->select('id')->orderBy('id', 'DESC')->limit(1)->first()->id;

		// Memasukan Biodata Perusahaan

		$perusahaan = new \App\Models\OpenModel();
		$perusahaan->setTables('perusahaan');

		$data = [
			'user_id' =>  $lastid,
			'nama_perusahaan' =>  enkripkan($this->request->getPost('nama_perusahaan')),
			'alamat_perusahaan' =>  enkripkan($this->request->getPost('alamat')),
			'kota' =>  enkripkan($this->request->getPost('kota')),
			'bidang_usaha' =>  enkripkan($this->request->getPost('bidangusaha')),
			'telepon' => $this->request->getPost('telepon'),
			'deskripsi_usaha' =>  enkripkan($this->request->getPost('deskripsis')),
		];

		$perusahaan->save($data);


		return 200;
	}
}
