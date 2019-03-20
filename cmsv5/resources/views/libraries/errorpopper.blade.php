@if($message = Session::get('error'))
<div class="alert alert-danger">
  {{$message}}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif
@if($message = Session::get('a-success'))
<div class="alert alert-success">
  {{$message}}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif
@if(count($errors) > 0)
  @foreach($errors->all() as $error)
    <div class="alert alert-danger">
      <?php
      include './include/error-list.php';
      echo str_replace($searchVal, $replaceVal, $error); ?>
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
  @endforeach
@endif
