<?php
class Controller
{
    // Hàm gọi Model
    public function model($model)
    {
        require_once '../app/models/' . $model . '.php';
        return new $model();
    }

    // Hàm gọi View và truyền data
    public function view($view, $data = [])
    {
        // DÒNG QUAN TRỌNG NHẤT: Giải nén mảng thành các biến độc lập
        // VD: Key 'sinhviens' trong mảng sẽ biến thành biến $sinhviens
        extract($data);
        
        // Sau khi extract xong mới require file view vào
        require_once '../app/views/' . $view . '.php';
    }
}
?>