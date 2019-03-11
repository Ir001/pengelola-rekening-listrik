<?php 
	$q = $_GET['q'];
	$search = $conn->query("SELECT * FROM user INNER JOIN daya ON user.id_daya = daya.id_daya WHERE user.username LIKE '%$q%' OR user.rekening_listrik LIKE '%$q%'");
 ?>
<div class="card">
	<div class="card-header">
		<h3 class="card-title">List User</h3>
	</div>
	<div class="table-responsive">
		<table class="table card-table table-vcenter text-nowrap">
			<thead>
				<tr>
					<th class="w-1">No.</th>
					<th>Nama</th>
					<th>Nomor Rek.</th>
					<th>Daya</th>
					<th>Created</th>
					<th></th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				<?php while ($data = $search->fetch_assoc()){ ?>
				<tr>
					<td><span class="text-muted"><?php echo $no; ?></span></td>
					<td><a href="invoice.html" class="text-inherit"><?=$data['username']; ?></a></td>
					<td>
						<?=$data['rekening_listrik']; ?>
					</td>
					<td>
						<?=number_format($data['tegangan'],0,',','.'); ?> Volt
					</td>
					<td>
						<?=$data['tanggal'];?>
					</td>
					<td class="text-right">
						<form id="deleteUser">
							<input type="hidden" name="id_user" value="<?=$data['id_user'];?>">
							<button type="submit" onclick="return confirm('Are you sure?');" class="btn btn-secondary btn-sm"><i class="fe fe-delete"></i> Delete </button>
						</form>
					</td>
					<td>
						<a href="edit.php?userId=<?=$data['id_user'];?>" class="btn btn-secondary btn-sm"><i class="fe fe-edit"></i> Edit</a>
					</td>
				</tr>
				<?php $no++; ?>
				<?php } ?>
			</tbody>
		</table>
	</div>
</div>