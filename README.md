# XlifToJson

## Description

### Parse .xlif translation file to a .json file.

Only tagged translations will be transfered into the .json.
The tag is an attribute in the <trans-unit> element. **It's value is used as the source value in the resulting .json**

To have a translation transfered to json the trans-unit element has to look like:
```
<trans-unit [...] [attribute-name]="Json source name">
	<source>xlif source name</source>
	<target>xlif target name</target>
</trans-unit>
```
The above example is converted to json like this:
```
{
	"Json source name": "xlif target name"
}
```

**If in xlif the element ```<target>``` is not available the content of ```<source>``` is used instead.​**

---

## Usage

+ Navigate to the project directory where flow is installed.
+ Use the following command with the parameters described below:
```
./flow xliftojson:parseXLF --pathToInputXlf "[/INPUT/PATH/TO].xlf" --pathToOutputJson "[/OUTPUT/PATH/TO].json" --attribute "[ATTRIBUTE-NAME]"
```
+ Description of the parameters:
  - This is the call of the command controller:
  ```./flow xliftojson:parseXLF```
  - This parameter is the absolute path to the .xlf (input) file:
  ``` --pathToInputXlf "[/INPUT/PATH/TO].xlf"```
  - This parameter is the absolute path to the .json (output) file:
  ```--pathToOutputJson "[/OUTPUT/PATH/TO].json"```
  _Easiest way to get the absolute path is to navigate to the file in the bash and type ```pwd```._
  - This is the attribute-name marking the trans-unit to be transfered _(most likely something like 'jsonTranslate'):_
  ```--attribute "[ATTRIBUTE-NAME]"```

+ _Alternative: If used without the parameters (just: ```./flow xliftojson:parseXLF```) you will be asked for the parameters one after another._