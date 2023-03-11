@if (session()->has('message'))
    <div class="alert alert-success" role="alert" x-data="{ show: true }" x-init="setTimeout(() => show = false, 3000)" x-show="show">
        {{ session('message') }}
    </div>
@endif

@if (session()->has('error'))
    <div class="alert alert-danger" role="alert" x-data="{ show: true }" x-init="setTimeout(() => show = false, 3000)" x-show="show">
        {{ session('error') }}
    </div>
@endif
