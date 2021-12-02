Write a function that finds how many Mondays occurred on the first day of each month in the period from 
*January 1, 1900* to *December 31, 1999*. 

Your function should return *Mondays count* and the *date* when this Monday occurred and print value to the console. 
Each value should be placed on the new line and dates should have format *DD.MM.YYYY*. 
Try to implement most optimized version of the function.

For example,
```
Output: 2
01.02.1900
01.03.1900
```

**Some notes:**

*January 1, 1900* is a Monday.There are 30 days in April, June, September and November. February has 28 days and 
29 in leap year. Other months have 31 days. If year is not divisible by 4 then it is a common year, else if year 
is not divisible by 100 then it is a leap year, else if year is not divisible by 400 then it is a common year, 
else it is a leap year.

**Your solution:**

* should contain PHP function with solution. Use type hinting and return type declaration with strict mode enabled; 

* should contain PHPUnit test. Test should complete successfully; 

* should have no warnings or errors.
