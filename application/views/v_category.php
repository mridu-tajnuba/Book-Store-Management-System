<header class="page-header">
  <div class="container-fluid">
    <h2 class="no-margin-bottom">Book Category</h2>
  </div>
</header>
<div class="container-fluid">
<div class="table-agile-info">
		<?php if ($this->session->userdata('level')=="admin"): {
			
		}  ?>
			
			<?php if ($this->session->flashdata('message')!=null) {
			echo "<br><div class='alert alert-success alert-dismissible fade show' role='alert'>"
			.$this->session->flashdata('message')."<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
			<span aria-hidden='true'>&times;</span>
			</button> </div>";
		} ?>
			<?php elseif ($this->session->userdata('level')=="cashier"): {
				
			} ?>
		<?php endif  ?>
		<div class="card rounded-0 mt-3">
			<div class="card-header">
					<a href="#add" data-toggle="modal" class="btn btn-primary btn-sm rounded-0 pull-right"><i class="fa fa-plus"></i> Add New Category</a>
			</div>
			<div class="card-body">
				<table class="table table-hover table-bordered" id="example" ui-options=ui-options="{
						&quot;paging&quot;: {
						&quot;enabled&quot;: true
						},
						&quot;filtering&quot;: {
						&quot;enabled&quot;: true
						},
						&quot;sorting&quot;: {
						&quot;enabled&quot;: true
						}}">
					<thead style="background-color: #464b58; color:white;">
						<tr>
							<td>#</td>
							<td>Category Code</td>
							<td>Category Name</td>
							<td>Action</td>
						</tr></thead>
						<tbody style="background-color: white;">
						<?php $no=0; foreach ($get_category as $kat) : $no++;?>

						<tr>
							<td><?=$no?></td>
							<td>#CA<?=$kat->category_code?></td>
							<td><?=$kat->category_name?></td>
							<td class="text-center">
								<a href="#edit" onclick="edit('<?=$kat->category_code?>')" class="btn btn-primary  btn-sm rounded-0" data-toggle="modal">Edit</a>
								<a href="<?=base_url('index.php/category/hapus/'.$kat->category_code)?>" onclick="return confirm('Are you sure you want to delete this category?')" class="btn btn-danger btn-sm rounded-0">Delete</a>
							</td>
						</tr>
					<?php endforeach ?>
					</tbody>
				</table>
			</div>
		</div>

<div class="modal" id="add">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				Add New Category
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span>
				<span class="sr-only">Close</span>
				</button>
			</div>
			<form action="<?=base_url('index.php/category/add')?>" method="post">
				<div class="modal-body">
					<div class="form-group row">
						<div class="col-sm-3 offset-1"><label>Category Code</label></div>
						<div class="col-sm-7">
							<input type="number" name="category_code" required class="form-control">
						</div>
					</div>
					<div class="form-group row">
						<div class="col-sm-3 offset-1"><label>Category Name</label></div>
						<div class="col-sm-7">
							<input type="text" name="category_name" required class="form-control">
						</div>
					</div>
				</div>
				<div class="modal-footer justify-content-end">
					<input type="submit" name="save" value="Save" class="btn btn-primary btn-sm rounded-0">
					<button type="button" class="btn btn-default btn-sm border rounded-0" data-dismiss="modal">Close</button>
				</div>
			</form>
		</div>
	</div>
</div>
<div class="modal fade" id="edit">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				Edit Category
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span>
				<span class="sr-only">Close</span>
				</button>
			</div>
			<form action="<?=base_url('index.php/category/category_update')?>" method="post">
				<div class="modal-body">
					<input type="hidden" name="category_code_lama" id="category_code_lama">
					<div class="form-group row">
						<div class="col-sm-3 offset-1"><label>Category Code</label></div>
						<div class="col-sm-7">
							<input type="number" name="category_code" id="category_code" required class="form-control">
						</div>
					</div>
					<div class="form-group row">
						<div class="col-sm-3 offset-1"><label>Category Name</label></div>
						<div class="col-sm-7">
							<input type="text" name="category_name" id="category_name" required class="form-control">
						</div>
					</div>
				</div>
				<div class="modal-footer justify-content-end">
					<input type="submit" name="edit" value="Save" class="btn btn-primary btn-sm rounded-0">
					<button type="button" class="btn btn-default btn-sm border rounded-0" data-dismiss="modal">Close</button>
				</div>
			</form>
		</div>
	</div>
</div>
</div>

<script type="text/javascript">
	$(document).ready(function(){
		$('#example').DataTable();
	}
	);
	function edit(a) {
		$.ajax({
			type:"post",
			url:"<?=base_url()?>index.php/category/edit_category/"+a,
			dataType:"json",
			success:function(data){
				$("#category_code").val(data.category_code);
				$("#category_name").val(data.category_name);
				$("#category_code_lama").val(data.category_code);
			}
		});
	}
</script>

