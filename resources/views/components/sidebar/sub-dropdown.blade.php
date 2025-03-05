@props([
    'label' => $label,
    'activeCondition' => $activeCondition ?? false,
])

<div class="dropend">
    <a class="dropdown-item dropdown-toggle @if ($activeCondition) active @endif" href="#sidebar-authentication" data-bs-toggle="dropdown" data-bs-auto-close="false" role="button" aria-expanded="false">
        {{ $label }}
    </a>
    <div class="dropdown-menu @if ($activeCondition) show @endif">
        {{ $slot }}
    </div>
</div>
