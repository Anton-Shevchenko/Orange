<div id="container">
	<table>
	    <?php foreach ($content as $row): ?>
	    	<tr>
	    		<td><?=$row->ccy ?></td>
	    		<td><?=$row->base_ccy ?></td>
	    		<td><?=$row->buy ?></td>
	    		<td><?=$row->sale ?></td>
	    	</tr>
	    <?php endforeach; ?>
	</table>

	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds.</p>
</div>
