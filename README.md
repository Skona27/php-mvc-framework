# php-mvc-framework

Simple php framework using MVC pattern.


## Getting Started

These instructions will get you a copy of the project up and running on your local machine for development and testing purposes.


### Prerequisites

What things you need to have installed on your local machine.

```
PHP v.7

Access to MySQL database as super user

```


### Installing

A step by step series of examples that tell you how to get a development env running

* Move all the files to your www root dir


* Import database structure from DB.sql

```
mysql db_name < DB.sql

```

* Run web server and open the browser


### Classes available:

*   App
*   Controller
*   Cookie
    *   Checking if cookie is set

        <pre>Cookie::exists("name")</pre>

        If is set Cookie with the name we provide, returns true, otherwise false.
    *   Get the cookie value

        <pre>Cookie::get("name")</pre>

        Returns Cookie value.
    *   Set a cookie

        <pre>Cookie::put("name", "value", ["expiry"])</pre>

        Sets a cookie with name and value we provide, returns boolean. Expiry date by default is set in config file.
    *   Delete a cookie

        <pre>Cookie::delete("name")</pre>

        Delets a cookie with the name we provide.
*   Database
    *   Creating connection

        <pre>Database::instance();</pre>

    *   Selecting data

        <pre>Database::instance()->query('SELECT * FROM table WHERE field= :field', ['field' => Value1]);</pre>

        *   See results

            <pre>(...)->results();</pre>

            Returns array of data.
        *   See first result

            <pre>(...)->first();</pre>

            Returns first element of an result array. If first element does not exists, returns undefined.
    *   Inserting data

        <pre>Database::instance()->query('INSERT INTO table VALUES (:field1, :field2)', ['field1' => Value1', 'field2' => Value2']);</pre>

        *   Error check

            <pre>(...)->error();</pre>

            Returns boolean.
*   File
*   Hash
    *   String hashing

        <pre>Hash::make('string');</pre>

        Returns hashed string.
    *   Verify hashed string

        <pre>Hash::check("string", "hash");</pre>

        Returns boolean if string matches hashed string;
    *   Generate random string

        <pre>Hash:unique(length)</pre>

        Returns unique string with a specified length.
*   Input
    *   Getting value from input

        <pre>Input::get('fieldName')</pre>

        If is set, returns sanitized input value from GET, or POST array. Otherwise, returns empty string.
*   Model
*   Redirect

    <pre>Redirect::to(location);</pre>

    Accepts numeric values, as error types. If URL, redirect to URL.
*   Request
    *   Request check

        <pre>Request::method('string', callback);</pre>

        Default value 'GET', runs callback.
*   Session
    *   Checking if session is set

        <pre>Session::exists("name");</pre>

        If is set Session with the name we provide, returns true, otherwise false.
    *   Get the session value

        <pre>Session::get("name");</pre>

        Returns session value.
    *   Set a session

        <pre>Session::put("name", "value");</pre>

        Sets a session with name and value we provide, returns session value.
    *   Delete a session

        <pre>Session::delete("name");</pre>

        Unsets a session with the name we provide.
    *   Flash a session

        <pre>Session::flash("name", ["string" = null]);</pre>

        If session exists, returns it's value, then unsets session. If no session, it puts a session with the name and value.
*   Validation


## Built wtih

* PHP
* MySQL


## Authors

* **Jakub Skoneczny** - *Initial work* - [Profile](https://github.com/Skona27)


