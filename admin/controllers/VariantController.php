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
}