<?php
class HomeController
{
    private $product;
    public function __construct()
    {
        $this->product = new Product();
    }
    public function index()
    {
        $query = $_GET;

        $search = isset($query['search']) ? $query['search'] : '';
        $price_from = isset($query['price_from']) ? $query['price_from'] : '';
        $price_to = isset($query['price_to']) ? $query['price_to'] : '';
    
        $condition = '';
        if ($search != '') {
            $condition .= 'p.name LIKE "%' . $search .'%"';
        }
        if ($price_from != '' && $price_to != '') {
            if ($condition != '') {
                $condition .= ' AND ';
            }
            $condition .= 'p.price BETWEEN ' . $price_from . ' AND ' . $price_to;
        }

        if ($condition != '') {
            $products = $this->product->getWhere($condition);
        } else {
            $products = $this->product->getAll();
        }

        require_once 'views/home.php';
    }
    public function show($id)
    {
        $product = $this->product->getById($id);
        require_once './views/single-product/single-product.php';
    }
}
;
?>