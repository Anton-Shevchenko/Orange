<div id="container">
	<table>
	    <?php foreach ($content->result_array() as $row): ?>
	    	<tr>
	    		<td><?=$row['currency_id'] ?></td>
	    		<td><?=$row['buy'] ?></td>
	    		<td><?=$row['sale']?></td>
	    		<td><?=$row['time'] ?></td>
	    	</tr>
	    <?php endforeach; ?>
	</table>

	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds.</p>
</div>