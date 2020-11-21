@if ($errors->any())
<div class="alert alert-danger">
  <ul>
    @foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
  </ul>
</div>
@endif
<div class="modal fade" id="myModal9" z-index="1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">{{ __('adminstaticword.AddCategory') }}</h4>
      </div>
      <div class="modal-body">
        <form action="{{ route('cat.store') }}" method="POST">
          {{ csrf_field() }}
          <label for="category">{{ __('adminstaticword.Name') }}:<sup class="redstar">*</sup></label>
          <input required placeholder="Enter Category name" type="text" class="form-control" name="category">
          <br>

          <div class="col-md-12 form-group">
                   
            <label for="exampleInputDetails">{{ __('adminstaticword.Status') }}:</label>
            <br>
            <li class="tg-list-item">
              <input class="tgl tgl-skewed" id="c1001"  type="checkbox"/>
              <label class="tgl-btn" data-tg-off="Deactive" data-tg-on="Active" for="c1001"></label>
            </li>
            <input type="hidden" name="status" value="0" id="t1001">
          </div>
          <input type="submit" value="Save" class="btn btn-md btn-primary">
        </form>
      </div>

    </div>
  </div>
</div>