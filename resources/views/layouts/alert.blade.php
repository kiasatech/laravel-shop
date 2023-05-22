@if(session()->has('success'))
    <div class="alert alert-success d-flex align-items-center justify-content-center mb-2" role="alert">
        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
        <div>
            <strong>{{ session()->get('success') }}</strong>
        </div>
    </div>
@endif

@if(session()->has('error'))
    <div class="alert alert-danger d-flex align-items-center justify-content-center mb-2" role="alert">
        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
        <div>
            <strong>{{ session()->get('error') }}</strong>
        </div>
    </div>
@endif
