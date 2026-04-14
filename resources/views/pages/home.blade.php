@extends('layouts.app')

@section('title', 'hoopless.ai — Creating Clarity In A World Of Uncertainty')

@section('content')
  <!-- HERO SECTION -->
  <section class="relative h-[75vh] md:h-[85vh] pt-[64px] md:pt-[80px] flex items-center">
    <div class="content-pad">
      <h1 class="reveal text-h1-sm md:text-h1-md lg:text-h1 font-light text-ink">
        {{ $page->hero_title ?? 'Creating Clarity' }}
      </h1>
      <p class="reveal reveal-delay-1 text-h1-sm md:text-h1-md lg:text-h1 font-light text-ink mt-1">{{ $page->hero_subtitle ?? 'In A World Of Uncertainty' }}</p>
      <p class="reveal reveal-delay-2 text-base md:text-lg font-light text-ink/60 mt-6 max-w-[480px] leading-relaxed">{{ $page->hero_body ?? 'We help onboard businesses and developers into the AI era with custom enterprise-grade solutions.' }}</p>
      <div class="reveal reveal-delay-3 mt-8">
        <a href="{{ route('contact') }}" class="pill-btn"><span class="btn-label">Talk to us</span><span class="btn-arrow"><svg viewBox="0 0 24 24"><path d="M7 17L17 7M17 7H7M17 7V17"/></svg></span></a>
      </div>
    </div>
  </section>

  <!-- INTRO SECTION -->
  <section class="content-pad py-12 md:py-20 lg:py-24">
    <div class="max-w-[660px]">
      <h2 class="reveal text-h2-sm md:text-h2 font-light text-ink">
        A boutique AI firm that builds enterprise-grade software, consults on intelligent systems, and brings businesses online into the world of AI.
      </h2>
      <a href="{{ route('about') }}" class="reveal reveal-delay-1 pill-btn mt-8 md:mt-10 inline-flex">
        <span class="btn-label">What we do</span><span class="btn-arrow"><svg viewBox="0 0 24 24"><path d="M7 17L17 7M17 7H7M17 7V17"/></svg></span>
      </a>
    </div>
  </section>

  <!-- SERVICES SECTION -->
  <section id="services" class="content-pad pb-16 md:pb-24 lg:pb-[150px]">
    <div class="mb-10 md:mb-16">
      <h2 class="reveal text-display-sm md:text-display-md lg:text-display font-light text-ink max-w-[900px]">
        AI Without Jumping Through Hoops
      </h2>
    </div>

    <div class="max-w-[600px] mb-12 md:mb-20">
      <p class="reveal text-base font-light leading-relaxed text-ink">
        Most companies know AI matters. Few know where to start. We sit at the intersection of deep technical capability and real business understanding — building, advising, and implementing so you don't have to figure it out alone.
      </p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-12 lg:gap-10">
      @foreach($services as $index => $service)
      <div class="reveal {{ $index > 0 ? 'reveal-delay-' . $index : '' }}">
        @if($service->icon_svg)
        <div class="w-[200px] h-[200px] md:w-[280px] md:h-[280px] mx-auto mb-8 flex items-center justify-center">
          {!! $service->icon_svg !!}
        </div>
        @endif
        <p class="text-[17px] leading-relaxed">
          <span class="font-sans font-medium">{{ $service->name }}</span>
          <span class="font-light"> {{ $service->description }}</span>
        </p>
        <a href="{{ route('services') }}#{{ $service->slug }}" class="pill-btn mt-6"><span class="btn-label">{{ $service->cta_text }}</span><span class="btn-arrow"><svg viewBox="0 0 24 24"><path d="M7 17L17 7M17 7H7M17 7V17"/></svg></span></a>
      </div>
      @endforeach
    </div>
  </section>

  <!-- TEAM SECTION -->
  <section class="relative py-12 md:py-[90px] overflow-hidden">
    <div>
      <div class="content-pad mb-8 md:mb-12">
        <h2 class="reveal text-display-sm md:text-display-md lg:text-display font-light text-ink">The people behind the work</h2>
      </div>

      <div class="content-pad mb-10 md:mb-16">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-{{ min(count($teamMembers), 4) }} gap-8">
          @foreach($teamMembers as $index => $member)
          <div class="reveal {{ $index > 0 ? 'reveal-delay-' . min($index, 3) : '' }}">
            <div class="relative h-[350px] md:h-[450px] overflow-hidden rounded-lg group">
              <img src="{{ $member->image ? (str_starts_with($member->image, 'http') ? $member->image : asset('storage/' . $member->image)) : 'https://placehold.co/600x800/2d2d2d/666?text=' . urlencode(substr($member->name, 0, 2)) }}" alt="{{ $member->name }}" class="w-full h-full object-cover object-top">
              <div class="absolute inset-0" style="background: linear-gradient(180deg, transparent 50%, rgba(30,27,46,0.6) 100%);"></div>
              <div class="absolute bottom-4 left-4">
                <p class="font-sans font-medium text-white text-lg">{{ $member->name }}</p>
                <p class="font-sans text-white/70 text-sm">{{ $member->role }}</p>
              </div>
            </div>
            <p class="text-sm font-light leading-relaxed text-ink/70 mt-3">{{ $member->bio }}</p>
          </div>
          @endforeach
        </div>
      </div>

      <div class="content-pad">
        <div class="reveal max-w-[460px]">
          <p class="text-[17px] leading-relaxed">
            <span class="font-sans font-medium">Small by design.</span>
            <span class="font-light"> We stay lean so every client works directly with founders — not account managers. The people who architect your solution are the same ones who build it.</span>
          </p>
          <a href="{{ route('about') }}" class="pill-btn mt-6 md:mt-8"><span class="btn-label">Our approach</span><span class="btn-arrow"><svg viewBox="0 0 24 24"><path d="M7 17L17 7M17 7H7M17 7V17"/></svg></span></a>
        </div>
      </div>
    </div>
  </section>

  <!-- STATEMENT SECTION -->
  <section class="relative py-16 md:py-[120px] pb-16 md:pb-[160px]">
    <div class="content-pad">
      <div class="reveal border-t border-ink/10 pt-12 md:pt-16">
        <p class="font-sans font-medium text-xs tracking-widest uppercase text-ink/30 mb-8">Philosophy</p>
        <h2 class="text-h2-sm md:text-h2 lg:text-h1-md font-light text-ink max-w-[900px] leading-snug">
          We don't sell AI as a feature. We treat it as infrastructure — the kind that compounds over time and becomes inseparable from how your business operates.
        </h2>
        <div class="mt-12 md:mt-16 grid grid-cols-1 md:grid-cols-3 gap-6 max-w-[900px]">
          <div class="reveal reveal-delay-1">
            <p class="font-sans font-medium text-[40px] text-primary-400 leading-none mb-2">01</p>
            <p class="font-sans text-sm text-ink/50 leading-relaxed">We build what we advise on. No decks without deliverables.</p>
          </div>
          <div class="reveal reveal-delay-2">
            <p class="font-sans font-medium text-[40px] text-primary-400 leading-none mb-2">02</p>
            <p class="font-sans text-sm text-ink/50 leading-relaxed">We optimize for outcomes, not billable hours. Month-to-month, always.</p>
          </div>
          <div class="reveal reveal-delay-3">
            <p class="font-sans font-medium text-[40px] text-primary-400 leading-none mb-2">03</p>
            <p class="font-sans text-sm text-ink/50 leading-relaxed">You own everything. Code, models, data — no lock-in, no proprietary wrappers.</p>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
