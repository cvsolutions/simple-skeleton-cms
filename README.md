![Simple Skeleton CMS](https://www.cvsolutions.it/assets/simple-skeleton-cms.png)

Is an open source content management system.

- SEO Friendly URLs
- Modular and extensible
- Native multilingual

## Requirements

  * PHP 7.1 or higher
  * PDO - INTL - DOM - OpenSSL
  * MySQL / SQLite / PostgreSQL
  * Apache web server

## PHP packages

- [PHP-DI](https://github.com/PHP-DI/PHP-DI)
- [FastRoute](https://github.com/nikic/FastRoute)
- [Plates](https://github.com/thephpleague/plates)
- [HttpFoundation](https://github.com/symfony/http-foundation)
- [zend-config](https://github.com/zendframework/zend-config)
- [php-gettext](https://github.com/smmoosavi/php-gettext)
- [PHP dotenv](https://github.com/vlucas/phpdotenv)
- [Intervention Image](https://github.com/Intervention/image)
- [PHP-Auth](https://github.com/delight-im/PHP-Auth)
- [Silly CLI micro-framework](https://github.com/mnapoli/silly)
- [Carbon](https://github.com/briannesbitt/carbon)
- [Faker](https://github.com/fzaninotto/Faker)
- [Pagerfanta](https://github.com/whiteoctober/Pagerfanta)
- [PHPMailer](https://github.com/PHPMailer/PHPMailer)
- [Easy Validation](https://github.com/vlucas/valitron)
- [EasyCSRF](https://github.com/gilbitron/EasyCSRF)

## Docker

```shell script
  docker-compose up -d
  docker-compose exec web bash
  docker kill $(docker ps -q) && docker rm $(docker ps -a -q)
```
## License
The Simple Skeleton CMS is open-source software licensed under the [MIT license](https://opensource.org/licenses/MIT).
