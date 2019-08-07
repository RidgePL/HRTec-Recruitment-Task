<?php

namespace KrystianLataRekrutacjaHRTec\classes;

class CsvCreator
{
    private $mode;
    private $path;
    private $xml;

    public function __construct($mode, $path, XmlLoader $xml)
    {
        $this->setMode($mode);
        $this->setPath($path);
        $this->setXml($xml);
    }

    public function run()
    {
        $xml_file = $this->xml->run();
        if ($xml_file !== false) {
            $csv_file = fopen($this->getPath(), $this->getMode());
            $this->createCsv($xml_file, $csv_file);
            fclose($csv_file);
        } else {
            die('Seems like the website provided from URL has no xml');
        }
    }

    public function createCsv($xml, $file)
    {
        $array = array('Title','Description','Link','PubDate','Creator');
        fputcsv($file, $array, ',');
        fwrite($file, "\r\n");

        foreach ($xml->channel->item as $item) {
            $array = array(
                $item->title,
                strip_tags($item->description),
                $item->link,
                date('d F Y H:i:s', strtotime($item->pubDate)),
                $item->author
            );
            fputcsv($file, $array, ',');
            fwrite($file, "\r\n");
        }
    }

    /**
     * @return mixed
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * @param mixed $path
     */
    public function setPath($path)
    {
        $this->path = $path;
    }

    /**
     * @return mixed
     */
    public function getXml()
    {
        return $this->xml;
    }

    /**
     * @param mixed $xml
     */
    public function setXml(XmlLoader $xml)
    {
        $this->xml = $xml;
    }

    /**
     * @return mixed
     */
    public function getMode()
    {
        return $this->mode;
    }

    /**
     * @param mixed $mode
     */
    public function setMode($mode)
    {
        $this->mode = $mode;
    }
}
