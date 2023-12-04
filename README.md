# Database Management - Fully Functional
The purpose of this project is to manage the database of employees/clients using SQL and PHP.<br>
This is an evaluated version of the first project, featuring a cleaner user interface and more complex functions.<br>
The tools I used are XAMPP and VSCode. <br>
Here is the detailed explanation of this project:<br>
1 The index page consists of five fields that utilize filtered user input to prevent SQL injections and save the information to the provided database.<br>
![1](https://github.com/mynameiskidd/Database_Managment/assets/109050609/896217d0-d865-4825-82ed-a6d5ffe4a7b6)
The "View Records" button directs the user to the database management page.<br>
2 The database management page comprises several PHP files that employ different functions such as DELETE, UPDATE, and SEARCH. <br>
![2](https://github.com/mynameiskidd/Database_Managment/assets/109050609/dc41bedc-0ca2-4f8c-87f7-4b50cc266459)
The idea behind this page is to grant the user authorization to edit data and view its results.<br>

<hr>

Here are the steps to deploy this project:
<pre>
1. Install XAMPP version 3.3.0.
2. During installation, select only the necessary modules, with the exception of PHP, choose mySQL as the additional module.
3. Clone this project to the "C:\xampp\htdocs\website" folder.
4. Launch XAMPP and in the "Actions" section, click on "START" for both the APACHE and MYSQL modules.
5. The default ports for MYSQL are 3306.
6. Click the "ADMIN" button in the MYSQL module's actions.
7. Import the "employee_rec.sql" file (included in the project files).
8. Open your browser and navigate to "localhost/website."
9. The index page should appear.
10.Try to add data inside "index.php" and then check the "employee_rec.sql" file to verify if it has been updated.
</pre>
<hr>
