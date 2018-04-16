    
    <h2>Hello from info page!</h2>
    <p>Let's test some file upload.</p>

	<form action="<?=URL?>/info" method="POST" enctype="multipart/form-data">
		<input type="file" name="file">
		<input type="submit">
	</form>