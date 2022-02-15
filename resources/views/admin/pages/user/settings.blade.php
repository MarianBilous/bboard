@extends('admin.layouts.layout')

@section('content')

    {{ Breadcrumbs::render('settings.index') }}

    <div class="card radius-15">
        <div class="card-body">
            <div class="card-title">
                <h4 class="mb-0">{{ __('user.settings.labels.general_settings') }}</h4>
            </div>
            <hr/>
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('settings.index') ? 'active' : '' }}" href="{{ route('settings.index') }}">
                        {{ __('user.settings.tabs.theme') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('user.index') ? 'active' : '' }}" href="{{ route('user.index') }}">
                        {{ __('user.settings.tabs.administrators') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('roles.index') ? 'active' : '' }}" href="{{ route('roles.index') }}" href="#">
                        {{ __('user.settings.tabs.roles') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('permissions.index') ? 'active' : '' }}" href="{{ route('permissions.index') }}" href="#">
                        {{ __('user.settings.tabs.permissions') }}
                    </a>
                </li>
            </ul>

            @switch(request()->url())
                @case(route('settings.index'))
                    @include('admin.pages.user.settings_page.theme_settings')
                    @break
                @case(route('user.index'))
                    @include('admin.pages.user.settings_page.administrators_settings')
                    @break
                @case(route('roles.index'))
                    @include('admin.pages.user.settings_page.role_settings')
                    @break
                @case(route('permissions.index'))
                    @include('admin.pages.user.settings_page.permissions.permissions_settings')
                    @break
            @endswitch

        </div>
    </div>

    {{--
    <div class="row">
        <div class="col-12 mx-auto">
            <div class="card radius-15">
                <div class="card-body">
                    <div class="card-title">
                        <h4 class="mb-0">{{ __('user.settings.labels.general_settings') }}</h4>
                    </div>
                    <hr/>
                    <div class="row">
                        <div class="col-3">
                            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                <a class="nav-link active" id="v-pills-theme-tab" data-toggle="pill" href="#v-pills-theme" role="tab" aria-controls="v-pills-theme" aria-selected="true">{{ __('user.settings.tabs.theme') }}</a>
                                <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">{{ __('user.settings.tabs.administrators') }}</a>
                                <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">Messages</a>
                                <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">Settings</a>
                            </div>
                        </div>
                        <div class="col-9">
                            <div class="tab-content" id="v-pills-tabContent">
                                <div class="tab-pane fade show active" id="v-pills-theme" role="tabpanel" aria-labelledby="v-pills-theme-tab">
                                    @include('admin.pages.user.settings_page.theme_settings')
                                </div>
                                <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                                    @include('admin.pages.user.settings_page.administrators_settings')
                                </div>
                                <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">Fugiat id quis dolor culpa eiusmod anim velit excepteur proident dolor aute qui magna. Ad proident laboris ullamco esse anim Lorem Lorem veniam quis Lorem irure occaecat velit nostrud magna nulla. Velit et et proident Lorem do ea tempor officia dolor. Reprehenderit Lorem aliquip labore est magna commodo est ea veniam consectetur.</div>
                                <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">Eu dolore ea ullamco dolore Lorem id cupidatat excepteur reprehenderit consectetur elit id dolor proident in cupidatat officia. Voluptate excepteur commodo labore nisi cillum duis aliqua do. Aliqua amet qui mollit consectetur nulla mollit velit aliqua veniam nisi id do Lorem deserunt amet. Culpa ullamco sit adipisicing labore officia magna elit nisi in aute tempor commodo eiusmod.</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    --}}

@endsection
