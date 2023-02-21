<?php
    namespace App\Controllers;
    use App\Models\Product;
    use App\Models\Category;
    class ProductController extends BaseController {
        public $product;
        public $category;
        public function __construct()
        {
            $this->product = new Product();
            $this->category = new Category();
        }
        public function index() {
            $list = $this->product->getList();
            $this->render('product.list',compact('list'));
        }
        public function formAdd() {
            $listCategory = $this->category->getList();
            $this->render('product.add',compact('listCategory'));
        }
        public function deleteProduct($id) {
            $product = $this->product->getDetailProduct($id);
            $img = $product->img;
            unlink("app/views/product/img/" . $img);
            $this->product->deleteProduct($id);
            redirect('success','Bạn đã xóa thành công','list-product');
        }
        public function formEdit($id) {
            $listCategory = $this->category->getList();
            $product = $this->product->getDetailProduct($id);
            $this->render('product.edit',compact('product','listCategory'));
        }
        public function formAddPost() {
            if(isset($_POST['addProduct'])){
                $errors = [];
                $file = $_FILES['image'];
                $name = $_POST['name'];
                $img = time() . "-" . $file['name'];
                $price = $_POST['price'];
                $amount = $_POST['amount'];
                $date = $_POST['date'];
                $category = $_POST['category'];
               
                if(trim($name) === ""){
                    $errors['name'] = "Bạn phải điền tên sản phẩm";
                }
                if($file['size'] == 0){
                    $errors['img'] = "Bạn phải chọn ảnh";
                }
              
                if(trim($price) === ""){
                    $errors['price'] = "Bạn phải điền giá sản phẩm";
                }
                if(trim($amount) === ""){
                    $errors['amount'] = "Bạn phải điền số lượng sản phẩm";
                }
                if(trim($date) === ""){
                    $errors['date'] = "Bạn phải điền này nhập sản phẩm";
                }
                if($category === ""){
                    $errors['category'] = "Bạn phải chọn danh mục";
                }
                if(!$errors){
                    move_uploaded_file($file['tmp_name'],"app/views/product/img/".$img);
                    $result = $this->product->addProduct(null, $name, $img, $price, $amount, $date, $category);
                    if($result) {
                        redirect('success','Bạn đã thêm thành công','form-add-product');
                    }
                } else {
                    redirect('errors',$errors,'form-add-product');
                }
            }
        }
        public function formEditPost($id) {
            if(isset($_POST['editProduct'])){
                $errors = [];
                $file = $_FILES['image'];
                $name = $_POST['name'];
                $data = $this->product->getDetailProduct($id);
                $img = $data->img;
                $price = $_POST['price'];
                $amount = $_POST['amount'];
                $date = $_POST['date'];
                $category = $_POST['category'];
                if ($file['error'] == 0) {
                    $dir_uploads = "app/views/product/img/";
                    if ($img != "" && file_exists($dir_uploads . $img)) {
                        unlink($dir_uploads . $img);
                    }
                    $img = time() . "-" . $file['name'];
                    move_uploaded_file($file['tmp_name'], $dir_uploads . $img);
                }
                if(trim($name) === ""){
                    $errors['name'] = "Bạn phải điền tên sản phẩm";
                }
                if(trim($price) === ""){
                    $errors['price'] = "Bạn phải điền giá sản phẩm";
                }
                if(trim($amount) === ""){
                    $errors['amount'] = "Bạn phải điền số lượng sản phẩm";
                }
                if(trim($date) === ""){
                    $errors['date'] = "Bạn phải điền này nhập sản phẩm";
                }
                if($category === ""){
                    $errors['category'] = "Bạn phải chọn danh mục";
                }
                if(!$errors){
                    move_uploaded_file($file['tmp_name'],"app/views/product/img/".$img);
                    $result = $this->product->updateProduct($id, $name, $img, $price, $amount, $date, $category);
                    if($result) {
                        redirect('success','Bạn đã sửa thành công','list-product');
                    }
                } else {
                    redirect('errors',$errors,'form-edit-product'.$id);
                }
            }
        }
       
    }

?>