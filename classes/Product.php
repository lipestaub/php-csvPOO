<?php
    namespace classes;

    class Product {
        public function readFile() {
            $filePath = __DIR__ . "/../products.csv";

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