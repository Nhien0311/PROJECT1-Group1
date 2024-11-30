<?php
class AuthorController
{
    private $author;

    public function __construct()
    {
        $this->author = new Author();
    }

    public function login()
    {
        if (isset($_POST['login'])) {
            $nameAuthor = $_POST['name_author'];
            $passAuthor = ($_POST['pass_author']);

            $this->author->login($nameAuthor, $passAuthor);
        } else {
            require_once 'views/login.php';
        }
    }

    public function logout()
    {
        $this->author->logout();
    }
}
?>