<?php
    namespace App\Controllers;
    use App\Models\Category;

    class CategoryController extends BaseController {
        public $category;
        public function __construct()
        {
            $this->category = new Category();
        }
        public function index(){
            $list = $this->category->getList();
            $this->render('category.list',compact('list'));
        }
        public function formAdd(){
            $this->render('category.add');
        }
        public function formAddPost(){
            if(isset($_POST['addCategory'])){
                $errors = [];
                $file = $_FILES['image'];
                $name = $_POST['name'];
                $img = time() . "-" . $file['name'];
                $status = $_POST['status'];
                if(trim($name) === ""){
                    $errors['name'] = "Bạn phải điền tên danh mục";
                }
                if($status === ""){
                    $errors['status'] = "Bạn phải chọn trạng thái danh mục";
                }
                if(!$errors){
                    move_uploaded_file($file['tmp_name'],"app/views/category/img/".$img);
                    $result = $this->category->addCategory(null,$name,$img,$status);
                    if($result) {
                        redirect('success','Bạn đã thêm thành công','form-add-category');
                    }
                } else {
                    redirect('errors',$errors,'form-add-category');
                }
            }
        }
        public function deleteCategory($id){
            $category = $this->category->getDetailCategory($id);
            $img = $category->img;
            unlink("app/views/category/img/" . $img);
            $this->category->deleteCategory($id);
            redirect('success','Bạn đã xóa thành công','list-category');
        }

        public function formEdit($id){
            $category = $this->category->getDetailCategory($id);
            $this->render('category.edit',compact('category'));
        }

        public function formEditPost($id) {
            if(isset($_POST['editCategory'])){
                $errors = [];
                $file = $_FILES['image'];
                $name = $_POST['name'];
                $data = $this->category->getDetailCategory($id);
                $img = $data->img;
                $status = $_POST['status'];
                // error = 0 là file được gửi thành công
                if ($file['error'] == 0) {
                    $dir_uploads = "app/views/category/img/";
                    if ($img != "" && file_exists($dir_uploads . $img)) {
                        unlink($dir_uploads . $img);
                    }
                    $img = time() . "-" . $file['name'];
                    move_uploaded_file($file['tmp_name'], $dir_uploads . $img);
                }
                if(trim($name) === ""){
                    $errors['name'] = "Bạn phải điền tên danh mục";
                }
                if(!$errors){               
                    $result = $this->category->upDateCategory($id,$name,$img,$status);
                    if($result){
                        redirect('success','Bạn đã sửa thành công','list-category');
                    }
                } else {
                    redirect('errors',$errors,'form-edit-category'.$id);
                }
            }
        }
    }

?>