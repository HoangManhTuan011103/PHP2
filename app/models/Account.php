<?php
    namespace App\Models;
    class Account extends BaseModel {
        protected $table = "accounts";
        public function getList() {
            $sql = "SELECT *FROM {$this->table}";
            $this->setQuery($sql);
            return $this->loadAllRows();
        }
        public function addAccount($id, $email, $password, $avatar, $name, $phoneNumber, $address, $created_at, $role) {
            $sql = "INSERT INTO {$this->table} VALUES (?,?,?,?,?,?,?,?,?)";
            $this->setQuery($sql);
            return $this->execute([$id, $email, $password, $avatar, $name, $phoneNumber, $address, $created_at, $role]);
        }
        public function deleteAccount($id) {
            $sql = "DELETE FROM {$this->table} WHERE id=?";
            $this->setQuery($sql);
            return $this->execute([$id]);
        }
        public function getDetailAccount($id) {
            $sql = "SELECT * FROM {$this->table} WHERE id=?";
            $this->setQuery($sql);
            return $this->loadRow([$id]);
        }
       
    }

?>