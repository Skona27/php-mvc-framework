
	<h3>Classes:</h3>
	<ul>
		<li>App
		</li>

		<li>Controller</li>

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
							<pre>(...)->first();</pre> Returns first element of an result array.
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

		<li>Request
			<ul>
				<li>Request check
					<pre>Request::method('string', callback);</pre> Default value 'GET', runs callback.
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

		<li>Redirect
			<pre>Redirect::to(location);</pre> Accepts numeric values, as error types. If string, redirect to string.
		</li>

		<li>Hash
			<ul>
				<li>String hashing
					<pre>Hash::make('string');</pre> Returns hashed string.
				</li>

				<li>Generate random string
					<pre>Hash:unique(length)</pre> Returns unique string with a specified length.
				</li>
			</ul>
		</li>

	</ul>