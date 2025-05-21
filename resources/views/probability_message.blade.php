<div class="col-md-12 alert alert-danger">
        Sum of all prizes probability must be 100%. Currently its {{ getProbability() }} % you have yet to add  {{ 100 - getProbability() }} % to the prize.
        
</div>

@error('title')
<div class="alert alert-danger">
    {{ $message }}
</div>
@enderror

@error('probability')
<div class="alert alert-danger">
    {{ $message }}
</div>
@enderror