<div class="modal fade" id="{{ 'delete_'.$order->id }}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">هشدار!</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-center">
                آیا تمایل به حذف این سفارش دارید؟
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">خیر</button>
                <form action="{{ route('orders.destroy', $order->id) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">بله</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!----------------------------------------------------------------->
<!----------------------------------------------------------------->
<div class="modal fade" id="{{ 'edit_'.$order->id }}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">هشدار!</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-center">
                آیا تمایل به ویرایش این سفارش دارید؟
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">خیر</button>
                <a href="{{ route('orders.edit', $order->id) }}" class="btn btn-primary">بله</a>
            </div>
        </div>
    </div>
</div>
