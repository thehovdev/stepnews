@extends('layouts.app')
<style>
.card {
  background-color: white;
  padding: 20px;
  margin-top: 20px;
}
.card .card-content{
    font-size: 20px;
}
.card h2{
    text-decoration: underline;
}
.card .card-date{
    text-align: right;
}
</style>
@section('content')
<div class="card">
      <h2 style="text-align: center">{{ $post->langs->first()->title }} <span class="badge badge-secondary">{{ $post->category->langs->first()->name }}</span></h2>
      <p class="card-content">{{$post->langs->first()->content}}</p>
      <div class="card-date">
      <p>Created: <?= date_format($post->created_at, "d F Y (H:i)") ?></p>
      <?php 
        if ($post->updated_at != $post->created_at) : ?>
        <p>Updated: <?= date_format($post->updated_at, "d F Y (H:i)") ?></p>
        <?php endif;?>
      </div>
</div>
@endsection