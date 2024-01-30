<?php
    namespace classes;

use function PHPSTORM_META\type;

    class MyClass {
        public function readFile($fileName) {
            $filePath = __DIR__ . "/../$fileName.csv";

            $file = file($filePath);

            $fileHeader = explode(',', $file[0]);
            $fileHeadersCount = count($fileHeader);

            $fileHeader[$fileHeadersCount - 1] = trim($fileHeader[$fileHeadersCount - 1]);
            

            for ($i = 1; $i < count($file); $i++) {
                $dados = explode(',', $file[$i]);
                $result[$dados[0]] = array_combine($fileHeader, $dados);
            }

            return $result;
        }
    }
?>