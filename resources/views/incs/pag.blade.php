<div class="d-flex">
    <div class="mx-auto pagination-sm">
        {{$data->appends(request()->query())->links()}}
    </div>
</div>
