<?php
    namespace classes;

    class Order {
        public function readFile() {
            $filePath = __DIR__ . "/../orders.csv";

            $file = file($filePath);

            $fileHeader = explode(',', $file[0]);
            $fileHeadersCount = count($fileHeader);

            $fileHeader[$fileHeadersCount - 1] = trim($fileHeader[$fileHeadersCount - 1]);
            

            for ($i = 1; $i < count($file); $i++) {
                $dados = explode(',', $file[$i]);
                $result[] = array_combine($fileHeader, $dados);
            }

            return $result;
        }
    }
?>