<?php
class App
{
    protected $controller = "Home", $method = "index", $params = [];
    public function __construct()
    {
        $url = $this->parseUrl(); //memanggil method dibawah

        if (file_exists("../app/controllers/" . $url[0] . ".php")) {
            // jika folder pertama setelah public adalah Home maka tampilkan file Home
            $this->controller = $url[0];
            unset($url[0]);
        }
        // Nilai defult selain home:
        require "../app/controllers/" . $this->controller . ".php";
        // instance
        $this->controller = new $this->controller;

        // Jika method ada maka
        if (isset($url[1])) {
            if (method_exists($this->controller, $url[1])) {
                $this->method = $url[1];
                unset($url[1]);
            }
        }

        // Cek apakah ada parameternya contohnya adalah setelah about(method) /home/about/page/10/5
        // page/10/5 itu adalah parameternya

        if (!empty($url)) {
            $this->params = array_values($url);
        }

        //! Jalankan controller & method, serta kirimkan params jika ada
        call_user_func_array([$this->controller, $this->method], $this->params);
    }

    public function parseUrl()
    {
        if (isset($_GET['url'])) {
            return explode('/', filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL));
        } else {
            return ["Home"];
        }
    }
}
?>