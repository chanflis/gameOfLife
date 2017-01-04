<?php

class Render
{
    protected $_html;
    protected $_head;
    protected $_body;

    public function __construct()
    {
        $this->_html = '';
        $this->_head = '';
        $this->_body = '';
    }

    public function setBody($html)
    {
        $this->_body = $html;
    }

    public function getBody()
    {
        return $this->_body;
    }

    public function appendBody($html)
    {
        $this->_body .= $html;
    }

    public function setHead($html)
    {
        $this->_head = $html;
    }

    public function getHead()
    {
        return $this->_head;
    }

    public function appendHead($html)
    {
        $this->_head .= $html;
    }

    public function getHtml()
    {
        return $this->_html;
    }

    public function render()
    {
        $this->_html = '<!DOCTYPE html>';
        $this->_html .= '<html>';
        $this->_html .= '<head>';
        $this->_html .= $this->_head;
        $this->_html .= '</head>';
        $this->_html .= '<body>';
        $this->_html .= $this->_body;
        $this->_html .= '</body>';
        $this->_html .= '</html>';

        echo $this->_html;
    }

}