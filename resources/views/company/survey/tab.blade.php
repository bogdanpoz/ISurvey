<ul class="nav nav-tabs" id="myTab" role="tablist">
	<li class="nav-item">
		<a class="nav-link @if($activeTab == 'general') active @endif" href="{{ route('company.surveys.edit', $survey) }}">{{ __('General') }}</a>
	</li>
	<li class="nav-item">
		<a class="nav-link @if($activeTab == 'questions') active @endif" href="{{ route('company.surveys.questions.index', $survey) }}">{{ __('Questions') }}</a>
	</li>
    <li class="nav-item">
		<a class="nav-link @if($activeTab == 'design') active @endif" href="{{ route('company.surveys.design.edit', $survey) }}">{{ __('Design') }}</a>
	</li>
	<li class="nav-item">
		<a class="nav-link @if($activeTab == 'share') active @endif" href="{{ route('company.surveys.share.show', $survey) }}">{{ __('Share') }}</a>
	</li>
	<li class="nav-item">
		<a class="nav-link @if($activeTab == 'result') active @endif" href="{{ route('company.surveys.result.index', $survey) }}">{{ __('Results') }}</a>
	</li>
	<li class="nav-item">
		<a class="nav-link @if($activeTab == 'settings') active @endif" href="{{ route('company.surveys.settings.index', $survey) }}">{{ __('Settings') }}</a>
	</li>
</ul>