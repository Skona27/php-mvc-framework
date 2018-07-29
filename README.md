# php-mvc-framework

Simple php framework using MVC pattern.


<h3>Classes:</h3>
<ul>
    <li>App</li>

    <li>Controller</li>

   <li>Cookie
        <ul>
            <li> Checking if cookie is set
                <pre>Cookie::exists("name")</pre>
                If is set Cookie with the name we provide, returns true, otherwise false.
            </li>

            <li> Get the cookie value
                <pre>Cookie::get("name")</pre>
                Returns Cookie value.
            </li>
    
            <li> Set a cookie
                <pre>Cookie::put("name", "value", ["expiry"])</pre>
                Sets a cookie with name and value we provide, returns boolean. Expiry date by default is set in config file.
            </li>
    
            <li> Delete a cookie
                <pre>Cookie::delete("name")</pre>
                Delets a cookie with the name we provide.
            </li>
        </ul>
   </li>

   <li>Database
        <ul>
            <li> Creating connection
                <pre>Database::instance();</pre>
            </li>

            <li> Selecting data
                <pre>Database::instance()->query('SELECT * FROM table WHERE field= :field', ['field' => Value1]);</pre>
                <ul>
                    <li>See results
                        <pre>(...)->results();</pre> Returns array of data.
                    </li>
                    <li>See first result
                        <pre>(...)->first();</pre> Returns first element of an result array. If first element does not exists, returns undefined.
                    </li>
                </ul>	
            </li>

            <li> Inserting data
                <pre>Database::instance()->query('INSERT INTO table VALUES (:field1, :field2)', ['field1' => Value1', 'field2' => Value2']);</pre>	
                <ul>
                    <li>Error check
                        <pre>(...)->error();</pre> Returns boolean.
                    </li>
                </ul>
            </li>
        </ul>
    </li>

    <li>File</li>

    <li>Hash
        <ul>
            <li>String hashing
                <pre>Hash::make('string');</pre> Returns hashed string.
            </li>

            <li>Verify hashed string
                <pre>Hash::check("string", "hash");</pre>
                Returns boolean if string matches hashed string;
            </li>

            <li>Generate random string
                <pre>Hash:unique(length)</pre> Returns unique string with a specified length.
            </li>
        </ul>
    </li>

    <li>Input
        <ul>
            <li>Getting value from input
                <pre>Input::get('fieldName')</pre> If is set, returns sanitized input value from GET, or POST array.
                Otherwise, returns empty string.
            </li>
        </ul>
    </li>

    <li>Model</li>

    <li>Redirect
        <pre>Redirect::to(location);</pre> Accepts numeric values, as error types. If URL, redirect to URL.
    </li>

    <li>Request
        <ul>
            <li>Request check
                <pre>Request::method('string', callback);</pre> Default value 'GET', runs callback.
            </li>
        </ul>
    </li>

    <li>Session
        <ul>
            <li> Checking if session is set
                <pre>Session::exists("name");</pre>
                If is set Session with the name we provide, returns true, otherwise false.
            </li>

            <li> Get the session value
                <pre>Session::get("name");</pre>
                Returns session value.
            </li>

            <li> Set a session
                <pre>Session::put("name", "value");</pre>
                Sets a session with name and value we provide, returns session value.
            </li>

            <li> Delete a session
                <pre>Session::delete("name");</pre>
                Unsets a session with the name we provide.
            </li>

            <li> Flash a session
                <pre>Session::flash("name", ["string" = null]);</pre>
                If session exists, returns it's value, then unsets session.
                If no session, it puts a session with the name and value.
            </li>
        </ul>
    </li>

    <li>Validation</li>

</ul>