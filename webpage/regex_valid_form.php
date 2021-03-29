<?php

	$pattern="";
	$text="";
	$replaceText="";
	$replacedText="";
	$wsRemovedText="";
	$numsOnly="";
	$nlRemovedText="";
	$txtInParenthesis="";

	$match="Not checked yet.";

if ($_SERVER["REQUEST_METHOD"]=="POST") {
	$pattern=$_POST["pattern"];
	$text=$_POST["text"];
	$replaceText=$_POST["replaceText"];

	$replacedText=preg_replace($pattern, $replaceText, $text);
    $wsRemovedText=preg_replace("/ /","",$text);
    $numsOnly=preg_replace("/[^\d\.,]*/","",$text);
    $nlRemovedText=preg_replace("/\n/","",$text);
    $txtInParenthesis=preg_replace("/\].*\[/","",$text);
    $txtInParenthesis=preg_replace("/.*\[/","",$txtInParenthesis);
    $txtInParenthesis=preg_replace("/\].*/","",$txtInParenthesis);

	if(preg_match($pattern, $text)) {
						$match="Match!";
					} else {
						$match="Does not match!";
					}
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Valid Form</title>
</head>
<body>
	<form action="regex_valid_form.php" method="post">
		<dl>
			<dt>Pattern</dt>
			<dd><input type="text" name="pattern" value="<?= $pattern ?>"></dd>

			<dt>Text</dt>
			<dd><input type="text" name="text" value="<?= $text ?>"></dd>

			<dt>Replace Text</dt>
			<dd><input type="text" name="replaceText" value="<?= $replaceText ?>"></dd>

			<dt>Output Text</dt>
			<dd><?=	$match ?></dd>

			<dt>Replaced Text</dt>
			<dd> <code><?=	$replacedText ?></code></dd>

            <dt>Removed whitespaces</dt>
            <dd> <code><?=	$wsRemovedText ?></code></dd>

            <dt>Numericals only</dt>
            <dd> <code><?=	$numsOnly ?></code></dd>

            <dt>New lines removed</dt>
            <dd> <code><?=	$nlRemovedText ?></code></dd>

            <dt>Text extracted from parenthesis </dt>
            <dd> <code><?=	$txtInParenthesis ?></code></dd>

			<dt>&nbsp;</dt>
			<dd><input type="submit" value="Check"></dd>
		</dl>

	</form>
</body>
</html>
