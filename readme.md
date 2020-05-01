## О блоге
Блог на основе Laravel, с основными функциями. 
## Install (Установка)
Перед установкой необходимо создать базу данных.
В файле .env установть данные для входа в базу.<br />

composer install<br />
npm install<br />
cp .env.example .env<br />
php artisan key:generate<br /><br />

##Ставим права

  sudo chown -R www-data:www-data storage/logs storage/framework/views storage/app/public storage/framework/sessions storage/framework/cache storage/framework/views<br />
  php artisan storage:link<br />
##Ставим БД
php artisan migrate<br />
После выполнения всех процедур, уже на запущенном сайте, пройти регистрацию
и вручную в базе данных поправить данные в таблице(user/isAdmin) на 1, для
доступа в Административную панель.
