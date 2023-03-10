<?php
    namespace App\Models;
    class Brand extends BaseModel {
        protected $table = "brands";
        public function getList() {
            $sql = "SELECT *FROM {$this->table}";
            $this->setQuery($sql);
            return $this->loadAllRows();
        }
        public function addBrand($id, $name, $amount) {
            $sql = "INSERT INTO {$this->table} VALUES (?,?,?)";
            $this->setQuery($sql);
            return $this->execute([$id, $name, $amount]);
        }
        public function deleteBrand($id) {
            $sql = "DELETE FROM {$this->table} WHERE id=?";
            $this->setQuery($sql);
            return $this->execute([$id]);
        }
        public function getDetailBrand($id) {
            $sql = "SELECT * FROM {$this->table} WHERE id=?";
            $this->setQuery($sql);
            return $this->loadRow([$id]);
        }
        public function upDateBrand($id,$name,$amount_product) {
            $sql = "UPDATE {$this->table} SET name=?, amount_product=? WHERE id=?";
            $this->setQuery($sql);
            return $this->execute([$name,$amount_product,$id]);
        }
       
    }

?>