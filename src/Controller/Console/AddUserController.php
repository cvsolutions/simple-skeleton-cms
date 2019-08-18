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

use Delight\Auth\Auth;
use Delight\Auth\AuthError;
use Delight\Auth\InvalidEmailException;
use Delight\Auth\InvalidPasswordException;
use Delight\Auth\UserAlreadyExistsException;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

/**
 * Class AddUserController
 * @package SimpleSkeletonCMS\Controller\Console
 */
class AddUserController
{
    /**
     * @var Auth
     */
    protected $auth;

    /**
     * AddUserController constructor.
     * @param Auth $auth
     */
    public function __construct(Auth $auth)
    {
        $this->auth = $auth;
    }

    public function __invoke(InputInterface $input, OutputInterface $output)
    {
        $symfonyStyle = new SymfonyStyle($input, $output);
        $symfonyStyle->title('Registrazione nuovo utente');

        $email    = $symfonyStyle->ask('Indirizzo e-mail');
        $pwd      = $symfonyStyle->askHidden('Password');
        $username = $symfonyStyle->ask('Nome utente');
        $confirm  = $symfonyStyle->confirm('Sei sicuro di voler procedere');

        try {
            if ($confirm) {
                $this->auth->admin()->createUser($email, $pwd, $username);
            }
        } catch (InvalidEmailException $e) {
            return $output->writeln('<error>Invalid email address</error>');
        } catch (InvalidPasswordException $e) {
            return $output->writeln('<error>Invalid password</error>');
        } catch (UserAlreadyExistsException $e) {
            return $output->writeln('<error>User already exists</error>');
        } catch (AuthError $e) {
            return $output->writeln(sprintf('<error>%s</error>', $e->getMessage()));
        }
        return $output->writeln('<info>OK</info>');
    }
}
