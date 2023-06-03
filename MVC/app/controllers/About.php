<?php
class About extends Controller
{
    public function index($nama = "User", $profesi = "Pembaca", $hobi = "membaca")
    {
        $data = ['title' => 'About', 'nama' => $nama, 'profesi' => $profesi, 'hobi' => $hobi];

        $this->view("template/header", $data);
        $this->view("about/index", $data);
        $this->view("template/footer");
    }
    public function page()
    {
        $data = ['title' => "Page"];
        $this->view("template/header", $data);
        $this->view("about/page");
        $this->view("template/footer");
    }
}