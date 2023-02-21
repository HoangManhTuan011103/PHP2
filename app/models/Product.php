<?php
    namespace App\Models;

    class Product extends BaseModel {
        protected $table = "product";
        protected $category = "category";
        public function getList() {
            $sql = "SELECT A.*, B.name as 'name_cate' FROM {$this->table} A INNER JOIN {$this->category} B ON A.id_cate=B.id";
            $this->setQuery($sql);
            return $this->loadAllRows();
        }
        public function addProduct($id, $name, $img, $price, $amount, $date, $category) {
            $sql = "INSERT INTO {$this->table} VALUES (?,?,?,?,?,?,?)";
            $this->setQuery($sql);
            return $this->execute([$id, $name, $img, $price, $amount, $date, $category]);
        }
        public function deleteProduct($id) {
            $sql = "DELETE FROM {$this->table} WHERE id=?";
            $this->setQuery($sql);
            return $this->execute([$id]);
        }
        public function getDetailProduct($id) {
            $sql = "SELECT * FROM {$this->table} WHERE id=?";
            $this->setQuery($sql);
            return $this->loadRow([$id]);
        }
        public function updateProduct($id, $name, $img, $price, $amount, $date, $category) {
            $sql = "UPDATE {$this->table} SET name=?, img=?, price=?, amount=?, created_at=?, id_cate=? WHERE id=?";
            $this->setQuery($sql);
            return $this->execute([$name, $img, $price, $amount, $date, $category, $id]);
        }
       
    }

?>