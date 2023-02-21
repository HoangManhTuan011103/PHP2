<?php
    namespace App\Controllers;
    use App\Models\Brand;
    class BrandController extends BaseController {
        public $brand;
        public function __construct()
        {
            $this->brand = new Brand();
        }
        public function index() {
            $list = $this->brand->getList();
            $this->render('brand.list',compact('list'));
        }
        public function formAdd() {
            $this->render('brand.add');
        }
        public function formAddPost(){
            if(isset($_POST['addBrand'])){
                $errors = [];
              
                $name = $_POST['name'];
                $amount = $_POST['amount'];
                if(trim($name) === ""){
                    $errors['name'] = "Bạn phải điền tên thương hiệu";
                }
                if(trim($amount) === ""){
                    $errors['amount'] = "Bạn phải điền số lượng sản phẩm";
                }
                if(!$errors){
                    $result = $this->brand->addBrand(null,$name,$amount);
                    if($result) {
                        redirect('success','Bạn đã thêm thành công','form-add-brand');
                    }
                } else {
                    redirect('errors',$errors,'form-add-brand');
                }
            }
        }
    }
?>