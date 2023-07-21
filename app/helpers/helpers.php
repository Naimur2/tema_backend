<?php
if (!function_exists('getStringBetweenTwoStrings')) {
    function getStringBetweenTwoStrings($str, $starting_word, $ending_word)
    {
        $subtring_start = strpos($str, $starting_word);
        //Adding the starting index of the starting word to
        //its length would give its ending index
        $subtring_start += strlen($starting_word); 
        //Length of our required sub string
        $size = strpos($str, $ending_word, $subtring_start) - $subtring_start; 
        // Return the substring from the index substring_start of length size
        return substr($str, $subtring_start, $size); 
    }
}

if (!function_exists('getDataFromDataPickingGuide')) {
    function getDataFromDataPickingGuide($dataPickingGuide, $message, $shouldDoIntConversion = false)
    {
        $lineDividedMsg = explode("\r\n", $message->MsgText);
        $arrayValue = [];
        $arrayValue['TimeStamp'] = $message->DT;
        foreach ($dataPickingGuide as $column) {
            $arrayValue[$column->name] = "";
            if ($shouldDoIntConversion) {
                $column->startingLineNumber = ((int)$column->startingLineNumber) - 1;
                $column->endingLineNumber = ((int)$column->endingLineNumber) - 1;
                $column->startPickingFrom = (int)$column->startPickingFrom;
                $column->endPickingAt = (int)$column->endPickingAt;
            }
            
            if ($column->isMultiLine === 'true' || $column->isMultiLine === true) {
                //Multiline field
                $numberToCheck = $column->endingLineNumber < count($lineDividedMsg) ? $column->endingLineNumber : count($lineDividedMsg) - 1;
                $column->startingLineNumber = $column->startingLineNumber < 0 ? 0 : $column->startingLineNumber;
                $column->startingLineNumber = $column->startingLineNumber > count($lineDividedMsg) - 1 ? count($lineDividedMsg) - 1 : $column->startingLineNumber;
                for ($j = $column->startingLineNumber; $j <= $numberToCheck; $j++) {
                    $arrayValue[$column->name] .= $lineDividedMsg[$j] . PHP_EOL;
                }
            } else {
                //Single line field
                if($column->startingLineNumber < 0 || $column->startingLineNumber >= count($lineDividedMsg)){
                    $arrayValue[$column->name] = ''; 
                }else{
                    $arrayValue[$column->name] = $lineDividedMsg[$column->startingLineNumber];
                }
            }


            // verify this logic
            if ($column->pickMethod === '0' || $column->pickMethod === 0) {
                //Pick Between Two Words
                if($column->pickAfterWord){
                    $arrayValue[$column->name] = getStringBetweenTwoStrings($arrayValue[$column->name], $column->pickAfterWord, $column->pickUntilWord);
                }
            } else {
                //Pick Between Character Range
                if($column->startPickingFrom){
                    $arrayValue[$column->name] = substr($arrayValue[$column->name], $column->startPickingFrom - 1, $column->endPickingAt - $column->startPickingFrom);
                }
            }

            //Pick Except
            if ($column->pickExcept) {
                //Explode pick Except and remove every character
                $individualWords = explode(" ", $column->pickExcept);
                foreach($individualWords as $word){
                    $arrayValue[$column->name] = str_replace($word, '', $arrayValue[$column->name]);
                }
            }
            $arrayValue[$column->name] = trim($arrayValue[$column->name]);
        }
        return $arrayValue;
    }
}


