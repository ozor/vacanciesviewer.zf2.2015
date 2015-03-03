# vacanciesviewer.zf2.2015
My testwork of 2015

# Задание #

Реализовать интерфейс просмотра списка вакансий компании с возможностью фильтра по отделам и языку. Каждая вакансия определена следующими свойствами: отдел, название вакансии и ее описание. Отдел является отдельным объектом, представлен идентификатором и названием. При этом название вакансии и её описание могут быть переведены на несколько языков (ru, fr, it, ...).

Интерфейс должен содержать фильтр по отделу и языку, а также список подходящих вакансий. Если нет перевода на выбранный язык, то вакансия отображается на языке по умолчанию (en).

### Пожелания к коду ###
- Zend Framework 2
- Doctrine 2
- CRUD
- Соответсвие кода Zend Coding Style
- Выполнение без использования шаблонизаторов
- Наличие валидных докблоков с комментариями на англ. яз
- Более одного коммита в истории гита
- Покрытие unit тестами

### Технические требования: ###
- Стек технологий: MySQL, PHP 5.4+, HTML, JS, GIT
- Рабочее приложение
- Readme по установке
- Набор тестовых данных (дамп, фикстуры и т.п.)
- Отсутствие ошибок (display_errors  = 1 , error_reporting =-1)

# Установка #
- Развернуть репозиторий на локальной машине
```
git clone https://github.com/ozor/vacanciesviewer.zf2.2015.git
```

- Установить зависимости
```
cd vacanciesviewer.zf2.2015
php composer.phar install
```

- Настроить локальный сайт

  Для настройки  Doctrine2 создать файл vacanciesviewer.zf2.2015/config/autoload/doctrine.local.php с настройками:
```
<?php
return array(
	'doctrine' => array(
		'connection' => array(
			'orm_default' => array(
				'driverClass' =>'Doctrine\DBAL\Driver\PDOMySql\Driver',
				'params' => array(
					'host'     => 'localhost',
					'port'     => '3306',
					'user'     => 'root',
					'password' => '',
					'dbname'   => 'zf2vacancies',
				)
			)
		)
	)
);
```
В конфигурацию выше вписать свои настройки подключения к БД

  Для настройки Zend Developer Tools надо скопировать конфиг:
```
cp vendor/zendframework/zend-developer-tools/config/zenddevelopertools.local.php.dist config/autoload/zdt.local.php
```
  
  Внести свои настройки подключения к БД так же надо в файл vacanciesviewer.zf2.2015\vendor\bjyoungblood\BjyProfiler\config\module.config.php
- Внести демо данные в БД из файла 
```
vacanciesviewer.zf2.2015/data/SQL/zf2vacancies.sql
```


### Выполнение тестов ###

```
cd /path/to/server/vacanciesviewer.zf2.2015/module/Vacancies/src/Vacancies/test 
php /path/to/server/vacanciesviewer.zf2.2015/vendor/phpunit/phpunit/phpunit.php
```

- - - - 

> По вопросам по выполнению кода обращайтесь на ozor [at] yandex.ru
