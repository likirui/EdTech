<div class="language-switcher">
    <div class="dropdown">
        <button class="btn btn-link dropdown-toggle" type="button" id="languageDropdown" data-bs-toggle="dropdown" aria-expanded="false">
            {{ (app()->getLocale() === 'en') ? 'English' : 'Spanish' }}
        </button>
        <ul class="dropdown-menu" aria-labelledby="languageDropdown">
            <li>
                <a class="dropdown-item" href="{{ route('setLocale', 'en') }}">
                    English
                </a>
            </li>
            <li>
                <a class="dropdown-item" href="{{ route('setLocale', 'es') }}">
                    Spanish
                </a>
            </li>
        </ul>
    </div>
</div>
