@extends('layouts.app')

@section('title', 'hoopless.ai — About')

@section('content')
  <!-- HERO -->
  <section class="relative h-[75vh] md:h-[85vh] pt-[64px] md:pt-[80px] flex items-center">
    <div class="content-pad">
      <h1 class="reveal text-h1-sm md:text-h1-md lg:text-h1 font-light text-ink">
        {{ $page->hero_title ?? 'A different kind of firm' }}
      </h1>
      <p class="reveal reveal-delay-1 text-base md:text-lg font-light text-ink/60 mt-6 max-w-[520px] leading-relaxed">
        It's hard to fight upstream in a world filled with AI sensationalism and slop. Our purpose is to help businesses digest what is relevant to them and deploy real-world applications that help them grow.
      </p>
    </div>
  </section>

  <!-- MISSION -->
  <section class="content-pad py-12 md:py-20 lg:py-24">
    <div class="max-w-[660px]">
      <h2 class="reveal text-display-sm md:text-display-md font-light text-ink">
        We're a boutique team of engineers, strategists, and operators who left larger organizations to build something leaner and more honest. We don't sell what we can't build ourselves.
      </h2>
    </div>
  </section>

  <!-- VALUES -->
  <section class="content-pad pb-16 md:pb-24 lg:pb-[150px]">
    <div class="mb-10 md:mb-16">
      <h2 class="reveal text-display-sm md:text-display-md lg:text-display font-light text-ink max-w-[900px]">
        How we operate
      </h2>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-12 lg:gap-10 max-w-[900px]">
      <div class="reveal">
        <p class="font-sans font-medium text-[17px] text-ink mb-2">Founders on every project</p>
        <p class="text-base font-light text-ink/50 leading-relaxed">You work directly with the people who architect and build your solution. No handoffs. No account managers.</p>
      </div>
      <div class="reveal reveal-delay-1">
        <p class="font-sans font-medium text-[17px] text-ink mb-2">Outcomes over output</p>
        <p class="text-base font-light text-ink/50 leading-relaxed">We measure success by what changes in your business, not by deliverables shipped or hours logged.</p>
      </div>
      <div class="reveal reveal-delay-2">
        <p class="font-sans font-medium text-[17px] text-ink mb-2">No lock-in</p>
        <p class="text-base font-light text-ink/50 leading-relaxed">We build on open standards, document everything, and ensure you own your systems fully. If you outgrow us, you keep everything.</p>
      </div>
    </div>
  </section>

  <!-- TEAM -->
  <section class="relative py-12 md:py-[90px] overflow-hidden">
    <div class="content-pad mb-8 md:mb-12">
      <h2 class="reveal text-display-sm md:text-display-md lg:text-display font-light text-ink">The team</h2>
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
  </section>

  <!-- LOCATION -->
  <section class="content-pad py-12 md:py-20">
    <p class="reveal text-h2-sm md:text-h2 font-light text-ink">
      Based in Boulder, Colorado and Columbus, Ohio.
    </p>
  </section>

  <!-- FAQ -->
  @if($faqs->count())
  <section class="content-pad pb-16 md:pb-[160px]">
    <div class="flex flex-col lg:flex-row gap-16 items-start">
      <div class="reveal lg:w-2/5 lg:sticky lg:top-[120px]">
        <h2 class="text-display-sm md:text-display-md font-light text-ink mb-6">Have questions?</h2>
        <p class="text-h2-sm md:text-h2 font-light text-ink/50 leading-relaxed">
          We keep things straightforward. If you don't find what you're looking for,
          <a href="{{ route('contact') }}" class="text-ink/70 hover:text-ink border-b border-ink/20 hover:border-ink/50 transition-colors" style="text-decoration:none;">reach out directly</a>.
        </p>
      </div>
      <div class="reveal reveal-delay-1 lg:w-3/5 space-y-12">
        @foreach($faqs as $category => $items)
        <div>
          <p class="font-sans font-medium text-xs tracking-widest uppercase text-ink/30 mb-4">{{ str_replace('-', ' ', ucfirst($category)) }}</p>
          @foreach($items as $faq)
          <div class="faq-item border-b border-ink/10">
            <button class="faq-trigger" onclick="this.parentElement.classList.toggle('open')">
              <span class="font-serif text-h2-sm font-light text-ink">{{ $faq->question }}</span>
              <svg class="faq-chevron" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M6 9l6 6 6-6"/></svg>
            </button>
            <div class="faq-content"><p class="text-base font-light text-ink/50 leading-relaxed pb-6">{{ $faq->answer }}</p></div>
          </div>
          @endforeach
        </div>
        @endforeach
      </div>
    </div>
  </section>
  @endif
@endsection
