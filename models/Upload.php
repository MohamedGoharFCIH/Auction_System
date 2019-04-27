<?php


class Upload {

    private $allowedexts;
    private $file;
    private $maxsize;
    private $uploaddir;
    private $fileurl;

    function __construct($file, $allowedexts, $maxsize, $uploaddir) {
        if (is_array($allowedexts) && is_int($maxsize)) {
            $this->allowedexts = $allowedexts;
            $this->maxsize = $maxsize;
            $this->file = $file;
            $this->uploaddir = $uploaddir;
        } else {
            throw new Exception("allowedexts must be array and maxsize must be integer value");
        }
    }

    function uploadfile() {

        $file = $this->file;
        $allowedexts = $this->allowedexts;
        $maxsize = $this->maxsize;
        $uploaddir = $this->uploaddir;
        $errors = array();
        $filename = $file['name'];
        @$fileext = strtolower(end(explode('.', $filename)));
        $filesize = $file['size'];
        $filetmpname = $file['tmp_name'];

        if (in_array($fileext, $allowedexts) === FALSE) {
            $errors [] = 'Extension in not allowed';
        }
        if ($filesize > $maxsize) {
            $errors[] = 'File Size must be in {$maxsize} KB';
        }
        if (empty($errors)) {
            $randnum = rand(0, 9999);
            $this->fileurl = $randnum . "_" . date("d-m-y") . "_" . $filename;
            $destination = $uploaddir . $randnum . "_" . date("d-m-y") . "_" . $filename;
            move_uploaded_file($filetmpname, $destination);
        } else {
            foreach ($errors as $error) {

                echo $error . "<br>";
            }
        }
    }

    function getfileurl() {
        return $this->fileurl;
    }

}
