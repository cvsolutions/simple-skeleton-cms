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

namespace SimpleSkeletonCMS\Controller\Console;

use Symfony\Component\Console\Output\OutputInterface;

/**
 * Class InstallationController
 * @package SimpleSkeletonCMS\Controller\Console
 */
class InstallationController
{
    public function __invoke(OutputInterface $output)
    {
        return $output->writeln('...');
    }
}
