<?php

namespace PrevioTest\Services;

class FileManager
{
    /**
     * @param $filePath
     * @return array
     * @throws \Exception
     */
    public function readFile($filePath): array
    {
        $fileContents = file_get_contents($filePath);

        if (!$fileContents) {
            throw new \Exception("Couldn't get file contents: " . $filePath);
        }

        $data = json_decode($fileContents, true);

        if ($data === null) {
            throw new \Exception("Malformed JSON: " . $filePath);
        }

        return $data;
    }

    /**
     * @param $filePath
     * @param $content
     * @return void
     * @throws \Exception
     */
    public function writeFile($filePath, $content): void
    {
        $success = file_put_contents($filePath, $content);

        if (!$success) {
            throw new \Exception("Couldn't write file contents: " . $filePath);
        }
    }
}