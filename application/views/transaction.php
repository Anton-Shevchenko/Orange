<!DOCTYPE html>
<html>
<head>
	<title>h</title>
</head>
<body>

	<div>
		<p>		
			"START TRANSACTION;<br>
				UPDATE `balance` SET `balance`= balance -'$sum' WHERE user_id = (SELECT users.id FROM users WHERE users.id = '$ind' );<br>
	            UPDATE `balance` SET `balance`= balance +'$sum' WHERE user_id = (SELECT users.id FROM users WHERE users.id = '$for' );<br>
	            INSERT INTO 'transactions' ('sender', 'payee', 'sum') VALUES ('$ind', '$for', '$sum');<br>
				COMMIT;"</p>
	</div>

	<?php foreach ($content as $row): ?>
		<div>
			<form method="post" name="haha">
				<h2 name="ind" value="?=$row->name ?>"><?=$row->name ?></h2>
				<h3>Rate: <?= $row->balance ?></h3>
				<p>For:</p>
				<select name="for">

				    <option>Noname</option>
					<?php foreach ($content as $name): ?>
					<option value="<?=$name->id ?>"><?=$name->name ?></option>
					<?php endforeach; ?>

				</select>

				<p>Send:</p>
				<input type="number" name="sum">
				<input type="hidden" name="ind" value="<?=$row->id ?>" />
				<input type="submit" name="submit" value="Enter">
			</form>
		</div>
	<?php endforeach; ?>
	<div id="container">
		<table>
			<tr>
				<th>id</th>
				<th>Sender</th>
				<th>Payee</th>
				<th>Sum</th>
				<th>Date</th>
			</tr>
		    <?php foreach ($history->result_array() as $row): ?>
		    	<tr>
		    		<td><?=$row['id'] ?></td>
		    		<td><?=$row['sender_id'] ?></td>
		    		<td><?=$row['payee_id']?></td>
		    		<td><?=$row['sum'] ?></td>
		    		<td><?=$row['date'] ?></td>
		    	</tr>
		    <?php endforeach; ?>
		</table>

		<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds.</p>
	</div>
</body>
</html>