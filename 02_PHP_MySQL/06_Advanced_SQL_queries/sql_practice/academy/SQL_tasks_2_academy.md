## Advanced SQL

1.	Write a SQL query to find the names and salaries of the employees that take the minimal salary in the company.
1.	Write a SQL query to find the names and salaries of the employees that have a salary that is up to 10% higher than the minimal salary for the company.
1.	Write a SQL query to find the full name, salary and department of the employees that take the minimal salary in their department.
1.	Write a SQL query to find the average salary in the department #1.
1.	Write a SQL query to find the average salary  in the "Sales" department.
1.	Write a SQL query to find the number of employees in the "Sales" department.
1.	Write a SQL query to find the number of all employees that have manager.
1.	Write a SQL query to find the number of all employees that have no manager.
1.	Write a SQL query to find all departments and the average salary for each of them.
1.	Write a SQL query to find the count of all employees in each department and for each town.
1.	Write a SQL query to find all managers that have exactly 5 employees. Display their first name and last name.
1.	Write a SQL query to find all employees along with their managers. For employees that do not have manager display the value "(no manager)".
1.	Write a SQL query to find the names of all employees whose last name is exactly 5 characters long.
1.	Write a SQL query to display the current date and time in the following format "`day.month.year hour:minutes:seconds:milliseconds`".
1.	Write a SQL query to display the average employee salary by department and job title.
1.	Write a SQL query to display the town where maximal number of employees work.
1.	Write a SQL query to display the number of managers from each town.
1.	Create a table `Users`. Users should have username, password, full name and last login time.
	*	Choose appropriate data types for the table fields. Define a primary key column with a primary key constraint.
	*	Define the primary key column as auto-increment to facilitate inserting records.
	*	Define unique constraint to avoid repeating usernames.
	*	Define a check constraint to ensure the password is at least 5 characters long.
1.	Write SQL statements to insert in the `Users` table the names of all employees from the `Employees` table.
	*	Combine the first and last names as a full name.
	*	For username use the first 3 letters of the first name + the last name (in lowercase).
	*	Use the same for the password.
	*	Use HireDate for last login time.
1.	Write a SQL statement that changes the password to `NULL` for all users that have not been in the system since year 1999.
1.	Write a SQL statement that deletes all users without passwords (`NULL` password).