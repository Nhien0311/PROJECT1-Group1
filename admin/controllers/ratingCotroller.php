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
        require_once 'admin/views/ratings/index.php';
    }

    // Hàm xóa đơn hàng
    function delete($id) {
        // Sử dụng đúng đối tượng để xóa
        try {
            $this->ratingModel->delete($id);

            // Thông báo thành công
            $_SESSION['message'] = [
                'title' => 'Thành công!',
                'text' => 'Bình luận đã được xóa!',
                'icon' => 'success',
            ];
        } catch (Exception $e) {
            // Thông báo lỗi
            $_SESSION['message'] = [
                'title' => 'Lỗi!',
                'text' => 'Không thể xóa bình luận: ' . $e->getMessage(),
                'icon' => 'error',
            ];
        }

        header('Location:?act=ratings');
        exit;
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
            $_SESSION['message'] = [
                'title' => 'Thành công!',
                'text' => 'Bình luận đã được thêm thành công.',
                'icon' => 'success',
            ];
            header('Location:?act=ratings');
           
         } else {
             // Fetch the order data from the model
             $ratings = $this->ratingModel->getById($id);
             require_once 'admin/views/ratings/edit.php';
         }
     }
     public function show($id) {
        $ratings = $this->ratingModel->getById($id);
        require_once 'admin/views/ratings/show.php';
    }
 }
?>
