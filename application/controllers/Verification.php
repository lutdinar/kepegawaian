<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Verification extends MY_Controller
{
    
    private $progress = 0;

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Employee');
    }

    public function index()
    {
        $data['title'] = 'Inventarisir Pengisian MySAPK';

        $empUrl     = 'Employee?';
        $empReq     = $this->ApiRequest->get_data($empUrl);
        $empRes     = json_decode($empReq, false);

        if (isset($empRes->status) && $empRes->status == 200) {
            $data['employees']  = $empRes->employees;
        } else {
            $data['employee']   = null;
        }

        $totalDone = $this->Employee->totalOfDone();
        if ($totalDone > 0) {
            $data['totalDone'] = $totalDone;
        } else {
            $data['totalDone'] = 0;
        }

        $totalProcess = $this->Employee->totalOfProcess();
        if ($totalProcess > 0) {
            $data['totalProcess'] = $totalProcess;
        } else {
            $data['totalProcess'] = 0;
        }

        $status = $this->session->flashdata('status');
        if (isset($status)) {
            $data['status'] = $status;
        } else {
            $data['status'] = "";
        }

        // echo json_encode($data);
        $this->render_views('content/verification', $data);
    }

    public function save()
    {
        $nip    = $this->input->post('nip');
        $nama    = $this->input->post('nama');
        $ubahProfil    = $this->input->post('ubahProfil');
        $deskripsiUbahProfil    = $this->input->post('deskripsiUbahProfil');
        $pangkatGolongan    = $this->input->post('pangkatGolongan');
        $deskripsiPangkatGolongan    = $this->input->post('deskripsiPangkatGolongan');
        $pendidikan    = $this->input->post('pendidikan');
        $deskripsiPendidikan    = $this->input->post('deskripsiPendidikan');
        $jabatan    = $this->input->post('jabatan');
        $deskripsiJabatan    = $this->input->post('deskripsiJabatan');
        $masaKerja    = $this->input->post('masaKerja');
        $deskripsiMasaKerja    = $this->input->post('deskripsiMasaKerja');
        $cpnsPns    = $this->input->post('cpnsPns');
        $deskripsiCpnsPns    = $this->input->post('deskripsiCpnsPns');
        $diklatKursus    = $this->input->post('diklatKursus');
        $deskripsiDiklatKursus    = $this->input->post('deskripsiDiklatKursus');
        $keluarga    = $this->input->post('keluarga');
        $deskripsiKeluarga    = $this->input->post('deskripsiKeluarga');
        $skp    = $this->input->post('skp');
        $deskripsiSkp    = $this->input->post('deskripsiSkp');
        $penghargaan    = $this->input->post('penghargaan');
        $deskripsiPenghargaan    = $this->input->post('deskripsiPenghargaan');
        $organisasi    = $this->input->post('organisasi');
        $deskripsiOrganisasi    = $this->input->post('deskripsiOrganisasi');
        $cltn    = $this->input->post('cltn');
        $deskripsiCltn    = $this->input->post('deskripsiCltn');
        
        $this->progress = ($ubahProfil == "Y") ? $this->progress + 1 : $this->progress;
        $this->progress = ($pangkatGolongan == "Y") ? $this->progress + 1 : $this->progress;
        $this->progress = ($pendidikan == "Y") ? $this->progress + 1 : $this->progress;
        $this->progress = ($jabatan == "Y") ? $this->progress + 1 : $this->progress;
        $this->progress = ($masaKerja == "Y") ? $this->progress + 1 : $this->progress;
        $this->progress = ($cpnsPns == "Y") ? $this->progress + 1 : $this->progress;
        $this->progress = ($diklatKursus == "Y") ? $this->progress + 1 : $this->progress;
        $this->progress = ($keluarga == "Y") ? $this->progress + 1 : $this->progress;
        $this->progress = ($skp == "Y") ? $this->progress + 1 : $this->progress;
        $this->progress = ($penghargaan == "Y") ? $this->progress + 1 : $this->progress;
        $this->progress = ($organisasi == "Y") ? $this->progress + 1 : $this->progress;
        $this->progress = ($cltn == "Y") ? $this->progress + 1 : $this->progress;

        $data = array(
            'nip' => $nip,
            'nama' => $nama,
            'ubah_profil' => $ubahProfil,
            'deskripsi_ubah_profil' => $deskripsiUbahProfil,
            'pangkat_golongan' => $pangkatGolongan,
            'deskripsi_pangkat_golongan' => $deskripsiPangkatGolongan,
            'pendidikan' => $pendidikan,
            'deskripsi_pendidikan' => $deskripsiPendidikan,
            'jabatan' => $jabatan,
            'deskripsi_jabatan' => $deskripsiJabatan,
            'peninjauan_masa_kerja' => $masaKerja,
            'deskripsi_peninjauan_masa_kerja' => $deskripsiMasaKerja,
            'cpns_pns' => $cpnsPns,
            'deskripsi_cpns_pns' => $deskripsiCpnsPns,
            'diklat_kursus' => $diklatKursus,
            'deskripsi_diklat_kursus' => $deskripsiDiklatKursus,
            'keluarga' => $keluarga,
            'deskripsi_keluarga' => $deskripsiKeluarga,
            'skp' => $skp,
            'deskripsi_skp' => $deskripsiSkp,
            'penghargaan' => $penghargaan,
            'deskripsi_penghargaan' => $deskripsiPenghargaan,
            'organisasi' => $organisasi,
            'deskripsi_organisasi' => $deskripsiOrganisasi,
            'cltn' => $cltn,
            'deskripsi_cltn' => $deskripsiCltn,
            'progress' => $this->progress,
        );

        $emp = $this->Employee->findByNip($nip);

        if ($emp == null) {
            $save = $this->Employee->insert($data);

            if ($save) {
                $this->session->set_flashdata(
                    array(
                        'status' => 200
                    )
                );
            } else {
                $this->session->set_flashdata(
                    array(
                        'status' => 500
                    )
                );
            }
        } else {
            $id = $emp->id;
            $update = $this->Employee->update($data, $id);

            if ($update) {
                $this->session->set_flashdata(
                    array(
                        'status' => 200
                    )
                );
            } else {
                $this->session->set_flashdata(
                    array(
                        'status' => 500
                    )
                );
            }
        }

        redirect('Verification');

    }

    public function recaps()
    {
        $limit = 10;
        $this->load->library('pagination');
		$config['base_url'] = base_url('Verification/recaps');

        $config['total_rows'] = $this->Employee->findTotalRows();
		$config['per_page'] = $limit;
		$this->pagination->initialize($config);

        $start = $this->uri->segment(3, 0);

        $data['employees']  = $this->Employee->findAll($limit, $start);

        foreach ($data['employees'] as $emp) {
            $emp->percent = number_format($emp->progress / 12 * 100, 2);
        }
        $data['title']      = 'Rekapitulasi';

        $this->render_views('content/dashboard', $data);
        // echo json_encode($data);
    }

    public function findDetail()
    {
        $id = $this->input->get('emp');

        $emp = $this->Employee->findById($id);
        $emp->percent = number_format($emp->progress / 12 * 100, 2);

        echo json_encode($emp);
    }

}
