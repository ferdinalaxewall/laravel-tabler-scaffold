@props([
    'label' => $label,
    'icon' => $icon,
    'activeCondition' => $activeCondition ?? false,
])


<li class="nav-item dropdown @if ($activeCondition) active @endif">
    <a class="nav-link dropdown-toggle" href="#navbar-base" data-bs-toggle="dropdown"
        data-bs-auto-close="false" role="button" aria-expanded="false">
        <i class="bx {{ $icon }}"></i>
        <span class="nav-link-title">{{ $label }}</span>
    </a>
    <div class="dropdown-menu @if ($activeCondition) show @endif">
        {{ $slot }}
    </div>
</li>
