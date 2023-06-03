<?php
class Controller
{
    public function view($view, $data = [])
    {
        require "../app/views/" . $view . ".php";
    }

    public function model($nama_model)
    {
        require "../app/models/" . $nama_model . ".php";
        // instance dari nama modelnya
        return new $nama_model;
    }
}
?>