# Notes

## Commands to know

How to add a book to the database
- ```sql
  INSERT INTO books VALL
  ```


Show all of the data from inside of the database
- ```sql
  SELECT * FROM books
  SELECT title, price FROM books
  ```

Method to show the use of the different keys in the table. When inserting duplicate data this will show you if there is duplicate data in the table.
- ```sql
  describe books
  ```

Method to update or delete an entry in a database
- ```sql
  DELETE FROM books WHERE ISBN = 4;
  SELECT * FROM books WHERE Price <= 19;
  ```

How to edit an entry from the table
- ```sql
  UPDATE books SET Title = 'REPLECEMENT' WHERE ISBN = 'xxx-xxx-xxx';
  ```

How to alter the type iside a table
- ```sql
  modify collumn Price decimal(6,2);
  ```
In this example using decimal wrather than a floatng point will lead you to have an exact number wrather than the floating point

- When inserting into the database, make sure to insert the data in order and to provide quotations around string and none around floats

- Also when entering a thing above the limit, it trunkates the limit
