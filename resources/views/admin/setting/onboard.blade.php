<form action="{{ route('api.onboard') }}" method="POST"  enctype="multipart/form-data">
                    {{ csrf_field() }}
                    {{ method_field('POST') }}
            
            <div class="row">
              <div class="col-md-12">
                            <label for="s_enable">Onboard Content</label>
                            @if(count($onboard)>0)
                            @foreach($onboard as $key=>$value)
                            <div class="row">
                              <div class="col-md-4">
                                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                  <label for="">Name:</label>
                                  <input type="name" name="name[]" class="form-control" id="name" required="" placeholder="Enter name" value="{!!$value->name!!}">
                                  <input type="hidden" name="id[]" value="{!!$value->id!!}">
                                  <small class="text-danger">{{ $errors->first('name','Name is required !') }}</small>
                                </div>
                              </div>
                              <div class="col-md-4">
                                <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                                  <label for="">Description:</label>
                                  <textarea placeholder="Enter description" class="form-control" name="description[]" id="description" cols="20" rows="5">{{ $value->description }}
                                  </textarea>
                                  <small class="text-danger">{{ $errors->first('description','Meta Keyword Cannot be blank !') }}</small>
                                </div>
                              </div>
                              <div class="col-md-4">
                                <div class="form-group{{ $errors->has('meta_data_keyword') ? ' has-error' : '' }}">
                                  <label for="">Image:</label>
                                  <input type="file" name="image[]" id="image" class="form-control">
                                  <div>
                                    <img src="{!!$value->image!!}" style="width: 100px;">
                                  </div>
                                </div>
                              </div>
                            </div>
                            <br>
                            @endforeach
                            @endif
                        </div>
                    </div>

            <div class="box-footer">
                      <button value="" type="submit"  class="btn btn-lg col-md-4 btn-primary">{{ __('adminstaticword.Save') }}</button>
                    </div>

                </form>