@extends('layouts.app')

@section('title', $insight->title . ' — hoopless.ai')
@section('meta_description', $insight->excerpt)

@section('content')
  <section class="relative pt-[100px] md:pt-[140px] pb-8 md:pb-12">
    <div class="content-pad max-w-[700px]">
      <a href="{{ route('insights') }}" class="reveal font-sans text-sm text-ink/40 hover:text-ink transition-colors mb-8 inline-block" style="text-decoration: none;">&larr; Back to Insights</a>
      <p class="reveal reveal-delay-1 font-sans text-sm text-ink/40 mb-4">{{ $insight->published_at?->format('F j, Y') }} &middot; {{ $insight->author }}</p>
      <h1 class="reveal reveal-delay-2 text-display-sm md:text-display-md font-light text-ink">{{ $insight->title }}</h1>
    </div>
  </section>

  <section class="content-pad pb-16 md:pb-24">
    <article class="reveal max-w-[700px] text-base md:text-lg font-light text-ink/70 leading-relaxed space-y-6 [&_h2]:text-h2-sm [&_h2]:font-light [&_h2]:text-ink [&_h2]:mt-12 [&_h2]:mb-4 [&_h3]:text-lg [&_h3]:font-sans [&_h3]:font-medium [&_h3]:text-ink [&_h3]:mt-8 [&_h3]:mb-3 [&_strong]:font-sans [&_strong]:font-medium [&_strong]:text-ink [&_ol]:list-decimal [&_ol]:pl-6 [&_ul]:list-disc [&_ul]:pl-6 [&_li]:mb-2">
      {!! $insight->content !!}
    </article>

    <div class="reveal max-w-[700px] mt-16 pt-12 border-t border-ink/10">
      <p class="text-h2-sm font-light text-ink mb-6">Want to discuss this further?</p>
      <a href="{{ route('contact') }}" class="pill-btn"><span class="btn-label">Get in touch</span><span class="btn-arrow"><svg viewBox="0 0 24 24"><path d="M7 17L17 7M17 7H7M17 7V17"/></svg></span></a>
    </div>
  </section>
@endsection
