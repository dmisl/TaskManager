<?php

function say($message) {
    echo "\033[2J\033[H";
    echo $message." it might take a while";
    echo "\n";
}

$process = 10;

say("- Progress [0/{$process}]");
file_put_contents("download_composer.php", "<?php copy('https://getcomposer.org/installer', 'composer-setup.php');?>");

say("- Progress [1/{$process}]");
system("php download_composer.php");
unlink("download_composer.php");

say("- Progress [2/{$process}]");
file_put_contents("composer-setup.php", str_replace('$this->disableTls'." ? 'http' : 'https'", "'http'", file_get_contents("composer-setup.php")));
system('php composer-setup.php');
unlink("composer-setup.php");

say("- Progress [3/{$process}]");
system('php composer.phar install');
unlink("composer.phar");

say("- Progress [4/{$process}]");
$env_content = 'APP_NAME=Dynamitowy
APP_ENV=local
APP_KEY=
APP_DEBUG=true
APP_URL=http://localhost

LOG_CHANNEL=stack
LOG_DEPRECATIONS_CHANNEL=null
LOG_LEVEL=debug

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=task_manager
DB_USERNAME=root
DB_PASSWORD=

BROADCAST_DRIVER=reverb
CACHE_DRIVER=file
FILESYSTEM_DISK=local
QUEUE_CONNECTION=sync
SESSION_DRIVER=file
SESSION_LIFETIME=120

MEMCACHED_HOST=127.0.0.1

REDIS_HOST=127.0.0.1
REDIS_PASSWORD=null
REDIS_PORT=6379

MAIL_MAILER=smtp
MAIL_HOST=mailhog
MAIL_PORT=1025
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS="hello@example.com"
MAIL_FROM_NAME="${APP_NAME}"

AWS_ACCESS_KEY_ID=
AWS_SECRET_ACCESS_KEY=
AWS_DEFAULT_REGION=us-east-1
AWS_BUCKET=
AWS_USE_PATH_STYLE_ENDPOINT=false

PUSHER_APP_ID=
PUSHER_APP_KEY=
PUSHER_APP_SECRET=
PUSHER_APP_CLUSTER=mt1

MIX_PUSHER_APP_KEY="${PUSHER_APP_KEY}"
MIX_PUSHER_APP_CLUSTER="${PUSHER_APP_CLUSTER}"

REVERB_APP_ID=590252
REVERB_APP_KEY=vubkg9ccrgssnkjt7w6d
REVERB_APP_SECRET=yimosrpuruwi2qkfzgy4
REVERB_HOST="localhost"
REVERB_PORT=8080
REVERB_SCHEME=http

VITE_REVERB_APP_KEY="${REVERB_APP_KEY}"
VITE_REVERB_HOST="${REVERB_HOST}"
VITE_REVERB_PORT="${REVERB_PORT}"
VITE_REVERB_SCHEME="${REVERB_SCHEME}"
';

file_put_contents(".env", $env_content);

say("- Progress [5/{$process}]");

system("php artisan key:generate");

say("- Progress [6/{$process}]");

system("php artisan config:cache");

say("- Progress [7/{$process}]");

$host = '127.0.0.1';
$user = 'root';
$password = '';

try {
    $conn = new mysqli($host, $user, $password);

    if (!$conn->connect_error) {
        $conn = new PDO("mysql:host=localhost;", 'root', '');
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $query = "SELECT SCHEMA_NAME FROM INFORMATION_SCHEMA.SCHEMATA WHERE SCHEMA_NAME = ?";
        $stmt = $conn->prepare($query);
        $stmt->execute(["dynamitowy"]);

        $result = $stmt->fetch();

        if ($result) {
            system("php artisan migrate:refresh --seed");
        } else {
            system("php artisan migrate --seed");
        }
    }
} catch (mysqli_sql_exception $e) {
} catch (Exception $e) {
}

say("- Progress [8/{$process}]");

system("npm install");

say("- Progress [9/{$process}]");

system("php artisan storage:link");

say("- Progress [10/{$process}]");

popen("start cmd /c \"npm run dev\"", "w");
popen("start cmd /c \"php artisan serve\"", "w");

echo("\033[2J\033[H");

echo("Ready to go! \n");

echo "Use this link to open application \n";

echo "http://127.0.0.1:8000";

?>