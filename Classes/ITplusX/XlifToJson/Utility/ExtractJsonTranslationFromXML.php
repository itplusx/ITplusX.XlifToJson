<?php
namespace ITplusX\XlifToJson\Utility;

class ExtractJsonTranslationFromXML
{
    /**
     * Extracts relevant translations from translation XML
     *
     * @param SimpleXML $xml Translation in XML format
     *
     * @return string
     */
    public static function extractJsonFromXML($xml)
    {
        $entriesWithJsonAttr = $xml->xpath("//trans-unit[@json]");

        $jsonString = "{\n";
        foreach ($entriesWithJsonAttr as $entry => $data) {
            if ($entry != 0) {
                $jsonString .= ",\n";
            }
            $attributes = $data->attributes();

            $jsonId = $attributes['json'];
            $source = $data->xpath('source');
            $target = $data->xpath('target');

            $jsonString .= '    "' . $jsonId . '": "' . (count($target) == 1 ? $target{0} : $source{0}) . '"';
        }

        $jsonString .= "\n}";

        return $jsonString;
    }
}