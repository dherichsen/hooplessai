@extends('layouts.app')

@section('title', 'hoopless.ai — Services')

@section('content')
  <section class="relative pt-[100px] md:pt-[140px] pb-8 md:pb-12">
    <div class="content-pad">
      <h1 class="reveal text-h1-sm md:text-h1-md lg:text-h1 font-light text-ink">{{ $page->hero_title ?? 'What We Build' }}</h1>
      <p class="reveal reveal-delay-1 text-base md:text-lg font-light text-ink/60 mt-4 max-w-[520px] leading-relaxed">{{ $page->hero_body ?? 'Enterprise-grade AI systems, strategic consulting, and seamless integration — tailored to where you are in your AI journey.' }}</p>
    </div>
  </section>

  @foreach($services as $index => $service)
  <section id="{{ $service->slug }}" class="content-pad py-12 md:py-20 {{ $loop->last ? 'pb-16 md:pb-[150px]' : '' }}">
    <div class="max-w-[800px]">
      <h2 class="reveal text-display-sm md:text-display-md font-light text-ink mb-6">{{ $service->name }}</h2>
      <p class="reveal reveal-delay-1 text-h2-sm md:text-h2 font-light text-ink/70 mb-8">{{ $service->description }}</p>
      @if($service->detailed_description)
      <div class="reveal reveal-delay-2 text-base font-light text-ink/50 leading-relaxed prose prose-lg">
        {!! nl2br(e($service->detailed_description)) !!}
      </div>
      @endif
    </div>
  </section>
  @endforeach

  <section class="content-pad pb-16 md:pb-24">
    <div class="reveal">
      <h2 class="text-display-sm md:text-display-md lg:text-display font-light text-ink mb-6">Ready to start?</h2>
      <a href="{{ route('contact') }}" class="pill-btn"><span class="btn-label">Get in touch</span><span class="btn-arrow"><svg viewBox="0 0 24 24"><path d="M7 17L17 7M17 7H7M17 7V17"/></svg></span></a>
    </div>
  </section>
@endsection
