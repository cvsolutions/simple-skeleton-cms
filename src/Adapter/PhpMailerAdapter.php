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

namespace SimpleSkeletonCMS\Adapter;

use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;
use SimpleSkeletonCMS\Interfaces\MailAdapterInterface;

/**
 * Class PhpMailerAdapter
 * @package SimpleSkeletonCMS\Adapter
 */
class PhpMailerAdapter extends PHPMailer implements MailAdapterInterface
{
    /**
     * @param array $data
     * @return bool
     * @throws Exception
     */
    public function process(array $data): bool
    {
        $this->isSMTP();
        $this->SMTPDebug  = 0;
        $this->AuthType   = 'CRAM-MD5';
        $this->Host       = getenv('MAIL_HOST');
        $this->Port       = getenv('MAIL_PORT');
        $this->SMTPSecure = 'tls';
        $this->SMTPAuth   = true;
        $this->Username   = getenv('MAIL_USERNAME');
        $this->Password   = getenv('MAIL_PASSWORD');
        $this->setFrom(getenv('MAIL_FROM_ADDRESS'), getenv('MAIL_FROM_NAME'));
        $this->addAddress($data['address'], $data['fullname']);
        $this->Subject = $data['subject'];
        $this->msgHTML($data['template']);
        $this->AltBody = 'This is a plain-text message body';
        return $this->send();
    }
}
