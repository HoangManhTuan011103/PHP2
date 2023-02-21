<?php
    namespace App\Controllers;
    use App\Models\Staff;
    class StaffController extends BaseController {
        public $staff;
        public function __construct()
        {
            $this->staff = new Staff();
        }
        public function index() {
            $list = $this->staff->getList();
            $this->render('staff.list',compact('list'));
        }
        public function formAdd() {
            $this->render('staff.add');
        }
        public function deleteStaff($id) {
            $staff = $this->staff->getDetailStaff($id);
            $img = $staff->img;
            unlink("app/views/staff/img/" . $img);
            $this->staff->deleteStaff($id);
            redirect('success','Bạn đã xóa thành công','list-staff');
        }
        public function formEdit($id) {
            $staff = $this->staff->getDetailStaff($id);
            $this->render('staff.edit',compact('staff'));
        }
        public function formAddPost() {
            if(isset($_POST['addStaff'])){
                $errors = [];
                $file = $_FILES['image'];
                $name = $_POST['name'];
                $img = time() . "-" . $file['name'];
               
                $birthday = $_POST['date'];
                $address = $_POST['address'];
                $role = $_POST['role'];
               
                if(trim($name) === ""){
                    $errors['name'] = "Bạn phải điền tên nhân viên";
                }
                if($file['size'] == 0){
                    $errors['img'] = "Bạn phải chọn ảnh nhân viên";
                }
                if(trim($address) === ""){
                    $errors['address'] = "Bạn phải điền địa chỉ nhân viên";
                }
                if(trim($birthday) === ""){
                    $errors['date'] = "Bạn phải điền ngày sinh";
                }
                if($role === ""){
                    $errors['role'] = "Bạn phải chọn chức vụ";
                }
                if(!$errors){
                    move_uploaded_file($file['tmp_name'],"app/views/staff/img/".$img);
                    $result = $this->staff->addStaff(null, $name, $img, $birthday, $address, $role);
                    if($result) {
                        redirect('success','Bạn đã thêm thành công','form-add-staff');
                    }
                } else {
                    redirect('errors',$errors,'form-add-staff');
                }
            }
        }
        public function formEditPost($id) {
            if(isset($_POST['addUpdate'])){
                $errors = [];
                $file = $_FILES['image'];
                $name = $_POST['name'];
                $data = $this->staff->getDetailStaff($id);
                $img = $data->img;
                $birthday = $_POST['date'];
                $address = $_POST['address'];
                $role = $_POST['role'];
                if ($file['error'] == 0) {
                    $dir_uploads = "app/views/staff/img/";
                    if ($img != "" && file_exists($dir_uploads . $img)) {
                        unlink($dir_uploads . $img);
                    }
                    $img = time() . "-" . $file['name'];
                    move_uploaded_file($file['tmp_name'], $dir_uploads . $img);
                }
                if(trim($name) === ""){
                    $errors['name'] = "Bạn phải điền tên nhân viên";
                }
                if(trim($address) === ""){
                    $errors['address'] = "Bạn phải điền địa chỉ nhân viên";
                }
                if(trim($birthday) === ""){
                    $errors['date'] = "Bạn phải điền ngày sinh";
                }
                if($role === ""){
                    $errors['role'] = "Bạn phải chọn chức vụ";
                }
                if(!$errors){
                    move_uploaded_file($file['tmp_name'],"app/views/staff/img/".$img);
                    $result = $this->staff->updateStaff($id, $name, $img, $birthday, $address, $role);
                    if($result) {
                        redirect('success','Bạn đã sửa thành công','list-staff');
                    }
                } else {
                    redirect('errors',$errors,'form-edit-staff'.$id);
                }
            }
        }
        
      
       
    }

?>