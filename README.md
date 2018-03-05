
# Practice with PHPUnit DBUnit Extension

* https://phpunit.readthedocs.io/en/latest/database.html#
* https://phpunit.readthedocs.io/en/latest/database.html#database-assertions-api


### Things that were not obvious to me

The PHPUnit manual says it is very important to understand the DataSet and DataTable concepts... but for me at least, did a poor job of explaining them.
These are classes defined in the framework that provide an API for working with data. The forehead smack was that a DataSet contains DataTables.

The DataSet returned by getDataSet() is used to initialize "the world" for the test suite. No matter the contents of the database, you are ensured that this DataSet will be the starting point for your tests.

All of the various DataSet methods are factories for the same type of object, just using different sources. https://phpunit.readthedocs.io/en/latest/database.html#available-implementations

The framework ensures the state of "The World", however it does not create the database or tables for you. It merely empties the tables and matches getDataSet(). So, create your testing schema, dump it (--no-data), and commit it to vcs. https://phpunit.readthedocs.io/en/latest/database.html#will-phpunit-re-create-the-database-schema-for-each-test


## Code Overview

### src

* *IceCream.php* - model
* *ToItself.php* - a class with a stupid name that does shyte.

### phpunit/sql

* *create_user_database.sql* - defines testing database, testing user, and a table (ice_cream). You must ensure your database schema before running PHPUnit.
* *ice_cream.dump.sql* - sql dump - not really needed
* *ice_cream.xml* - mysqldump --xml output. Example source for creating a DataSet. In practice, you will have different sources for each DataSet Assertion you want to make, as well as for test suite setup.

### phpunit/tests

* *TestCase.php* - implements PHPUnit\Framework\TestCase so we can get a database connection in any testing class. See getConnection(); This is required by the abstract class PHPUnit\DbUnit\TestCaseTrait but we don't implement the class here so we an have one base class for all our tests and declare the trait on child classes that need it. https://phpunit.readthedocs.io/en/latest/database.html#tip-use-your-own-abstract-database-testcase
* *ToItselfDBTest.php* - implements trait PHPUnit\DbUnit\TestCaseTrait

### phpunit/phpunit.xml
https://phpunit.readthedocs.io/en/latest/configuration.html

It is recommended to use different xml config files for different test suites if different values are needed. Values are global for all tests. File is configured in our composer.json custom script. Can be loaded by default if in the invocation directory.

* *php* adds to GLOBALS when tests are run. Used in getConnection() to create the DSN.
* *logging* enables the types of output. I selected coverage-html for comprehensive coverage reporting and testdox for concise command-line output.
* *filter/whitelist* files to perform coverage analysis on
* *testsuite* identifies tests to run. We are specifying via a directory. See the custom script in composer.json.
