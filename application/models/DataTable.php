<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*--------------------------------------------------
 * Module: Datatable Trait
 * Version: 0.0.1
 * Author: Ajay Kumar <ajaykiet2@gmail.com>
 * Comment: This trait has been used for models having datatable logic,
 *			Please create a copy before changes.
 *----------------------------------------------------*/
trait DataTable{
	private function _get_datatables_query($reference,$conditions=null){
		$this->db->from($this->settings[$reference]['table']);
        $i = 0;
				if(!empty($conditions)){
					foreach($conditions as $column => $value){
						$this->db->where($column,"$value");
					}
				}
				foreach ($this->settings[$reference]['column_search'] as $item){
            if($_POST['search']['value']){
                if($i===0){
                    $this->db->group_start();
                    $this->db->like($item, $_POST['search']['value']);
                }else{
                    $this->db->or_like($item, $_POST['search']['value']);
                }
                if(count($this->settings[$reference]['column_search']) - 1 == $i)
                    $this->db->group_end();
            }
            $i++;
        }

        if(isset($_POST['order'])){
            $this->db->order_by($this->settings[$reference]['column_order'][$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        }else if(isset($this->settings[$reference]['order'])){
            $order = $this->settings[$reference]['order'];
            $this->db->order_by(key($order), $order[key($order)]);
        }
	}

	function count_filtered($reference,$conditions=null){
        $this->_get_datatables_query($reference,$conditions);
        $query = $this->db->get();
        return $query->num_rows();
    }

	public function count_all($reference,$conditions=null){
        $this->db->from($this->settings[$reference]['table']);
				if(!empty($conditions)){
					foreach($conditions as $column => $value){
						$this->db->where($column,"$value");
					}
				}
        return $this->db->count_all_results();
    }
}
