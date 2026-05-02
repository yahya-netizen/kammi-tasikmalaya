@props(['title', 'subtitle' => null, 'breadcrumb' => []])

<div class="page-header">
    <svg style="position:absolute;right:-50px;top:20px;width:240px;opacity:.05;transform:rotate(15deg);" viewBox="0 0 120 150"><use href="#payung-geulis"/></svg>
    <svg style="position:absolute;left:-50px;bottom:20px;width:180px;opacity:.05;transform:rotate(-15deg);" viewBox="0 0 120 150"><use href="#payung-geulis"/></svg>
    
    <div class="page-header-inner fade-up">
        @if(!empty($breadcrumb))
        <div class="breadcrumb">
            <a href="{{ url('/') }}">Beranda</a>
            @foreach($breadcrumb as $label => $link)
                <span>/</span>
                @if(!$loop->last)
                    <a href="{{ $link }}">{{ $label }}</a>
                @else
                    <span class="current">{{ $label }}</span>
                @endif
            @endforeach
        </div>
        @endif
        
        <h1 class="page-title">{{ $title }}</h1>
        @if($subtitle)
            <p class="page-subtitle">{{ $subtitle }}</p>
        @endif
    </div>
</div>
