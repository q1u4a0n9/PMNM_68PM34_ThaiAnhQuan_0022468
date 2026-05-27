<?php
class App
{
    protected $controller = 'home';
    protected $views = 'index';
    protected $param = [];


    public function __construct()
    {
        
        $urlProcessed = $this->UrlProcess(); //mang url dc xu ly
        // var_dump($urlProcessed);
        //xu ly controller
        if(isset($urlProcessed[0]) ) {
            if(file_exists('../app/controllers/'.$urlProcessed[0].'.php')){
                $this->controller = $urlProcessed[0];
                unset($urlProcessed[0]);
            }
    }

    //xy ly action
    require_once '../app/controllers/' . $this->controller.'.php';
    $this->controller = new $this->controller;
    if(isset($urlProcessed[1]) ) {
        if(method_exists($this->controller, $urlProcessed[1])){
            $this->views = $urlProcessed[1];
            unset($urlProcessed[1]);
        }
    }

    //xy ly param
    $this->param = $urlProcessed ? array_values($urlProcessed) : [];
    call_user_func_array([$this->controller, $this->views], $this->param);

    }
    //ham xu ly url
    public function UrlProcess()
    {
        if (isset($_GET['url'])){
            return explode('/', filter_var(trim($_GET['url'], '/')));
        }
        
    }

 
    

}
?>