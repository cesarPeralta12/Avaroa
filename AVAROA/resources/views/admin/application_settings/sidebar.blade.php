<div class="card-body">
    <div class="sidebar__item">
        <ul class="sidebar__mail__nav">
            <h5><i class="icofont icofont-gears"></i> {{ __('Global Settings') }}</h5>

            <li>
                <a href="{{ route('settings.general_setting') }}" class="list-item {{ Request::routeIs('settings.general_setting') ? 'active' : '' }}">
                    <i class="icofont icofont-gear"></i>
                    <span>{{ __('Global Settings') }}</span>
                </a>
            </li>

            <li>
                <a href="{{ route('settings.social-login-settings') }}" class="list-item {{ Request::routeIs('settings.social-login-settings') ? 'active' : '' }}">
                    <i class="icofont icofont-social-facebook-messenger"></i>
                    <span>{{ __('Social Login Settings') }}</span>
                </a>
            </li>

            <li>
                <a href="{{ route('settings.currency.index') }}" class="list-item {{ Request::routeIs('settings.currency.index') ? 'active' : '' }}">
                    <i class="icofont icofont-pay"></i>
                    <span>{{ __('Currency Settings') }}</span>
                </a>
            </li>

            <li>
                <a href="{{ route('settings.meta.index') }}" class="list-item {{ Request::routeIs('settings.meta.index') ? 'active' : '' }}">
                    <i class="icofont icofont-papers"></i>
                    <span>{{ __('Meta Management') }}</span>
                </a>
            </li>
        </ul>
    </div>

    <br>
    <div class="sidebar__item">
        <ul class="sidebar__mail__nav">
            <h5><i class="icofont icofont-earth"></i> {{ __('Location Settings') }}</h5>

            <li>
                <a href="{{ route('settings.location.country.index') }}" class="list-item {{ Request::routeIs('settings.location.country.index') ? 'active' : '' }}">
                    <i class="icofont icofont-location-pin"></i>
                    <span>{{ __('Country') }}</span>
                </a>
            </li>
            <li>
                <a href="{{ route('settings.location.state.index') }}" class="list-item {{ Request::routeIs('settings.location.state.index') ? 'active' : '' }}">
                    <i class="icofont icofont-map-pins"></i>
                    <span>{{ __('State') }}</span>
                </a>
            </li>
            <li>
                <a href="{{ route('settings.location.city.index') }}" class="list-item {{ Request::routeIs('settings.location.city.index') ? 'active' : '' }}">
                    <i class="icofont icofont-ui-browser"></i>
                    <span>{{ __('City') }}</span>
                </a>
            </li>
        </ul>
    </div>

    <br>
    <div class="sidebar__item">
        <ul class="sidebar__mail__nav">
            <h5><i class="icofont icofont-email"></i> {{ __('Mail Configuration') }}</h5>

            <li>
                <a href="{{ route('settings.mail-configuration') }}" class="list-item {{ Request::routeIs('settings.mail-configuration') ? 'active' : '' }}">
                    <i class="icofont icofont-envelope-open"></i>
                    <span>{{ __('Mail Configuration') }}</span>
                </a>
            </li>
        </ul>
    </div>

    <br>
    <div class="sidebar__item">
        <ul class="sidebar__mail__nav">
            <h5><i class="icofont icofont-brainstorming"></i> {{ __('Payment Options') }}</h5>

            <li>
                <a href="{{ route('settings.payment_method_settings') }}" class="list-item {{ Request::routeIs('settings.payment_method_settings') ? 'active' : '' }}">
                    <i class="icofont icofont-money-bag"></i>
                    <span>{{ __('Payment Method') }}</span>
                </a>
            </li>
            <li>
                <a href="{{ route('settings.bank.index') }}" class="list-item {{ Request::routeIs('settings.bank.index') ? 'active' : '' }}">
                    <i class="icofont icofont-court"></i>
                    <span>{{ __('Bank') }}</span>
                </a>
            </li>
        </ul>
    </div>

    <br>
    <div class="sidebar__item">
        <ul class="sidebar__mail__nav">
            <h5><i class="icofont icofont-live-support"></i> {{ __('Support Ticket') }}</h5>

            <li>
                <a href="{{ route('settings.support-ticket.cms') }}" class="list-item {{ Request::routeIs('settings.support-ticket.cms') ? 'active' : '' }}">
                    <i class="icofont icofont-headphone-alt"></i>
                    <span>{{ __('Support Ticket CMS') }}</span>
                </a>
            </li>
            <li>
                <a href="{{ route('settings.support-ticket.question') }}" class="list-item {{ Request::routeIs('settings.support-ticket.question') ? 'active' : '' }}">
                    <i class="icofont icofont-support-faq"></i>
                    <span>{{ __('Question & Answer') }}</span>
                </a>
            </li>

            <li>
                <a href="{{ route('settings.support-ticket.department') }}" class="list-item {{ Request::routeIs('settings.support-ticket.department') ? 'active' : '' }}">
                    <i class="icofont icofont-files"></i>
                    <span>{{ __(' Ticket Department Field') }}</span>
                </a>
            </li>
            <li>
                <a href="{{ route('settings.support-ticket.priority') }}" class="list-item {{ Request::routeIs('settings.support-ticket.priority') ? 'active' : '' }}">
                    <i class="icon-headphone-alt"></i>
                    <span>{{ __(' Ticket Priority Field') }}</span>
                </a>
            </li>
            <li>
                <a href="{{ route('settings.support-ticket.services') }}" class="list-item {{ Request::routeIs('settings.support-ticket.services') ? 'active' : '' }}">
                    <i class="icofont icofont-company"></i>
                    <span>{{ __(' Ticket Related Service') }}</span>
                </a>
            </li>
        </ul>
    </div>

    <br>
    <div class="sidebar__item">
        <ul class="sidebar__mail__nav">
            <h5><i class="icofont icofont-award"></i> {{ __('About Us') }}</h5>

            <li>
                <a href="{{ route('settings.about.gallery-area') }}" class="list-item {{ Request::routeIs('settings.about.gallery-area') ? 'active' : '' }}">
                    <i class="icofont icofont-multimedia"></i>
                    <span>{{ __('Gallery Area') }}</span>
                </a>
            </li>
            <li>
                <a href="{{ route('settings.about.our-history') }}" class="list-item {{ Request::routeIs('settings.about.our-history') ? 'active' : '' }}">
                    <i class="icofont icofont-briefcase-alt-1"></i>
                    <span>{{ __('Our History') }}</span>
                </a>
            </li>
            <li>
                <a href="{{ route('settings.about.upgrade-skill') }}" class="list-item {{ Request::routeIs('settings.about.upgrade-skill') ? 'active' : '' }}">
                    <i class="icofont icofont-drwaing-tablet"></i>
                    <span>{{ __('Upgrade Skills') }}</span>
                </a>
            </li>
            <li>
                <a href="{{ route('settings.about.team-member') }}" class="list-item {{ Request::routeIs('settings.about.team-member') ? 'active' : '' }}">
                    <i class="icofont icofont-graduate-alt"></i>
                    <span>{{ __('Team Member') }}</span>
                </a>
            </li>

            <li>
                <a href="{{ route('settings.about.client') }}" class="list-item {{ Request::routeIs('settings.about.client') ? 'active' : '' }}">
                    <i class="icofont icofont-throne"></i>
                    <span>{{ __('Client') }}</span>
                </a>
            </li>
        </ul>
    </div>

    <br>
    <div class="sidebar__item">
        <ul class="sidebar__mail__nav">
            <h5><i class="icofont icofont-send-mail"></i> {{ __('Contact Us') }}</h5>

            <li>
                <a href="{{ route('settings.contact.cms') }}" class="list-item {{ Request::routeIs('settings.contact.cms') ? 'active' : '' }}">
                    <i class="icofont icofont-mail"></i>
                    <span>{{ __('Contact Us') }}</span>
                </a>
            </li>
        </ul>
    </div>
</div>
