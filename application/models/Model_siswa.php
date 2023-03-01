<?php
class Model_siswa extends CI_Model
{
    public function getAllSiswa($keyword = null)
    {
        if ($keyword) {
            $this->db->like('nis', $keyword);
            $this->db->or_like('nama', $keyword);
            $this->db->or_like('angkatan', $keyword);
            $this->db->or_like('jurusan', $keyword);
            $this->db->or_like('email', $keyword);
            $this->db->or_like('hp', $keyword);
            $this->db->or_like('alamat', $keyword);
        }

        return $query = $this->db->get('joinsiswa')->result_array();
    }

    public function Tambahsiswa()
    {
        $upload_image = $_FILES['image']['name'];
        if ($upload_image) {
            $config['allowed_types'] = 'gif|jpg|jpeg|png';
            $config['max_size'] = '2048';
            $config['upload_path'] = './assets/foto/';

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('image')) {
            $foto = $this->upload->data('file_name');
            $data = [
                "nis" => $this->input->post('nis', true),
                "foto" => $foto,
                "nama" => $this->input->post('nama', true),
                "angkatan" => $this->input->post('angkatan', true),
                "id_jurusan" => $this->input->post('jurusan', true),
                "email" => $this->input->post('email', true),
                "hp" => $this->input->post('hp', true),
                "alamat" => $this->input->post('alamat', true)
            ];

            $this->db->insert('siswa', $data);

            $this->session->set_flashdata('flash', 'Ditambahkan!');
        } else {
            $this->session->set_flashdata('error', $this->upload->display_errors());
        }
    }
}

    public function Ubahsiswa()
    {
        $upload_image = $_FILES['image']['name'];
        if ($upload_image) {
            $config['allowed_types'] = 'gif|jpg|jpeg|png';
            $config['max_size'] = '2048';
            $config['upload_path'] = './assets/foto/';

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('image')) {
                $foto = $this->upload->data('file_name');
                $this->db->set('foto', $foto);
            } else {
                $this->session->set_flashdata('error', $this->upload->display_errors());
            }
        }

        $id = $this->input->post('id', true);
        $nis = $this->input->post('nis', true);
        $nama = $this->input->post('nama', true);
        $angkatan = $this->input->post('angkatan', true);
        $id_jurusan = $this->input->post('jurusan', true);
        $email = $this->input->post('email', true);
        $hp = $this->input->post('hp', true);
        $alamat = $this->input->post('alamat', true);

        $this->db->set('nis', $nis);
        $this->db->set('nama', $nama);
        $this->db->set('angkatan', $angkatan);
        $this->db->set('id_jurusan', $id_jurusan);
        $this->db->set('email', $email);
        $this->db->set('hp', $hp);
        $this->db->set('alamat', $alamat);

        $this->db->where('id', $id);
        $this->db->update('siswa');
    }

    public function Hapussiswa($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('siswa');
    }

    public function getSiswaById($id)
    {
        $joinsiswa = "SELECT    a.id,
                                a.nis,
                                a.foto,
                                a.nama,
                                a.angkatan,
                                a.id_jurusan,
                                b.jurusan,
                                a.email,
                                a.hp,
                                a.alamat
                                FROM siswa AS a
                                JOIN jurusan AS b
                                ON a.id jurusan = b.id
                                WHERE a.id = $id";
       return $this->db->get_where('joinsiswa', ['id' => $id])->row_array();
    }

    public function Carisiswa()
    {
        $keyword = $this->input->post('keyword', true);
        $this->db->like('nis', $keyword);
        $this->db->or_like('nama', $keyword);
        $this->db->or_like('angkatan', $keyword);
        $this->db->or_like('jurusan', $keyword);
        $this->db->or_like('email', $keyword);
        $this->db->or_like('hp', $keyword);
        $this->db->or_like('alamat', $keyword);
        return $this->db->get('jurusan')->result_array();
    }
}