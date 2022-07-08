<div class="custom-control custom-switch  ">
    <input type="checkbox" data-id="{{ $data->user_id }}" class="custom-control-input aktif-gak"
        id="{{ 'user' . $data->user_id }}" {{ $data->status ? 'checked' : '' }}>
    <label class="custom-control-label" for="{{ 'user' . $data->user_id }}"></label>
</div>
