<?php 

class M_dashboard extends CI_Model{


    function inProgress(){
       $query = $this->db
                        ->where('status_id', 1)
                        ->count_all_results('projects');
       return $query;
    }
    function done(){
       $query = $this->db
                        ->where('status_id', 2)
                        ->count_all_results('projects');
       return $query;
    }
    function pending(){
       $query = $this->db
                        ->where('status_id', 3)
                        ->count_all_results('projects');
       return $query;
    }
    function canceled(){
       $query = $this->db
                        ->where('status_id', 4)
                        ->count_all_results('projects');
       return $query;
    }

    function totalProjects(){
       $query = $this->db
                        ->count_all_results('projects');
       return $query;
    }
}