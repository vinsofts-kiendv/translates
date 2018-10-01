<form method="post" action="{{ url($lang.'/create') }}">
	@csrf
	<input type="text" name="incode" placeholder="incode">
	<input type="text" name="en" placeholder="en">
	<input type="text" name="vn" placeholder="vn">
	<input type="text" name="pages" placeholder="pages">
	<input type="submit" value="submit">
</form>