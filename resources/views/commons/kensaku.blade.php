<form action="{{url('search/result')}}" method="GET" class="form-area">
    {{ csrf_field()}}
    <div class="input-group kensaku-area">
        <div class="input-group-prepend">
            <span class="input-group-text"><i class="fas fa-search" id="search-addon"></i></span>
        </div>
        <input type="text" name="keyword" class="form-control">
        <input type="submit" value="検索" class="btn btn-primary search-btn" placeholder="keyword" aria-label="keyword"
            aria-describedby="search-addon">
    </div>
</form>