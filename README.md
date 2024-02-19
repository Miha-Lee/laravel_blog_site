This is the Blog Site using the backend system of Laravel. Users can register, login and logout their own account and post their favorite blogs over here. Every user can share blogs in public. 

The steps to launch the project.

1. We have to create .env file in the root folder.
2. Copy all of the variables from the .env.example into .env file.
3. Run the command in the terminal, composer i.
4. After that, run php artisan migrate, it will appear such words, The SQLite database does not exist:_______Would you like to create it? (yes/no) [no], please press yes, then it will initialize our database.sqlite.
5. Because this project was using sqlite.
6. Finally run php artisan serve, it will launch the project successfully.
