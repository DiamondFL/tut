<?php
/**
 * Created by PhpStorm.
 * User: Fight Light Diamond
 * Date: 7/25/2016
 * Time: 10:12 PM
 */

namespace Istruct\Facades;

use App\Events\LogUploadEvent;
use Intervention\Image\Facades\Image;

class UploadFun
{
    private $fileName = null;
    private $basePath = null;
    private $pathUploaded = null;

    public function file($input, $basePath)
    {
        $this->basePath = $basePath;
        $originalName = $input->getClientOriginalName();
        $this->fileName = FormatFa::formatNameFile($originalName);
        $input->move($basePath, $this->fileName);
        $this->pathUploaded = $basePath . '/' . $this->fileName;
        chmod($this->pathUploaded, 0777);
        $path = str_replace(config('filesystems.disks.public.root'), "", $this->pathUploaded);
        event(new LogUploadEvent($path, "FILE"));
        return $path;
    }

    public function images($input, $basePath, $thumbImage)
    {
        $path = $this->file($input, $basePath);
        $this->saveThumbs($thumbImage);
        return $path;
    }

    private function saveThumbs($thumbImage)
    {
        foreach ($thumbImage as $sizes) {
            foreach ($sizes as $size) {
                $this->savingThumb($size);
            }
        }
    }

    private function savingThumb($size)
    {
        $thumbPath = $this->getThumbPath($size);
        Image::make($this->pathUploaded)->resize($size[0], $size[1])->save($thumbPath);
        chmod($thumbPath, 0777);
        event(new LogUploadEvent($thumbPath, 'THUMB', 0777));
    }

    private function getThumbPath($size)
    {
        $sizeImage = '_' . implode('_', $size) . '.';
        $imageName = str_replace('.', $sizeImage, $this->fileName);
        return $this->basePath . '/' . $imageName;
    }
}