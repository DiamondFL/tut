<h3><strong>Bình luận</strong></h3>
   <input onkeydown="setComment('{{auth()->user()->id}}','{{auth()->user()->id}}','{{$product->id}}')" type="text" class="form-control" placeholder="Bình luận ..." id="message">
   <hr>
   <input hidden="" id="commented" value="{{auth()->user()->id}}">
   <input hidden="" id="commenter" value="{{auth()->user()->fullname}}">
<div class="col-lg-12" id="contentComment" style="margin-bottom: 20px;">
<hr>
</div>