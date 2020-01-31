<?php
namespace sts;

class App
{
    protected $requestUri = [];
    protected $requestParams = [];
    protected $action = '';
    protected $method = '';
    protected $data = [];

    public static function create()
    {
        return new App();
    }

    public function run()
    {
        global $em;

        $result = '';

        if (!count($this->requestUri)
            || $this->requestUri[0] != 'api') {
            return;
        }

        if ($this->method == 'GET') {
            $api = new Api($em);
            $method = $this->requestUri[1];
            if (method_exists($api, $method)) {
                $result = $api->$method($this->data);
            }
        }

        return $result;
    }

    protected function __construct()
    {
        header("Access-Control-Allow-Orgin: *");
        header("Access-Control-Allow-Methods: *");
        header("Content-Type: application/json");

        $this->requestUri = explode('/', trim($_SERVER['REQUEST_URI'],'/'));
        $this->requestParams = $_REQUEST;
        $this->method = $_SERVER['REQUEST_METHOD'];
        $this->data = json_decode(file_get_contents("php://input"), true);
    }
}
