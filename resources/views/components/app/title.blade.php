<div
    @class([
        'app-title-container',
        'title-border' => $border,
        'bg-white' => $background,
    ])
>
    @switch($size)
        @case(TitleSize::SMALL)
            <h3 {{$attributes->merge(['class' => 'app-title-small '.$style])}}>
                {{$value}}
            </h3>
            @break
        @case(TitleSize::MEDIUM)
            <h2 {{$attributes->merge(['class' => 'app-title-medium '.$style])}}>
                {{$value}}
            </h2>
            @break
        @case(TitleSize::LARGE)
            <h1 {{$attributes->merge(['class' => 'app-title-large '.$style])}}>
                {{$value}}
            </h1>
            @break
    @endswitch
    {{$slot}}
</div>
