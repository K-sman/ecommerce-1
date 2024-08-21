<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Undangans extends CI_Model
{
    var $mst_undangans = "undangans";

    public function getData()
    {
        $query = $this->db->select()
            ->from($this->mst_undangans)
            ->join('productimages', 'undangans.model_undangan = productimages.id_image')
            ->get();
        return $query->result();
    }

    function insertData($data)
    {
        $this->db->insert($this->mst_undangans, $data);
        return $this->db->insert_id();
    }

    function updateData($id_undangan, $data)
    {
        $this->db->where('id_undangan', $id_undangan);
        $this->db->update($this->mst_undangans, $data);
        return TRUE;
    }

    function deleteData($id_undangan)
    {
        $this->db->where('id_undangan', $id_undangan);
        $this->db->delete($this->mst_undangans);
        if ($this->db->affected_rows() == 1) {
            return TRUE;
        }
        return FALSE;
    }
}
?>
