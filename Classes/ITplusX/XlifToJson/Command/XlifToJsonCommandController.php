<?php
namespace ITplusX\XlifToJson\Command;

/*
 * This file is part of the ITplusX.XlifToJson package.
 */

use TYPO3\Flow\Annotations as Flow;
use ITplusX\XlifToJson\Utility\XlifToXML;
use ITplusX\XlifToJson\Utility\ExtractJsonTranslationFromXML;

/**
 * @Flow\Scope("singleton")
 */
class XlifToJsonCommandController extends \TYPO3\Flow\Cli\CommandController
{
    /**
     * Command to parse .xlf translations to a .json file
     *
     * @param string $pathToInputXlf   Path to the .xlf file
     * @param string $pathToOutputJson Path to the .json file
     * @param string $attribute Name of the attribute indicating it's relevance
     *
     * @return void
     */
    public function exampleCommand($pathToInputXlf, $pathToOutputJson, $attribute)
    {
        $xlif = file_get_contents($pathToInputXlf);
        $jsonTranslation = ExtractJsonTranslationFromXML::extractJsonFromXML(XlifToXML::encodeToXML($xlif), $attribute);

        file_put_contents($pathToOutputJson, $jsonTranslation);
    }
}
