@extends('theme.liveclass')
@section('title', 'Live Class')
@section('content')

@include('admin.message')

<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
<style type="text/css">
    #footer{display: none;}
</style>
  <!-- main wrapper -->
  <section>
      <iframe id="myIframe" src="{!!$url!!}/{!!$class_id!!}" style="position: fixed;top: 0px;left: 0px;border: 0px;bottom: 0px;height: 100%;width: 100%;" allow="microphone; camera" onload="if(this.contentWindow.location == {!!\URL::to('/') !!}){ window.close();}"></iframe>
  </section>
  <script type="text/javascript">
    $(document).ready(function(){
      $("iframe").load(function(){
        $(this).contents().on("mousedown, mouseup, click", function(){
          alert("Click detected inside iframe.");
        });
      });
    });
  </script>
@endsection