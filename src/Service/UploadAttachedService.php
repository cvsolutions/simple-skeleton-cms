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
use SimpleSkeletonCMS\Utility\MessagesUtil;
use Symfony\Component\HttpFoundation\File\UploadedFile;

/**
 * Class UploadAttachedService
 * @package SimpleSkeletonCMS\Service
 */
class UploadAttachedService
{
    /** @var string uploaded folder */
    public const ATTACHED_UPLOAD_PATH = __DIR__ . '/../../uploaded/';

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
                @unlink(self::ATTACHED_UPLOAD_PATH . $name);
            }
            $file->move(self::ATTACHED_UPLOAD_PATH, $filename);
            $attached = $filename;
        } else {
            $attached = $name;
        }
        return $attached;
    }
}
