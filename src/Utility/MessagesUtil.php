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

namespace SimpleSkeletonCMS\Utility;

/**
 * Class MessagesUtil
 * @package SimpleSkeletonCMS\Utility
 */
class MessagesUtil
{
    public const MSG_NO_ACCESS_ALLOWED         = 'Il nome utente o la password che hai inserito non sono corretti';
    public const MSG_NOT_FOUND                 = 'La pagina cercata non è disponibile';
    public const MSG_METHOD_NOT_ALLOWED        = 'Method Not Allowed';
    public const MSG_FORBIDDEN                 = 'Errore 403: Accesso negato';
    public const MSG_SUCCESSFULLY              = 'Operazione Effettuata con successo';
    public const MSG_ERROR_UPLOAD_MAX_FILESIZE = 'Il file caricato è troppo grande';
    public const MSG_SEND_MAIL                 = 'Grazie per averci contattato, Vi risponderemo nel più breve tempo possibile.';
}
