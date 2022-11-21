<header class="page-header">
  <div class="container-fluid">
    <h2 class="no-margin-bottom">Sales Transaction</h2>
  </div>
</header>
<br>
<div class="container-fluid">
	<div class="row">
		<div class="col-md-7">
			<div class="card rouded-0 shadow">
				<div class="card-header">
					<div class="card-title mb-0">List of Books</div>
				</div>
				<div class="card-body">
					<table class="table table-hover table-bordered" id="example" style="background-color: #eef9f0;">
						<thead style="background-color: #464b58; color:white;">
							<tr>
								<th>#</th>
								<th>Book Title</th>
								<td>Category</td>
								<th>Price</th>
								<th>Stock</th>
								<th>Act.</th>
							</tr>

						</thead>
						<tbody style="background-color: white;">
							<?php $no=0; foreach ($get_book as $book): $no++; ?>
								<tr>
								
									<td><?=$no?></td>
									<td><?=$book->book_title?></td>
									<td><?=$book->category_name?></td>
									<td class="text-right">$<?=$book->price?></td>
									<td class="text-right"><?=$book->stock?></td>
									<td class="text-center"><a href="<?=base_url('index.php/transaction/addcart/'.$book->book_code)?>"><button class="btn btn-outline-primary rounded-0 btn-sm"><span class="fa fa-shopping-cart" aria-hidden="true"></span></button></a></td>
								</tr>
							<?php endforeach ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
		<div class="col-md-5">
			<div class="card rounded-0 shadow">
				<div class="card-header">
					<div class="card-title mb-0">Cart List</div>
				</div>
				<div class="card-body">
					<form action="<?=base_url('index.php/transaction/save')?>" method="post">
					
						Cashier : <select name="user_code" class="form-control">
						<option disabled selected>Select Here</option>
						<?php foreach ($transaction as $transaction): ?>
							<option class="text-dark" value="<?=$transaction->user_code?>"><?=$transaction->fullname?></option>
							<?php endforeach ?>
							</select>
							Customer's Name : <input type="text" name="buyer_name" class="form-control"><br>

						
						<table class="table table-hover" id="example" style="background-color: white;">
						<thead style="background-color:#636363; color:white;">
						<tr>
							<td>#</td>
							<td>Title</td>
							<td>Qty</td>
							<td>Price</td>
							<td>Subtotal</td>
							<td>Action</td>
						</tr>
						</thead>
						<?php $no=0; foreach ($this->cart->contents() as $items): $no++; ?>
						<input type="hidden" name="book_code[]" value="<?=$items['id']?>">
						<input type="hidden" name="rowid[]" value="<?=$items['rowid']?>">

				
						<tr>
							<td><?=$no?></td>
							<td><?=$items['name']?></td>
							<td width="1"><input type="text" name="qty[]" value="<?=$items['qty']?>" class="form-control" style="padding:4px;"></td>
							<td class="text-right">$<?=number_format($items['price'])?></td>
							<td class="text-right">$<?=number_format($items['subtotal'])?></td>
							<td><a href="<?=base_url('index.php/transaction/delete_cart/'.$items['rowid'])?>" class="btn btn-danger btn-sm"><span class="fa fa-trash" aria-hidden="true"></span></a></td>
						</tr>
						<input type="hidden" name="bookname" value="<?=$items['name']?>">
						<input type="hidden" name="book_qty" value="<?=$items['qty']?>">
						<?php endforeach  ?>
							<input type="hidden" name="total" value="<?=$this->cart->total()?>">
							
							<th colspan="4">Total Amount</th>
							<th class="text-right">$<?=number_format($this->cart->total())?></th>
							<th></th>
								
							</tr>
						</table>
						<div class="text-center">
						<input type="submit" name="update" value="Update Quantity" class="btn btn-primary rounded-0 btn-sm"> 
						<input type="submit" name="pay" onclick="return confirm('Are you sure?')" class="btn btn-success rounded-0 btn-sm" value="Pay">
						<a class="btn btn-danger rounded-0 btn-sm" href="<?=base_url('index.php/transaction/clearcart')?>">Clear Cart</a>
						</div>
					</form>
					<?php if ($this->session->flashdata('message')): ?>
						<div class="alert alert-warning alert-dismissible fade show" role="alert">
							<?= $this->session->flashdata('message');?>
							<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
									<span aria-hidden='true'>&times;</span>
							</button> 
						</div>
					<?php endif ?>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
	$(document).ready(function(){
			$('#example').DataTable();
		}
	);
</script>
