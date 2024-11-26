<div class="menu__parent">
    <div class="menu">
        <div class="card shadow">
            <a href="{{ route('goal.index') }}" class="menu__element yellow__background goals"><p>{{ __('menu.goals') }}</p></a>
            <a href="#tasks" class="menu__element green__background tasks"><p>{{ __('menu.tasks') }}</p></a>
            <a href="{{ route('goal.show') }}" class="menu__element blue__background week"><p>{{ __('menu.week') }}</p></a>
            <a href="{{ route('stats.index') }}" class="menu__element red__background completed"><p>{{ __('menu.completed') }}</p></a>
            <a href="#settings" class="menu__element grey__background settings"><p>{{ __('menu.settings') }}</p></a>
            <a href="#logout" class="menu__element black__background logout"><p>{{ __('menu.logout') }}</p></a>
            <p class="hint">{{ __('menu.try_me') }}</p>
        </div>
    </div>
</div>