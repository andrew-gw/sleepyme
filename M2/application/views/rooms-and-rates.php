<h2><?= $title ?></h2>

<p class="alert alert-info">Please note that all our rooms have two queen size beds and will sleep 4 comfortably. Rate quoted is for the room per night for up to 4 adults.</p>

<table id="rooms-and-rates" class="table table-striped">
	<tr>
		<th></th>
		<th>#</th>
		<th>Title</th>
		<th>Description</th>
		<th>Rate</th>
	</tr>
	
	<? foreach ($rooms as $room): ?>
	<tr>
		<td><img src="<?= assetUrl(); ?>/img/rooms/<?= $room->thumbnail ?>" alt="Room photo"></td>
		<td><strong><?= $room->roomNumber ?></strong></td>
		<td style="white-space: nowrap;"><?= $room->title ?></td>
		<td><?= $room->description ?></td>
		<td>$<?= $room->rate ?></td>
	</tr>
	<? endforeach ?>

</table>