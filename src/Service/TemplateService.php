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

use League\Plates\Engine;
use SimpleSkeletonCMS\Interfaces\TemplateServiceInterface;

/**
 * Class TemplateService
 * @package SimpleSkeletonCMS\Servicel
 */
class TemplateService implements TemplateServiceInterface
{
    /**
     * @var Engine
     */
    protected $engine;

    /**
     * TemplateService constructor.
     * @param Engine $engine
     */
    public function __construct(Engine $engine)
    {
        $this->engine = $engine;
    }

    /**
     * @inheritDoc
     */
    public function render(string $name, array $data = []): string
    {
        return $this->engine->render($name, $data);
    }
}
