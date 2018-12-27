<form class="form-inline" action="" role="form">
    <div class="form-group input-group-sm">
        <input class="form-control" type="text" name="keyword" value="{{ $search['keyword'] or '' }}" placeholder="关键词">
    </div>

    <div class="form-group input-group-sm">
        <label>起止时间</label>
        <input class="form-control date" type="text" name="start_time" value="{{ $search['start_time'] or '' }}" placeholder=""> 到
        <input class="form-control date" type="text" name="end_time" value="{{ $search['end_time'] or '' }}" placeholder="">
    </div>
    <button class="btn btn-default" type="submit">房源搜索</button>
</form>