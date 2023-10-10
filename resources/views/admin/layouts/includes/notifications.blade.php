<div id="notifications" class="row no-print">
    <div class="col-md-12">
        @if ($errors->any())
            <div class="noti-alert pad no-print">
                <div class="alert alert-danger alert-dismissable d-flex justify-content-between">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
        @endif
        <div class="noti-alert pad no-print">
            @foreach (['success', 'danger', 'fail', 'warning', 'info'] as $msg)
                @if ($message = Session::get($msg))
                    <div
                        class="alert alert-{{ $msg == 'fail' ? 'danger' : $msg }} fade show d-flex justify-content-between align-items-center">
                        <strong>{!! $message !!}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
            @endforeach
        </div>
        <div class="top-notification noti-alert pad no-print js-alert d-none">
            <div class="alert alert-success">
                <strong class="alertText"></strong>
                <button type="button" class="btn-close float-right notification-close" aria-label="Close"></button>
            </div>
        </div>
    </div>
</div>
