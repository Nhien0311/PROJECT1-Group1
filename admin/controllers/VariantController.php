<?php
class VariantController
{
    private $variantModel;

    public function __construct()
    {
        $this->variantModel = new Variant();
    }

    public function index()
    {
        $variants = $this->variantModel->getAll();
        require_once 'views/variants/index.php';
    }

    public function show($id)
    {
        $variant = $this->variantModel->getById($id);
        require_once 'views/variants/show.php';
    }

    public function add() 
    {
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $thumbnail = '';
            $fileImg = "./uploads/";
            if(isset($_FILES['thumbnail']) && $_FILES['thumbnail']['error'] == 0)
            {
                $thumbnail = $fileImg . basename($_FILES['thumbnail']['name']);
                move_uploaded_file($_FILES['thumbnail']['tmp_name'], $thumbnail);
            }

            $data = [
                'product_id' => $_POST['idVariant'] ?? '',
                'price' => $_POST['priceVariant'] ?? 0,
                'quantity' => $_POST['quantityVariant'] ?? 0,
                'thumbnail' => $thumbnail,
                'status' => $_POST['statusVariant'] ?? '',
                'description' => $_POST['descriptionVariant'] ?? '',
                'name' => $_POST['nameModel']
            ];

            $this->variantModel->add($data);
            header('Location: ?act=variants');
        }else{
            require_once 'views/variants/add.php';
        }
    }

    public function edit($id)
    {
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $thumbnail = $_POST['thumbnail'] ?? '';
            $fileImg = "./uploads/";
            if(isset($_FILES['thumbnail']) && $_FILES['thumbnail']['error'] == 0)
            {
                $thumbnail = $fileImg . basename($_FILES['thumbnail']['name']);
                move_uploaded_file($_FILES['thumbnail']['tmp_name'], $thumbnail);
            }

            $data = [
                'product_id' => $_POST['idVariant'],
                'price' => $_POST['priceVariant'] ?? '',
                'quantity' => $_POST['quantityVariant'],
                'thumbnail' => $thumbnail,
                'status' => $_POST['statusVariant'] ?? '',
                'description' => $_POST['descriptionVariant'] ?? '',
                'name' => $_POST['nameModel']
            ];

            $this->variantModel->edit($id, $data);
            header('Location: ?act=variants');
        }else{
            $variant = $this->variantModel->getById($id);
            require_once 'views/variants/edit.php';
        }
    }

    public function delete($id)
    {
        $this->variantModel->delete($id);
        header('Location: ?act=variants');
    }
}