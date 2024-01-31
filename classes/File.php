<?php
    class File {
        public function readFile(string $fileName) : array {
            $filePath = __DIR__ . "/../$fileName.csv";

            $file = file($filePath);

            $fileHeader = explode(',', trim($file[0]));

            for ($i = 1; $i < count($file); $i++) {
                $data = explode(',', str_replace('"', '', trim($file[$i])));
                $result[] = array_combine($fileHeader, $data);
            }

            return $result;
        }

        public function createReportFile(array $products) : void {
            $filePath = __DIR__ . "/../report.csv";
            $openedFile = fopen($filePath, 'w');

            fputcsv($openedFile, ['product_id', 'unit_price', 'date', 'quantity', 'total']);

            foreach ($products as $product) {
                fputcsv($openedFile, [
                    $product->getProductId(),
                    $product->getUnitPrice(),
                    $product->getDate(),
                    $product->getQuantity(),
                    $product->getTotal(),
                ]);
            }

            unset($openedFile);
        }
    }
?>