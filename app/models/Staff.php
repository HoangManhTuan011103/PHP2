<?php
    namespace App\Models;
    class Staff extends BaseModel {
        protected $table = "staffs";
        public function getList() {
            $sql = "SELECT *FROM {$this->table}";
            $this->setQuery($sql);
            return $this->loadAllRows();
        }
        public function addStaff($id, $name, $img, $birthday, $address, $role) {
            $sql = "INSERT INTO {$this->table} VALUES (?,?,?,?,?,?)";
            $this->setQuery($sql);
            return $this->execute([$id, $name, $img, $birthday, $address, $role]);
        }
        public function deleteStaff($id) {
            $sql = "DELETE FROM {$this->table} WHERE id=?";
            $this->setQuery($sql);
            return $this->execute([$id]);
        }
        public function getDetailStaff($id) {
            $sql = "SELECT * FROM {$this->table} WHERE id=?";
            $this->setQuery($sql);
            return $this->loadRow([$id]);
        }
        public function updateStaff($id, $name, $img, $birthday, $address, $role) {
            $sql = "UPDATE {$this->table} SET name=?, img=?, birthday=?, addess=?, role=? WHERE id=?";
            $this->setQuery($sql);
            return $this->execute([$name, $img, $birthday, $address, $role, $id]);
        }
       
    }

?>