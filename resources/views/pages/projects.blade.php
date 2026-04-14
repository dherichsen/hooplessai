@extends('layouts.app')

@section('title', 'hoopless.ai — Projects')

@section('content')
  <section class="relative pt-[100px] md:pt-[140px] pb-8 md:pb-12">
    <div class="content-pad">
      <h1 class="reveal text-h1-sm md:text-h1-md lg:text-h1 font-light text-ink">Projects</h1>
      <p class="reveal reveal-delay-1 text-base md:text-lg font-light text-ink/70 mt-4 max-w-[520px] leading-relaxed">Work we've shipped for clients and tools we've open-sourced for the community.</p>
    </div>
  </section>

  <section class="content-pad pb-8 md:pb-12">
    <div class="reveal flex gap-8 border-b border-ink/10 pb-0">
      <button class="filter-tab active" data-filter="all">All</button>
      <button class="filter-tab" data-filter="client">Client Projects</button>
      <button class="filter-tab" data-filter="oss">Open Source</button>
    </div>
  </section>

  <section class="content-pad pb-16 md:pb-24 lg:pb-[120px]">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 md:gap-10" id="project-grid">
      @foreach($projects as $index => $project)
      <div class="project-card reveal {{ $index % 2 ? 'reveal-delay-1' : '' }}" data-type="{{ $project->category }}">
        @if($project->category === 'client')
        <div class="group relative overflow-hidden rounded-lg h-[260px] md:h-[320px] mb-4">
          <img src="{{ $project->image ? (str_starts_with($project->image, 'http') ? $project->image : asset('storage/' . $project->image)) : 'https://placehold.co/800x400/1a1a2e/4a4a6a?text=' . urlencode($project->title) }}" alt="{{ $project->title }}" class="w-full h-full object-cover">
          <div class="absolute inset-0 bg-ink/40 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end p-6">
            @if($project->case_study_url)
            <a href="{{ $project->case_study_url }}" class="pill-btn text-sm" style="color: #F8F5FF; border-color: #F8F5FF;"><span class="btn-label">View case study</span><span class="btn-arrow"><svg viewBox="0 0 24 24"><path d="M7 17L17 7M17 7H7M17 7V17"/></svg></span></a>
            @endif
          </div>
        </div>
        @else
        <div class="group relative overflow-hidden rounded-lg h-[260px] md:h-[320px] mb-4 bg-ink/5 flex items-center justify-center">
          <div class="text-center px-8">
            <p class="font-sans font-medium text-ink/30 text-sm mb-3">OPEN SOURCE</p>
            <p class="font-serif text-h2-sm font-light text-ink">{{ $project->title }}</p>
            @if($project->language || $project->stars)
            <p class="font-sans text-sm text-ink/50 mt-2">{{ $project->language }}{{ $project->language && $project->stars ? ' · ' : '' }}{{ $project->stars }}</p>
            @endif
          </div>
          @if($project->github_url)
          <div class="absolute inset-0 bg-ink/40 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end p-6">
            <a href="{{ $project->github_url }}" class="pill-btn text-sm" style="color: #F8F5FF; border-color: #F8F5FF;" target="_blank" rel="noopener"><span class="btn-label">GitHub</span><span class="btn-arrow"><svg viewBox="0 0 24 24"><path d="M7 17L17 7M17 7H7M17 7V17"/></svg></span></a>
          </div>
          @endif
        </div>
        @endif
        <p class="font-sans font-medium text-sm text-primary-400 mb-1">{{ $project->category === 'client' ? 'Client Project' : 'Open Source' }}</p>
        <h3 class="text-h2-sm font-light text-ink mb-2">{{ $project->title }}</h3>
        <p class="text-sm font-light text-ink/60 leading-relaxed">{{ $project->description }}</p>
      </div>
      @endforeach
    </div>
  </section>

  <section class="content-pad pb-16 md:pb-24">
    <div class="reveal">
      <h2 class="text-display-sm md:text-display-md lg:text-display font-light text-ink mb-6">Have a project in mind?</h2>
      <a href="{{ route('contact') }}" class="pill-btn"><span class="btn-label">Get in touch</span><span class="btn-arrow"><svg viewBox="0 0 24 24"><path d="M7 17L17 7M17 7H7M17 7V17"/></svg></span></a>
    </div>
  </section>
@endsection
