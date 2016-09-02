<?php
$container->setParameter('database.host', getenv('SYMFONY__DATABASE__HOST'));
$container->setParameter('database.port', getenv('SYMFONY__DATABASE__PORT'));
$container->setParameter('database.name', getenv('SYMFONY__DATABASE__NAME'));
$container->setParameter('database.user', getenv('SYMFONY__DATABASE__USER'));
$container->setParameter('database.password', getenv('SYMFONY__DATABASE__PASSWORD'));
