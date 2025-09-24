@props([
    'title' => '',
    'description' => '',
    'keywords' => '',
    'canonical' => url()->current(),
    'ogTitle' => null,
    'ogDescription' => null,
    'ogImage' => null,
    'twitterCard' => 'summary_large_image',
    'twitterSite' => null,
    'twitterCreator' => null,
])

<title>{{ $title }}</title>

<meta name="description" content="{{ $description }}">
@if($keywords)
<meta name="keywords" content="{{ $keywords }}">
@endif
<link rel="canonical" href="{{ $canonical }}">

<!-- Open Graph / Facebook -->
<meta property="og:type" content="website">
<meta property="og:title" content="{{ $ogTitle ?? $title }}">
<meta property="og:description" content="{{ $ogDescription ?? $description }}">
@if($ogImage)
<meta property="og:image" content="{{ $ogImage }}">
@endif
<meta property="og:url" content="{{ $canonical }}">

<!-- Twitter -->
<meta name="twitter:card" content="{{ $twitterCard }}">
@if($twitterSite)
<meta name="twitter:site" content="{{ $twitterSite }}">
@endif
@if($twitterCreator)
<meta name="twitter:creator" content="{{ $twitterCreator }}">
@endif
<meta name="twitter:title" content="{{ $ogTitle ?? $title }}">
<meta name="twitter:description" content="{{ $ogDescription ?? $description }}">
@if($ogImage)
<meta name="twitter:image" content="{{ $ogImage }}">
@endif
