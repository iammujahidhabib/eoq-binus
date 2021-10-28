<?php
defined('BASEPATH') or exit('No direct script access allowed');

class templates extends CI_Model
{
    public function insert($tabel, $data)
    {
        $this->db->insert($tabel, $data);
        // return $this->db->insert_id();
    }
    public function insert_id($tabel, $data)
    {
        $this->db->insert($tabel, $data);
        return $this->db->insert_id();
    }
    public function update($tabel, $where, $data)
    {
        $this->db->where($where);
        return $this->db->update($tabel, $data);
    }
    public function delete($tabel, $where)
    {
        $this->db->where($where);
        return $this->db->delete($tabel);
    }
    public function view_where($tabel, $where)
    {
        $this->db->where($where);
        return $this->db->get($tabel);
    }
    public function view_where_order($tabel, $where, $order, $type = null)
    {
        if ($type == null) {
            $type = 'asc';
        }
        $this->db->where_in($where);
        $this->db->order_by($order, $type);
        return $this->db->get($tabel);
    }
    public function view_order($tabel, $order, $type = null)
    {
        if ($type == null) {
            $type = 'asc';
        }
        $this->db->order_by($order, $type);
        return $this->db->get($tabel);
    }
    public function view($tabel)
    {
        return $this->db->get($tabel);
    }
    public function query($query)
    {
        return $this->db->query($query);
    }
    public function join($tabel, $using, $with, $type = null)
    {
        $this->db->select('*');
        $this->db->from($tabel);
        if ($type == null) {
            $this->db->join($with, $using);
        } else {
            $this->db->join($with, $using, $type);
        }
        $query = $this->db->get();
        return $query;
    }
    public function join_where($tabel, $using, $with, $where, $type = null)
    {
        $this->db->select('*');
        $this->db->from($tabel);
        if ($type == null) {
            $this->db->join($with, $using);
        } else {
            $this->db->join($with, $using, $type);
        }
        $this->db->where($where);
        $query = $this->db->get();
        return $query;
    }
    public function view_limit($tabel, $limit, $start)
    {
        $query = $this->db->get($tabel, $limit, $start);
        return $query;
    }
    public function view_limit_where($tabel, $limit, $start, $where)
    {
        $this->db->where($where);
        $query = $this->db->get($tabel, $limit, $start);
        return $query;
    }
}
