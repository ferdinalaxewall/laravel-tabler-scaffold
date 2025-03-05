@props([
    'label' => $label,
    'icon' => $icon,
    'link' => $link ?? 'javascript:void(0)',
    'activeCondition' => $activeCondition ?? false,
])

<li class="nav-item @if ($activeCondition) active @endif">
    <a class="nav-link" href="{{ $link }}">
        <i class="bx {{ $icon }}"></i>
        <span class="nav-link-title">{{ $label }}</span>
    </a>
</li>
