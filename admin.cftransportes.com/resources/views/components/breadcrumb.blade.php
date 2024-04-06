<div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb"> 
    <h1 class="page-title fw-semibold fs-18 mb-0">{{ __($title) }}</h1> 
    <div class="ms-md-1 ms-0">
    <nav> 
        <ol class="breadcrumb mb-0">
            @foreach ($items as $item)
                <li class="breadcrumb-item">
                    <a href="javascript:void(0);">{{ __($item) }}</a>
                </li> 
            @endforeach 
            <li class="breadcrumb-item active" aria-current="page">{{ __($lastItem) }}</li> 
        </ol> 
    </nav> 
</div>
</div>
