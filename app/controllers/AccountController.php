<?php
    namespace App\Controllers;
    use App\Models\Account;
    class AccountController extends BaseController {
        public $account;
        public function __construct()
        {
            $this->account = new Account();
        }
        public function index() {
            $list = $this->account->getList();
            $this->render('account.list',compact('list'));
        }
        public function formAdd() {
            $this->render('account.add');
        }
        public function deleteAccount($id) {
            $account = $this->account->getDetailAccount($id);
            $img = $account->avatar;
            unlink("app/views/account/img/" . $img);
            $this->account->deleteAccount($id);
            redirect('success','Bạn đã xóa thành công','list-account');
        }
        public function formAddPost() {
            if(isset($_POST['addAccount'])){
                $errors = [];
                $email = $_POST['email'];
                $password = $_POST['password'];
                $file = $_FILES['image'];
                $img = time() . "-" . $file['name'];
                $name = $_POST['name'];
                $phoneNumber = $_POST['phoneNumber'];
                $address = $_POST['address'];
                $role = $_POST['role'];
               
                if(trim($name) === ""){
                    $errors['name'] = "Bạn phải điền tên";
                }
                if(trim($email) === ""){
                    $errors['email'] = "Bạn phải điền Email đăng nhập";
                }
                if(trim($password) === ""){
                    $errors['password'] = "Bạn phải điền mật khẩu";
                }
                if(trim($phoneNumber) === ""){
                    $errors['phoneNumber'] = "Bạn phải điền số điện thoại";
                } else if(strlen($phoneNumber) < 10 || substr($phoneNumber,0,1) != 0){
                    $errors['phoneNumber'] = "Bạn phải điền đúng định dạng";
                }
                if($role === ""){
                    $errors['role'] = "Bạn phải chọn chức vụ";
                }
                if(!$errors){
                    move_uploaded_file($file['tmp_name'],"app/views/account/img/".$img);
                    $result = $this->account->addAccount(null, $email, $password, $img, $name, $phoneNumber, $address, null, $role);
                    if($result) {
                        redirect('success','Bạn đã thêm thành công','form-add-account');
                    }
                } else {
                    redirect('errors',$errors,'form-add-account');
                }
            }
        }
    }

?>