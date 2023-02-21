<?php
    namespace App\Models;
    class Category extends BaseModel {
        protected $table = 'category';
        public function getList() {
            $sql = "SELECT * FROM {$this->table}";
            $this->setQuery($sql);
            return $this->loadAllRows();
        }
        public function addCategory($id, $name, $img, $status) {
            $sql = "INSERT INTO {$this->table} VALUES (?,?,?,?)";
            $this->setQuery($sql);
            return $this->execute([$id, $name, $img, $status]);
        }
        public function deleteCategory($id) {
            $sql = "DELETE FROM {$this->table} WHERE id=?";
            $this->setQuery($sql);
            return $this->execute([$id]);
        }
        public function getDetailCategory($id) {
            $sql = "SELECT * FROM {$this->table} WHERE id=?";
            $this->setQuery($sql);
            return $this->loadRow([$id]);
        }
        public function upDateCategory($id,$name,$img,$status) {
            $sql = "UPDATE {$this->table} SET name=?, img=?, status=? WHERE id=?";
            $this->setQuery($sql);
            return $this->execute([$name,$img,$status,$id]);
        }
    }

?>