<?php
namespace ITplusX\XlifToJson\Utility;

class XlifToXML
{
    /**
     * Converts xlif to xml
     *
     * @param string $xlif Xlif string to be parsed to xml
     *
     * @return string
     */
    public static function encodeToXML($xlif)
    {
        $xlifToArray = preg_split("/\\n/", $xlif);

        $xlifOpen = preg_grep("/<xliff.*/", $xlifToArray);
        $xlifClose = preg_grep("/<\/xliff>/", $xlifToArray);

        if(count($xlifOpen) == 1) {
            unset($xlifToArray[key($xlifOpen)]);
        }
        if(count($xlifClose) == 1) {
            unset($xlifToArray[key($xlifClose)]);
        }

        return simplexml_load_string(implode("\n", $xlifToArray));
    }
}