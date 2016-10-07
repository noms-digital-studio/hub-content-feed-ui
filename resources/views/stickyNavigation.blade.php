<div class="top-navigation">
    <div class="row">
        <div class="col-xs-12">
            <a href="/" class="back-to-hub">
                <span class="icon icon-icon-hub" aria-hidden="true"></span>
                <div class="back-to-the-hub-text">
                    {{ trans('navigation.title') }}
                </div>
            </a>

            <div class="navigation-title {{ $colour }}">
                <a href="{{ $titleLink }}">
                    <span class="icon {{ $icon }}" aria-hidden="true"></span>
                    {{ $title }}
                </a>
            </div>
            <div class="dropdown">
                <button class="language-button" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                    English
                    <span class="caret"></span>
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                    <li><a href="#">English</a></li>
                    <li><a href="#">Welsh</a></li>
                </ul>
            </div>

        </div>
    </div>
</div>