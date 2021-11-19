@extends('dashboard.layouts.master')

@section('page_content')
<section class="content-main">
    <div class="row">
        <div class="col-12">
            <div class="content-header">
                <h2 class="content-title"> Edit New notifications </h2>
                <div>
                    <a  href="{{ route('notifications.index') }}" class="btn btn-md rounded font-sm hover-up">   Show All notifications</a>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="card mb-4">
                <div class="card-header">
                    <h4>Basic</h4>
                </div>
                <form method="POST" action="{{ route('notifications.update',$notification->id) }}">

                    <div class="card-body">
                    @csrf
                    @method('PUT')
                    
                    <div class="mb-4">
                        <label for="title_ar" class="form-label">title Arbic</label>
                        <input type="text"  class="form-control @error('title_ar') is-invalid @enderror" name="title_ar" value="{{ $notification->title_ar }}">
                        @error('title_ar')
                            <p class="text-danger"> {{ $message }} </p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="title_en" class="form-label">title English</label>
                        <input type="text"  class="form-control @error('title_en') is-invalid @enderror" name="title_en" value="{{ $notification->title_en }}">
                        @error('title_en')
                            <p class="text-danger"> {{ $message }} </p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="form-label">message Arbic</label>
                        <textarea name="message_ar" id="input" class="form-control @error('message_ar') is-invalid @enderror" rows="3" required="required"> {{ $notification->message_ar }} </textarea>
                        @error('message_ar')
                            <p class="text-danger"> {{ $message }} </p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="form-label">message English</label>
                        <textarea name="message_en" id="input" class="form-control @error('message_en') is-invalid @enderror" rows="3" required="required"> {{ $notification->message_en }} </textarea>
                        @error('message_en')
                            <p class="text-danger"> {{ $message }} </p>
                        @enderror
                    </div>

                    <div class="col-sm-12 mb-3">
                        <label class="form-label"> Activation </label>
                        <select name="status" class="form-select">
                            <option value="1" {{ $notification->status == '1' ? 'selected' : '' }}> Enabled </option>
                            <option value="0" {{ $notification->status == '0' ? 'selected' : '' }}> Disabled </option>
                        </select>
                    </div>

                    </div>
                    <div class="card-footer">
                        <button class="btn btn-md rounded font-sm hover-up" style="float:right">
                              back  <i class="fas fa-arrow-left"></i>
                        </button>
                        <button class="btn btn-md rounded font-sm hover-up">
                            <i class="fas fa-plus"></i> Add 
                        </button>
                    </div>
                </form>
            </div> <!-- card end// -->

        </div>
    </div>
</section> <!-- content-main end// -->
@endsection


@section('scripts')
<script src="{{ asset('plugin/tinymce.min.js') }}" referrerpolicy="origin"></script>
<script>
  $( function() {
        $( "#sortable" ).sortable();
  });
  tinymce.init({
      selector: 'textarea',
      plugins: 'advlist autolink lists link image charmap print preview hr anchor pagebreak',
      toolbar_mode: 'floating',
   });
</script>

@endsection