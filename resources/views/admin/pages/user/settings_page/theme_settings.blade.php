<div class="switcher-body">
    {!! Form::model($settings, ['method' => 'patch', 'route' => ['settings.update', 'theme']]) !!}
        <h5 class="mb-0 text-uppercase">{{ __('user.settings.theme.theme_customizer') }}</h5>
        <hr/>
        <p class="mb-0">{{ __('user.settings.theme.gaussian_texture') }}</p>
        <hr>

        <ul class="switcher">
            <li id="theme1"></li>
            <li id="theme2"></li>
            <li id="theme3"></li>
            <li id="theme4"></li>
            <li id="theme5"></li>
            <li id="theme6"></li>
        </ul>
        <hr>
        <p class="mb-0">{{ __('user.settings.theme.gaussian_texture') }}</p>
        <hr>

        <ul class="switcher">
            <li id="theme7"></li>
            <li id="theme8"></li>
            <li id="theme9"></li>
            <li id="theme10"></li>
            <li id="theme11"></li>
            <li id="theme12"></li>
        </ul>

        {!! Form::hidden('value', null, ['id' => 'settings_theme']) !!}
        {!! Form::hidden('item', 'theme') !!}

        <button type="submit" class="btn btn-light m-1 px-5 float-right">{{ __('user.settings.theme.save') }}</button>
    {!! Form::close() !!}
</div>
