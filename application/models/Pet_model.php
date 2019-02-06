<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Pet_model extends CI_Model
{
	function petListingCount($searchText = '')
	{
		$this->db->select('BaseTbl.id, BaseTbl.name, type.name, breed.name, BaseTbl.Owner');
		$this->db->from('pets as BaseTbl');
		$this->db->join('pet_type as type', 'type.id = BaseTbl.type','inner');
		$this->db->join('breed as breed', 'breed.id = BaseTbl.breed','inner');
		if(!empty($searchText)) {
			$likeCriteria = "(BaseTbl.name  LIKE '%".$searchText."%'
			OR  type.name  LIKE '%".$searchText."%'
			OR  breed.name  LIKE '%".$searchText."%')";
			$this->db->where($likeCriteria);
		}
		$this->db->order_by('BaseTbl.id', 'DESC');

		$query = $this->db->get();
		
		$result = $query->result();        
		return $result;
	}
	
	function petListing($searchText2 = '', $pages, $segments)
	{
		$this->db->select('BaseTbl.id, BaseTbl.name, type.name, breed.name, BaseTbl.Owner');
		$this->db->from('pets as BaseTbl');
		$this->db->join('pet_type as type', 'type.id = BaseTbl.type','inner');
		$this->db->join('breed as breed', 'breed.id = BaseTbl.breed','inner');
		if(!empty($searchText)) {
			$likeCriteria = "(BaseTbl.name  LIKE '%".$searchText."%'
			OR  type.name  LIKE '%".$searchText."%'
			OR  breed.name  LIKE '%".$searchText."%')";
			$this->db->where($likeCriteria);
		}
		$this->db->order_by('BaseTbl.id', 'DESC');
		$this->db->limit($pages, $segments);
		$query = $this->db->get();
		
		$result = $query->result();        
		return $result;
	}
}