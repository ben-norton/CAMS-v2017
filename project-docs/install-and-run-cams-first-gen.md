# How to Install and Run CAMS First Generation
$ indicates is a console window prompt

## AWS S3
1. CAMS stores uploaded files in the Amazon Cloud using Simple Storage (S3)
2. In order to upload files, you'll need to setup an AWS account and then a user for accessing S3 service.
3. To setup Laravel, you will need the access key, secret key, bucket name, and region (see configure .env)
4. 
## NPM
1. Install NVM. See the following guide: https://www.freecodecamp.org/news/node-version-manager-nvm-install-guide/
2. Run the following commands:
```
$ nvm install 22.11.0
$ nvm use 22.11.0
$ npm install
$ npm run dev
```

## Install and Using PHP 7.4 and Composer
### PHP 7.4
This setup assumes you already have a default version of PHP installed on your system. The latest stable version is 8.3 at this time this document was written.
1. Download and extract PHP 7.4 to a directory. Example: D:\webserver\php74
2. Open the PHP 7.4 directory (D:\webserver\php74). Rename php.exe to php74.exe
3. Add the path to the PHP 7.4 directory to your path environment variable
	Win Key > Begin typing Edit environment variables for your account
	Select Edit environment variables for your account
	Click Environment Variables.. button in lower right
	Find Path under System Variables
	Click Edit
	Add path to PHP 7.4 (Example: D:\webserver\php74)
	Restart Windows
4. After restart, open a command line window and type php74 -v to verify a successful installation.

### Composer
1. Download and install Composer
2. Select the default version of PHP during the installation
3. After installation is complete, go to the directory where the composer executable is installed, which is most likely C:\ProgramData\ComposerSetup\bin
4. Make a copy of the composer.bat file and rename it composer74.bat
5. Open composer74.bat in notepad or a text editor
6. Change the fourth line from php "%~dp0composer.phar" %* to php74 "%~dp0composer.phar" %*
7. Your new composer74.bat should look like the following:
@echo OFF
:: in case DelayedExpansion is on and a path contains !
setlocal DISABLEDELAYEDEXPANSION
php74 "%~dp0composer.phar" %*
8. Open a command line window
9. Type composer74 about
10. You should see something like the following
Composer - Dependency Manager for PHP - version 2.7.7
Composer is a dependency manager tracking local dependencies of your projects and libraries.
See https://getcomposer.org/ for more information.

### Update composer.json
1. Open composer.json
2. Under the scripts object, replace all php with php74. The resulting object should resemble the following:
```
"scripts": {
	"post-root-package-install": [
		"php74 -r \"file_exists('.env') || copy('.env.example', '.env');\""
	],
	"post-create-project-cmd": [
		"php74 artisan key:generate"
	],
	"post-install-cmd": [
		"Illuminate\\Foundation\\ComposerScripts::postInstall",
		"php74 artisan cache:clear",
		"php74 artisan config:cache",
		"composer dump-autoload"
	],
	"post-update-cmd": [
		"Illuminate\\Foundation\\ComposerScripts::postUpdate"
	]
},
```
All command line operations in CAMS must use either php74 or composer74. This includes all artisan commands and package installations.
Examples:
To install the spatie permission package, run the following command:
composer74 require spatie/laravel-permission
 
To clear config cache using artisan, run the following command:
php74 artisan config:cache

## Install Packages and Setup Laravel
1. Run the following commands from the command line (see above for versions)
```
$ composer74 install
$ php74 artisan key:generate
$ php74 artisan vendor:publish
```
3. Publish all (hit 0)
4. Create and edit .env
5. Set database name, host, username, password, and port number
6. Set AWS bucket, access key, secret key. and region
7. Go to next section (NPM)
### NPM
```
$ npm install -g bower
$ npm install
$ npm run dev
```
8. Go to next section (Migrations)
### Migrations
9Run the following command to create the CAMS database from the root directory
```
$ php74 artisan migrate
```
10. Seed database with quick start data and basic authentication. Make sure to run the seeders in the specified order.
```
$ php74 artisan db:seed
$ php74 artisan db:seed --class=Database\Seeders\ParameterKeysTableSeeder
$ php74 artisan db:seed --class=Database\Seeders\AssetTypesTableSeeder
```
11. Install bower packages
```
$ bower install
```