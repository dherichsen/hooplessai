@extends('layouts.app')

@section('title', 'hoopless.ai — Insights')

@section('content')
  <section class="relative pt-[100px] md:pt-[140px] pb-8 md:pb-12">
    <div class="content-pad">
      <h1 class="reveal text-h1-sm md:text-h1-md lg:text-h1 font-light text-ink">Insights</h1>
      <p class="reveal reveal-delay-1 text-base md:text-lg font-light text-ink/60 mt-4 max-w-[520px] leading-relaxed">Perspectives on AI strategy, engineering, and implementation from the hoopless.ai team.</p>
    </div>
  </section>

  <section class="content-pad pb-16 md:pb-24 lg:pb-[120px]">
    <div class="max-w-[700px]">
      @forelse($insights as $insight)
      <article class="reveal py-10 {{ !$loop->last ? 'border-b border-ink/10' : '' }}">
        <p class="font-sans text-sm text-ink/40 mb-3">{{ $insight->published_at?->format('F Y') ?? 'Draft' }}</p>
        <a href="{{ route('insights.show', $insight->slug) }}" class="block group" style="text-decoration: none;">
          <h2 class="text-h2-sm md:text-h2 font-light text-ink group-hover:text-primary-400 transition-colors">{{ $insight->title }}</h2>
        </a>
        <p class="text-base font-light text-ink/50 mt-3 leading-relaxed">{{ $insight->excerpt }}</p>
        <a href="{{ route('insights.show', $insight->slug) }}" class="inline-flex items-center gap-2 font-sans text-sm text-ink/40 hover:text-ink mt-4 border-b border-ink/20 hover:border-ink/50 pb-0.5 transition-colors" style="text-decoration: none;">
          Read more
          <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
        </a>
      </article>
      @empty
      <p class="text-base font-light text-ink/40 py-10">More insights coming soon.</p>
      @endforelse
    </div>
  </section>
@endsection
