<div class="row">

	<div class="col-xs-12 col-sm-12 col-md-12">

		<div class="form-group">

			<label for="name">Nome do Setor</label>
			<input type="name" class="form-control" id="name" placeholder="name"  value="{{$sector->name}}">		

		</div>

		<div class="form-group" >

			<select id="secretary_id" name="secretary_id" class="form-control" placeholder="Secretaria"> 
				<option value="">Selecione</option> 
				@foreach ($secretaries as $secretary) 
				<option value="{{ $secretary->id }}" {{ ($sector && $sector->secretary_id === $secretary->id)? 'selected' : null }}>{{ $secretary->name }}</option> 
				@endforeach 
			</select> 



		</div>



		<div class="col-xs-12 col-sm-12 col-md-12 text-center">

			<button type="submit" class="btn btn-primary">Submit</button>

		</div>

