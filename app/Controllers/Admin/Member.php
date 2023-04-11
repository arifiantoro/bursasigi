<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use CodeIgniter\Session\Session;
use Myth\Auth\Config\Auth as AuthConfig;
use Myth\Auth\Entities\User;
use Myth\Auth\Models\UserModel;

class Member extends BaseController
{
	protected $auth;
	/**
	 * @var AuthConfig
	 */
	protected $config;

	public function index()
	{
		return view('admin/nav/header', ['title' => 'Bursa Kerja']) . view('admin/member/member') . view('admin/nav/footer');
	}

	public function riwayat($id = null)
	{
		// dd($id);
		$db = db_connect();
		$pendidik = $db->table('pendidikan')->get()->getResult();
		$pendidikan = new \App\Models\OpenModel();
		$pendidikan->setTables('pencari_pendidikan');
		$realId = dekripsi($id);

		$pen = $pendidikan->where('user_id', $realId)->select('pencari_pendidikan.*, pendidikan.nama_pendidikan as pendidikan')
			->join('pendidikan', 'pencari_pendidikan.pendidikan_id = pendidikan.id', 'LEFT')
			->findAll();
		// dd($pen);
		$pendi = array();
		for ($i = 0; $i < count($pen); $i++) {
			$pendi[$i] = (object) array(
				'id' => $pen[$i]->id,
				'pendidikan_id' => $pen[$i]->pendidikan_id,
				'instansi' => dekripsi($pen[$i]->instansi),
				'tahun_lulus' => $pen[$i]->tahun_lulus,
				'ipk' => $pen[$i]->ipk,
				'gelar' => dekripsi($pen[$i]->gelar),
				'pendidikan' => $pen[$i]->pendidikan
			);
		}
		// dd($pendi);
		return view('admin/nav/header', ['title' => 'Tambah Riwayat']) . view('admin/member/riwayat', ['pendidikan' => $pendi, 'pendidik' => $pendidik, 'id' => enkripkan($realId)]) . view('admin/nav/footer');
	}

	public function detail($id = null)
	{
		$realId = $id;
		$db = db_connect();
		$member = $db->table('pencari')->select('pencari.*, users.username, users.firstname, users.lastname, users.email, pendidikan.nama_pendidikan as pendidikan')
			->join('users', 'pencari.user_id = users.id', 'LEFT')
			->join('pendidikan', 'pencari.pendidikan_id = pendidikan.id', 'LEFT')
			->where('pencari.user_id', $realId)
			->get()->getFirstRow();
		// dd($member);
		$data = (object) array(
			'user_id' => $member->user_id,
			'NIK' => dekripsi($member->NIK),
			'jenis_kelamin' => $member->jenis_kelamin,
			'tanggal_lahir' => $member->tanggal_lahir,
			'kota_tinggal' => dekripsi($member->kota_tinggal),
			'alamat_member' => dekripsi($member->alamat_member),
			'deskripsi_member' => dekripsi($member->deskripsi_member),
			'keahlian_member' => dekripsi($member->keahlian_member),
			'pendidikan_id' => $member->pendidikan_id,
			'email' => $member->email,
			'username' => $member->username,
			'nama_lengkap' => $member->firstname . ' ' . $member->lastname,
			'pendidikan' => $member->pendidikan
		);
		return view('admin/nav/header', ['title' => 'Bursa Kerja']) . view('admin/member/detail', ['member' => $data]) . view('admin/nav/footer');
	}

	public function edit($id = null)

	{
		$realId = $id;
		$db = db_connect();
		$member = $db->table('pencari')->select('pencari.*, users.username, users.firstname, users.lastname, users.email, pendidikan.nama_pendidikan as pendidikan')
			->join('users', 'pencari.user_id = users.id', 'LEFT')
			->join('pendidikan', 'pencari.pendidikan_id = pendidikan.id', 'LEFT')
			->where('pencari.user_id', $realId)
			->get()->getFirstRow();

		$pendidikan = $db->table('pendidikan')->get()->getResult();

		$data = (object) array(
			'user_id' => enkripkan($member->user_id),
			'NIK' => dekripsi($member->NIK),
			'jenis_kelamin' => $member->jenis_kelamin,
			'tanggal_lahir' => $member->tanggal_lahir,
			'kota_tinggal' => dekripsi($member->kota_tinggal),
			'alamat_member' => dekripsi($member->alamat_member),
			'deskripsi_member' => dekripsi($member->deskripsi_member),
			'keahlian_member' => dekripsi($member->keahlian_member),
			'pendidikan_id' => $member->pendidikan_id,
			'email' => $member->email,
			'username' => $member->username,
			'nama_lengkap' => $member->firstname . ' ' . $member->lastname,
			'pendidikan' => $member->pendidikan,
			'firstname' => $member->firstname,
			'lastname' => $member->lastname,
			'alamat' => dekripsi($member->alamat_member)
		);


		return view('admin/nav/header', ['title' => 'Bursa Kerja']) . view('admin/member/edit', ['member' => $data, 'pendidikan' => $pendidikan]) . view('admin/nav/footer');
	}

