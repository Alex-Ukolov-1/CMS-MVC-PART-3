<?php
namespace MVC\Controllers;


class Controller
{
    public $path;
    public $router;
    public $model;

    public function __construct($path)
    {
        $this->path = $path;
        $this->router = Router::parse($path);
        $class = 'MVC\\Models\\' . ucfirst($this->router->model);
        $this->model = new $class();
        if($this->router->id) {
            $this->model = $this->model->collection[$this->router->id];
        }
    }

    public function render()
    {
        $class = get_class($this->model);
        $class = substr($class, strrpos($class, '\\') + 1);
        $decorator = \MVC\Decorators\DecoratorFactory::create(
            $this->router->ext,
            $class,
            $this->model);
        $view = \MVC\Views\ViewFactory::create(
            $this->router->ext,
            $class,
            $decorator);
        return $view->render();
    }
}