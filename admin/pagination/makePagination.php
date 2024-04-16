<?php
/**
 * 
 * @package Chocoletras
 * @subpackage Ricardo Perez
 * @file Pagination
*/ 

class makePagination{
   
    public function __construct($database){
      $this->database = $database;
    }

    public function getTotalOfRows(){
        global $wpdb; 
         $getTotalOfRows = $wpdb->get_var("SELECT COUNT(*) FROM ".$this->database." "); 
          
       return $getTotalOfRows; 
    }

    public function returnListPaginated($offset, $stopValue){
      global $wpdb; 
      $fivesdrafts = $wpdb->get_results("SELECT * FROM ".$this->database." LIMIT $stopValue OFFSET $offset ");
      return $fivesdrafts;
    }


    public function paginationElements(){ 
        return self::getTotalOfRows();
  }
  
}