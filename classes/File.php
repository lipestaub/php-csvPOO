<?php
    namespace classes;

    class File {
        public function readFile($fileName) {
            $filePath = __DIR__ . "/../$fileName.csv";

            $file = file($filePath);

            $fileHeader = explode(',', trim($file[0]));

            for ($i = 1; $i < count($file); $i++) {
                $data = explode(',', trim($file[$i]));
                $result[] = array_combine($fileHeader, $data);
            }

            return $result;
        }

        public function createReportFile($report) {
            $filePath = __DIR__ . "/../report.csv";
            $openedFile = fopen($filePath, 'w');
            fputcsv($openedFile, ['product_id', 'unit_price', 'date', 'quantity', 'total']);
            foreach ($report as $product) {
                fputcsv($openedFile, $product);
            }
            unset($openedFile);
        }
    }
?>