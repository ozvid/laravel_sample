<?php

namespace App\components;

use Illuminate\Database\Eloquent\Model;

class TModel extends Model{
    
    public $error;
    
    public function save(array $options = []){
        try{
            return parent::save($options);
        }catch(\Illuminate\Database\QueryException $e) {
            $this->error = $e->getMessage();
            return false;
        }
    }
    
    public function getErrorSummary() {
        return $this->error;
    }
    
}
