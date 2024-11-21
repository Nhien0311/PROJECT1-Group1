<?php
class ratingController {
    private $ratingModel;

    function __construct() {
        // Sửa lỗi vòng lặp vô hạn
        $this->ratingModel = new ratingModel(); 
    }

    // Hàm hiển thị danh sách đơn hàng
    function index() {
        $allrating = $this->ratingModel->getAll();
        require_once 'views/ratings/index.php';
    }

    // Hàm xóa đơn hàng
    function deleterating($id) {
        // Sử dụng đúng đối tượng để xóa
        if ($this->ratingModel->deleterating($id)) {
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
             $hihi = $this->ratingModel->edit($id, $data);
             header('Location:?act=ratings/index.php');
           
         } else {
             // Fetch the order data from the model
             $rating = $this->ratingModel->getById($id);
             require_once 'views/ratings/edit.php';
         }
     }
     
 }
?>
