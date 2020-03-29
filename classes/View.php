<?php

/**
 * class View
 * @property string $error
 */
class View
{
    /**
     * @var array
     */
    protected $data = [];

    /**
     * @param $k
     * @param $v
     */
    public function __set($k, $v)
    {
        $this->data[$k] = $v;
    }

    /**
     * @param $template
     * @return false|string
     */
    public function render($template)
    {
        ob_start();
        include __DIR__ . '/../views/' . $template;
        $content = ob_get_contents();
        ob_end_clean();

        return $content;
    }

    /**
     * @param $template
     */
    public function display($template)
    {
        echo $this->render($template);
    }
}