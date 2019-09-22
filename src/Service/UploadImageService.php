<?php
/**
 * This file is part of the Simple Skeleton CMS package.
 *
 * (c) Concetto Vecchio <info@cvsolutions.it>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types=1);

namespace SimpleSkeletonCMS\Service;

use Exception;
use Intervention\Image\Constraint;
use Intervention\Image\ImageManagerStatic as Image;
use SimpleSkeletonCMS\Utility\MessagesUtil;
use Symfony\Component\HttpFoundation\File\UploadedFile;

/**
 * Class UploadImageService
 * @package SimpleSkeletonCMS\Service
 */
class UploadImageService
{
    /** @var int */
    public const IMAGE_UPLOAD_WIDTH = 1280;

    /** @var int */
    public const IMAGE_UPLOAD_HEIGHT = 1024;

    /** @var int */
    public const IMAGE_UPLOAD_QUALITY = 95;

    /** @var string (imagick / gd) */
    public const IMAGE_UPLOAD_DRIVER = 'gd';

    /** @var string uploaded folder */
    public const IMAGE_UPLOAD_PATH = __DIR__ . '/../../uploaded/';

    /** @var int (3MB) */
    public const UPLOAD_MAX_FILESIZE = 3145728;

    /**
     * @param UploadedFile|null $file
     * @param string $name
     * @return string
     * @throws Exception
     */
    public function save(?UploadedFile $file, string $name): string
    {
        if (!$file instanceof UploadedFile) {
            return $name;
        }
        if ($file->getSize() >= self::UPLOAD_MAX_FILESIZE) {
            throw new Exception(MessagesUtil::MSG_ERROR_UPLOAD_MAX_FILESIZE);
        }
        if ($file->getClientOriginalName()) {
            $ext      = pathinfo($file->getClientOriginalName(), PATHINFO_EXTENSION);
            $filename = sprintf('%s.%s', md5(uniqid()), strtolower($ext));
            if ($name) {
                @unlink(self::IMAGE_UPLOAD_PATH . $name);
            }
            Image::configure(['driver' => self::IMAGE_UPLOAD_DRIVER]);
            $img = Image::make($file);
            $img->resize(self::IMAGE_UPLOAD_WIDTH, self::IMAGE_UPLOAD_HEIGHT, function (Constraint $constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });
            $img->save(self::IMAGE_UPLOAD_PATH . $filename, self::IMAGE_UPLOAD_QUALITY);
            $image = $filename;
        } else {
            $image = $name;
        }
        return $image;
    }
}
