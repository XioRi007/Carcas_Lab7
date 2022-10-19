<form method="POST" action="{{route("converter.convert")}}">
    @csrf
    
    @if (Session::has('Converted'))
        <div>
            Converted value = {{ Session::get('Converted') }}
        </div>
    @endif
    <div class="form-control">
        <label for="sum">Сумма</label>
        <input id="sum" name="sum" type="text" class="@error('sum') is-invalid @enderror" value="{{Session::has('sum') ? Session::get('sum') : 0}}">
        @error('sum')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-control">
        <label for="currency">From</label>
        {{Form::select("currency_from", $currencies ?? [], Session::has('currency_from') ? Session::get('currency_from') : "Ukrainian Hryvnia")}}
        @error('currency_from')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-control">
        <label for="currency">To</label>
        {{Form::select("currency_to", $currencies ?? [], Session::has('currency_to') ? Session::get('currency_to') : "Ukrainian Hryvnia")}}
        @error('currency_to')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-control">
        <button type="submit">Ok</button>
    </div>
</form>
<?php

