@extends('layouts.app')
@section('content')

<div class="container py-4">
	<div class="row">
		<div class="col">
			<h3>Contoh Data Transaksi Suatu Supermarket</h3>
			<table class="table" style="margin-top: 40px; margin-bottom: 40px;">
	      		<thead>
	      			<tr>
	      				<th>#</th>
	      				<th>Item Pembelian</th>
	      			</tr>
	      		</thead>
	      		<tbody>
	      			@foreach($transaksiPembelian as $kodeTransaksi => $value)
	      			<tr>
	      				<td>{{ $kodeTransaksi+1 }}</td>
	      				<td>{{ $value }}</td>
	      			</tr>
	      			@endforeach
	      		</tbody>
	      	</table>
		</div>
	</div>
	<div class="row">
		<div class="col">
			<div class="accordion" id="accordionExample">
			  {{-- Iterasi Pertama --}}
			  <div class="card">
			    <div class="card-header" id="headingOne">
			      <h2 class="mb-0">
			        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
			          F1
			        </button>
			      </h2>
			    </div>

			    <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
			      <div class="card-body">
			      	<table class="table">
			      		<thead>
			      			<tr>
			      				<th>#</th>
			      				<th>Itemset</th>
			      				<th>Σ</th>
			      			</tr>
			      		</thead>
			      		<tbody>
			      			@foreach($totalPerItem as $key => $value)
			      			<tr>
			      				<td>{{ $iterationHeadingOneTableOne }}</td>
			      				<td>{{ $key }}</td>
			      				<td>{{ $value }}</td>
			      			</tr>
			      			<?php $iterationHeadingOneTableOne++; ?>
			      			@endforeach
			      		</tbody>
			      	</table>

			      	<p style="font-size: 18px;"> Ф = 1, sehingga menjadi:</p>

			      	<table class="table">
			      		<thead>
			      			<tr>
			      				<th>#</th>
			      				<th>Itemset</th>
			      				<th>Σ</th>
			      			</tr>
			      		</thead>
			      		<tbody>
			      			@foreach($f1 as $key => $value)
			      			<tr>
			      				<td>{{ $iterationHeadingOneTableTwo }}</td>
			      				<td>{{ $key }}</td>
			      				<td>{{ $value }}</td>
			      			</tr>
			      			<?php $iterationHeadingOneTableTwo++; ?>
			      			@endforeach
			      		</tbody>
			      	</table>
			      </div>
			    </div>
			  </div>

			  {{-- Iterasi kedua --}}
			  <div class="card">
			    <div class="card-header" id="headingTwo">
			      <h2 class="mb-0">
			        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
			          F2
			        </button>
			      </h2>
			    </div>
			    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
			      <div class="card-body">
			      	<table class="table">
			      		<thead>
			      			<th>#</th>
			      			<th>Itemset</th>
			      			<th>Σ</th>
			      		</thead>
			      		<tbody>
			      			@foreach($totalPerItemF2 as $key => $value)
			      			<tr>
			      				<td>{{ $iterationHeadingTwoTableOne }}</td>
			      				<td>{{ $key }}</td>
			      				<td>{{ $value }}</td>
			      			</tr>
			      			<?php $iterationHeadingTwoTableOne++; ?>
			      			@endforeach
			      		</tbody>
			      	</table>

			      	<p style="font-size: 18px;"> Ф = 1, sehingga menjadi:</p>

			      	<table class="table">
			      		<thead>
			      			<tr>
			      				<th>#</th>
			      				<th>Itemset</th>
			      				<th>Σ</th>
			      			</tr>
			      		</thead>
			      		<tbody>
			      			@foreach($f2 as $key => $value)
			      			<tr>
			      				<td>{{ $iterationHeadingTwoTableTwo }}</td>
			      				<td>{{ $key }}</td>
			      				<td>{{ $value }}</td>
			      			</tr>
			      			<?php $iterationHeadingTwoTableTwo++; ?>
			      			@endforeach
			      		</tbody>
			      	</table>
			      </div>
			    </div>
			  </div>

			  {{-- Iterasi Ketiga --}}
			  <div class="card">
			    <div class="card-header" id="headingThree">
			      <h2 class="mb-0">
			        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
			          F3
			        </button>
			      </h2>
			    </div>
			    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
			      <div class="card-body">
			      	<table class="table">
			      		<thead>
			      			<th>#</th>
			      			<th>Itemset</th>
			      			<th>Σ</th>
			      		</thead>
			      		<tbody>
			      			@foreach($f3 as $key => $value)
				      			<tr>
				      				<td>{{ $iterationHeadingThreeTableOne }}</td>
				      				<td>{{ $key }}</td>
				      				<td>{{ $value }}</td>
				      			</tr>
				      			<?php $iterationHeadingThreeTableOne++; ?>
					      	@endforeach
			      		</tbody>
			      	</table>
			      	<p style="font-size: 18px">Dari tabel-tabel di atas, didapat F3 = { }, karena tidak ada Σ >= Ф sehingga F4, F5, F6 dan F7 juga merupakan himpunan kosong</p>
			      </div>
			    </div>
			  </div>

			  {{-- Iterasi Ke-empat --}}
			  <div class="card">
			    <div class="card-header" id="headingFour">
			      <h2 class="mb-0">
			        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
			        	Confidence and Support
			        </button>
			      </h2>
			    </div>
			    <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionExample">
			      <div class="card-body">
			      	<table class="table">
			      		<thead>
			      			<th>If Antecedent then Consequent</th>
			      			<th>Support</th>
			      			<th>Confidence</th>
			      		</thead>
			      		<tbody>
			      			@foreach($ssS as $ssSkey => $ssSValue)
			      				<tr>
				      				<td>{{ $ssSkey }}</td>
				      			@foreach($ssSValue as $key => $value)
				      				<td>{{ $value }}%</td>
				      			@endforeach
				      			</tr>
					      	@endforeach
			      		</tbody>
			      	</table>
			      </div>
			    </div>
			  </div>
			</div>
		</div>
	</div>
</div>

@endsection