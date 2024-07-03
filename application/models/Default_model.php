<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Default_model extends CI_Model
{ // veritabanın daki tablodan verileri tek tek çekmeye yarar->get()->row()
    public function get($tableName, $where = array())
    {
        return $this->db->where($where)->get($tableName)->row();
    }

    // veritabanın daki tablodan verilerin hepsini çekmeye yarar->result()->döngü işlemlerinde kullanıcaz.
    public function get_all($tableName, $where = array(), $order = "id ASC")
    {
        return $this->db->where($where)->order_by($order)->get($tableName)->result();
    }

    // veritabanına verileri ekleme işlemi
    public function insert($tableName, $data = array())
    {
        return $this->db->insert($tableName, $data);
    }

    // veritabanına verileri güncelleme işlemi
    public function update($tableName, $where = array(), $data = array())
    {
        return $this->db->where($where)->update($tableName, $data);
    }

    // veritabanına verileri silme işlemi
    public function delete($tableName, $where = array())
    {
        return $this->db->where($where)->delete($tableName);
    }

    public function count($tableName, $where = array())
    {
        return $this->db->where($where)->count_all_results($tableName);
    }

}