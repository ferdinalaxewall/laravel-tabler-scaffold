@props([
    'title' => $title,
    'subtitle' => $subtitle ?? null,
])


<div class="page-header">
    <div class="row align-items-center">
        <div class="col">
            @if (!is_null($subtitle))
                <div class="page-pretitle">{{ $subtitle }}</div>
            @endif
            <h2 class="page-title">{{ $title }}</h2>
        </div>
        <div class="col-auto ms-auto">
            <div class="btn-list">
                {{ $slot }}
            </div>
        </div>
    </div>
</div>
