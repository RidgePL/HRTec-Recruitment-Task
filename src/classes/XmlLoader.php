<?php

namespace KrystianLataRekrutacjaHRTec\classes;

class XmlLoader
{
    private $url;

    public function __construct($url)
    {
        $this->setUrl($url);
    }

    public function run()
    {
        $content = @simplexml_load_file($this->getUrl());
        return $content;
    }

    public function getUrl()
    {
        return $this->url;
    }

    public function setUrl($url)
    {
        $this->url = $url;
    }
}
