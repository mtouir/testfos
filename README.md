Please follow this steps:


1- Install GIT for Desktop (if it is not installed yet).

2- Go under C:\wamp64\www.

3- Open the CMD.

4- Execute the command: git clone https://github.com/mtouir/testfos.git (make sure you don't have a folder named testfos in the same location).


Now you have downloaded the startup project.

5- Download this template https://1drv.ms/u/s!AnSI08Z0h8-BgcdNmOI70YbaDzqcJw and unzip it under c:\wamp64\www\testfos\web.

6- Open the projet in PHPStorm.

7- Set up Composer command line tools (project).

8- Copy your old parameters.yml to the folder app\config.

9- Run the command: composer update.

10- Set up Symfony command line tools (project).

11- Check the database name in parameters.yml

    If a database error occurs, create a new database using doctrine:database:create then doctrine:schema:create.

12- Enjoy working on your project :)

