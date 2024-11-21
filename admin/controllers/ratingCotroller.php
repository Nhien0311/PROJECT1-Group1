<?php
class ratingController {
    private $ratingModel;

    function __construct() {
        // Sửa lỗi vòng lặp vô hạn
        $this->ratingModel = new ratingModel(); 
    }

    // Hàm hiển thị danh sách đơn hàng
    function index() {
        $ratings = $this->ratingModel->getAll();
        require_once 'views/ratings/index.php';
    }

    // Hàm xóa đơn hàng
    function delete($id) {
        // Sử dụng đúng đối tượng để xóa
        if ($this->ratingModel->delete($id)) {
            header("Location:?act=ratings");
        } else {
            echo "Lỗi: Không thể xóa đơn hàng.";
        }
     }
     public function edit($id)
     {
         if ($_SERVER['REQUEST_METHOD'] === 'POST') {
             // Process form submission
             $data = [
                
                 'product_id' => $_POST['product_id'],
                 'content' => $_POST['content'],
                 'order_id' => $_POST['order_id'],
                
             ];

             // Update the order
             $ratings = $this->ratingModel->edit($id, $data);
             header('Location:?act=ratings');
           
         } else {
             // Fetch the order data from the model
             $rating = $this->ratingModel->getById($id);
             require_once 'views/ratings/edit.php';
         }
     }
     public function show($id) {
        $ratings = $this->ratingModel->getById($id);
        require_once 'views/ratings/show.php';
    }
 }
?>
