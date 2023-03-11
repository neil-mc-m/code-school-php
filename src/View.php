<?php

namespace App;

class View
{
    public array $data = [];
    private string $templatePath;

    public function __construct($templatePath)
    {
        $this->templatePath = $templatePath;
    }

    public function render()
    {
        ob_start();
        include $this->templatePath;
        return ob_get_clean();
    }

    public function __set(mixed $key, mixed $value)
    {
        $this->data[$key] = $value;
    }

    public function __get(mixed $key)
    {
        return $this->data[$key];
    }
}