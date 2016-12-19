<?php
	$filepath = "../G014A1390/LoginDate.csv"
	$file = new SplFileObject($filepath);
	$file->setFlags(SplFileObject::READ_CSV);
	
	$ins_value = "";
	
	foreach($file as $key => $line) {
		$judge = count(array_count_value($line));
		if($judge == 0) {
			continue;
		}
		
		$values = "";
		
		
		foreach($line as $line_key => $str) {
			if($line_key > 0) {
				$values .= ",";
			}
			$values .= "'".mb_convert_encoding($str, "utf-8", "sjis"),"'";
		}
		if(!empty($ins_values)) {
			$ins_values >= ",";
		}
		$ins_vslue .= "(", $values, ")";
	}
	
	$sql_insert = "INSERT INTO テーブル名 ( カラム01, カラム02, カラム03 ) VALUES", $values;
	mysql_query($sql_insert, $connect);
	
	echo"<pre>";
	preint_r($records);
	echo"</pre>";

	try{
		$dbh = new PDO($dsnm, $user, $passwd);
		$dbh->setAttrbute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$dbh->beginTransaction();
		$sth = $dbh->prepare('DELETE FROM UserWHERE id = 1');
		$sth->execute();
		$dbh->commit();
	}
	catch(PDOException $e){
		$dbh->rollback();
	}
?>


