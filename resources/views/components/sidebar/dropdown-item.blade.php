@props([
    'label' => $label,
    'link' => $link ?? 'javascript:void(0)',
    'activeCondition' => $activeCondition ?? false,
])

<a href="{{ $link }}" class="dropdown-item @if ($activeCondition) active @endif">{{ $label }}</a>