	public function getMember()
	{
		$db = db_connect();
		$member = $db->table('pencari')->select('pencari.*, users.username, users.firstname, users.lastname, users.email')
			->join('users', 'pencari.user_id = users.id', 'LEFT')
			->get()->getResult();
		$data = array();
		// $obj = object();

		for ($i = 0; $i < count($member); $i++) {
			$data[$i] = (object) array(
				'no' => $i + 1,
				'user_id' => $member[$i]->user_id,
				'NIK' => dekripsi($member[$i]->NIK),
				'jenis_kelamin' => $member[$i]->jenis_kelamin,
				'tanggal_lahir' => $member[$i]->tanggal_lahir,
				'kota_tinggal' => dekripsi($member[$i]->kota_tinggal),
				'alamat_member' => dekripsi($member[$i]->alamat_member),
				'deskripsi_member' => dekripsi($member[$i]->deskripsi_member),
				'keahlian_member' => dekripsi($member[$i]->keahlian_member),
				'pendidikan_id' => $member[$i]->pendidikan_id,
				'email' => $member[$i]->email,
				'username' => $member[$i]->username,
				'nama_lengkap' => $member[$i]->firstname . ' ' . $member[$i]->lastname,
			);
		}

		return json_encode($data);
	}

	public function tambah()
	{
		$pendidikan = new \App\Models\OpenModel();
		$pendidikan->setTables('pendidikan');

		$pendidikan = $pendidikan->findAll();

		return view('admin/nav/header', ['title' => 'Tambah']) . view('admin/member/tambah', ['pendidikan' => $pendidikan]) . view('admin/nav/footer');
	}

	public function tambahPeserta()
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
		if (!empty($this->config->defaultUserGroup)) {
			$users = $users->withGroup($this->config->defaultUserGroup);
		}

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

		// Memasukan Biodata Member

		$pencari = new \App\Models\OpenModel();
		$pencari->setTables('pencari');

		$data = [
			'user_id' => $lastid,
			'NIK' => enkripkan($this->request->getPost('nik')),
			'jenis_kelamin' => $this->request->getPost('jenisK'),
			'tanggal_lahir' => $this->request->getPost('tanggallahir'),
			'kota_tinggal' => enkripkan($this->request->getPost('kota')),
			'alamat_member' => enkripkan($this->request->getPost('alamat')),
			'deskripsi_member' => enkripkan($this->request->getPost('deskripsis')),
			'keahlian_member' => enkripkan($this->request->getPost('keahlians')),
			'pendidikan_id' => $this->request->getPost('pendidikan'),
		];

		$pencari->save($data);

		return json_encode(200);
	}

	public function editPeserta()
	{
		$users = new \Myth\Auth\Models\UserModel();
		$pencari = new \App\Models\OpenModel();
		$pencari->setTables('pencari');
		$userId = dekripsi($this->request->getPost('id'));

		$datau =
			[
				'firstname' => $this->request->getPost('firstname'),
				'lastname' => $this->request->getPost('lastname'),

			];

		$data =
			[
				'NIK' => enkripkan($this->request->getPost('nik')),
				'jenis_kelamin' => $this->request->getPost('jenisK'),
				'tanggal_lahir' => $this->request->getPost('tanggallahir'),
				'kota_tinggal' => enkripkan($this->request->getPost('kota')),
				'alamat_member' => enkripkan($this->request->getPost('alamat')),
				'deskripsi_member' => enkripkan($this->request->getPost('deskripsis')),
				'keahlian_member' => enkripkan($this->request->getPost('keahlians')),
				'pendidikan_id' => $this->request->getPost('pendidikan'),
			];

		$users->where('id', $userId)->set($datau)->update();
		$pencari->where('user_id', $userId)->set($data)->update();

		return 200;
	}

	public function riwayatPost()
	{
		// dd($this->request->getPost());
		$pencari = new \App\Models\OpenModel();
		$pencari->setTables('pencari_pendidikan');

		$data =
			[
				'user_id' => dekripsi($this->request->getPost('iId')),
				'pendidikan_id' => $this->request->getPost('iPendidikan'),
				'instansi'	 => enkripkan($this->request->getPost('iInstitusi')),
				'tahun_lulus' => enkripkan($this->request->getPost('iTahun')),
				'ipk' => $this->request->getPost('iIpk'),
				'gelar' => enkripkan($this->request->getPost('ijurus')),
			];

		$pencari->save($data);

		return redirect()->to('admin/member/riwayat/' . $this->request->getPost('iId'));
	}

	public function riwayatDelete($id = null)
	{
		$riwayat = new \App\Models\OpenModel();
		$riwayat->setTables('pencari_pendidikan');

		$userId = $riwayat->select('user_id')->find($id);

		if ($riwayat->delete($id)) {
			return redirect()->to('admin/member/riwayat/' . enkripkan($userId->user_id));
		}
	}
}
