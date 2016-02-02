<?php
namespace ITplusX\XlifToJson\Utility;

class ExtractJsonTranslationFromXML
{
    /**
     * Extracts relevant translations from translation XML
     *
     * @param SimpleXML $xml Translation in XML format
     * @param string $attr Name of the attribute indicating it's relevance
     *
     * @return string
     */
    public static function extractJsonFromXML($xml, $attr)
    {
        $entriesWithJsonAttr = $xml->xpath("//trans-unit[@" . $attr . "]");

        $json = [];
        foreach ($entriesWithJsonAttr as $entry => $data) {
            $attributes = $data->attributes();

            $jsonId = $attributes[$attr];
            $source = $data->xpath('source');
            $target = $data->xpath('target');

            $json[(string)$jsonId] = count($target) == 1 ? (string)$target{0} : (string)$source{0};
        }

        return json_encode($json);
    }
}