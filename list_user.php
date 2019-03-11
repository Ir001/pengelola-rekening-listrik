<?php
	include 'config.php';
	$no = 1;
	$user =  $conn->query("SELECT * FROM user INNER JOIN daya ON daya.id_daya = user.id_daya ORDER BY username");
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
				<?php while ($data = $user->fetch_assoc()){ ?>
				<tr>
					<td><span class="text-muted"><?php echo $no; ?></span></td>
					<td><a href="edit.php?userId=<?=$data['id_user'];?>" class="text-inherit"><?=$data['username']; ?></a></td>
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
						<form id="delete_user">
							<input type="hidden" name="id_user" value="<?=$data['id_user'];?>">
							<button type="submit" onclick="return confirm('Anda yakin?');" class="btn btn-secondary btn-sm"><i class="fe fe-delete"></i> Delete </button>
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
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script>
		$(document).ready(function(){
			$('#delete_user').submit(function(e){
				e.preventDefault();
				$.ajax({
					type : "POST",
					url : "inc/delete_user.php",
					data : $('#delete_user').serialize(),
					success : function(data){
						if (data === 'success') {
							$('#content').load('list_user.php');
							alert('Sukses menghapus user');
						}else{
							alert('Error: '+data);
						}
					},
				});
			});
		});
</script>