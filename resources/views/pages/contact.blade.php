@extends('layouts.app')

@section('title', 'hoopless.ai — Contact')

@section('content')
  <section class="relative pt-[100px] md:pt-[140px] pb-8 md:pb-12">
    <div class="content-pad">
      <h1 class="reveal text-h1-sm md:text-h1-md lg:text-h1 font-light text-ink">{{ $page->hero_title ?? "Let's talk" }}</h1>
      <p class="reveal reveal-delay-1 text-base md:text-lg font-light text-ink/60 mt-4 max-w-[520px] leading-relaxed">{{ $page->hero_body ?? "Whether you have a project in mind or just want to explore what AI can do for your business — we'd love to hear from you." }}</p>
    </div>
  </section>

  <section class="content-pad pb-16 md:pb-24 lg:pb-[120px]">
    <div class="flex flex-col lg:flex-row gap-16 lg:gap-24">
      <!-- FORM -->
      <div class="reveal lg:w-3/5 max-w-[600px]">
        @if(session('success'))
        <div class="mb-8 p-4 bg-primary-50 rounded-lg">
          <p class="font-sans text-sm text-primary-700">{{ session('success') }}</p>
        </div>
        @endif

        <form action="{{ route('contact.submit') }}" method="POST" class="space-y-8">
          @csrf
          <div>
            <label class="font-sans text-xs tracking-wide uppercase text-ink/40 mb-2 block">Name</label>
            <input type="text" name="name" required value="{{ old('name') }}" class="w-full bg-transparent border-0 border-b border-ink/20 focus:border-primary-400 font-serif text-lg text-ink pb-3 outline-none transition-colors" placeholder="">
            @error('name')<p class="font-sans text-xs text-red-500 mt-1">{{ $message }}</p>@enderror
          </div>
          <div>
            <label class="font-sans text-xs tracking-wide uppercase text-ink/40 mb-2 block">Email</label>
            <input type="email" name="email" required value="{{ old('email') }}" class="w-full bg-transparent border-0 border-b border-ink/20 focus:border-primary-400 font-serif text-lg text-ink pb-3 outline-none transition-colors" placeholder="">
            @error('email')<p class="font-sans text-xs text-red-500 mt-1">{{ $message }}</p>@enderror
          </div>
          <div>
            <label class="font-sans text-xs tracking-wide uppercase text-ink/40 mb-2 block">Company</label>
            <input type="text" name="company" value="{{ old('company') }}" class="w-full bg-transparent border-0 border-b border-ink/20 focus:border-primary-400 font-serif text-lg text-ink pb-3 outline-none transition-colors" placeholder="">
          </div>
          <div>
            <label class="font-sans text-xs tracking-wide uppercase text-ink/40 mb-2 block">How can we help?</label>
            <select name="service" class="w-full bg-transparent border-0 border-b border-ink/20 focus:border-primary-400 font-serif text-lg text-ink pb-3 outline-none transition-colors appearance-none">
              <option value="">Select a service</option>
              @foreach($services as $service)
              <option value="{{ $service->name }}" {{ old('service') === $service->name ? 'selected' : '' }}>{{ $service->name }}</option>
              @endforeach
              <option value="not-sure" {{ old('service') === 'not-sure' ? 'selected' : '' }}>Not sure yet</option>
            </select>
          </div>
          <div>
            <label class="font-sans text-xs tracking-wide uppercase text-ink/40 mb-2 block">Message</label>
            <textarea name="message" required rows="4" class="w-full bg-transparent border-0 border-b border-ink/20 focus:border-primary-400 font-serif text-lg text-ink pb-3 outline-none transition-colors resize-none" placeholder="">{{ old('message') }}</textarea>
            @error('message')<p class="font-sans text-xs text-red-500 mt-1">{{ $message }}</p>@enderror
          </div>
          <button type="submit" class="pill-btn">
            <span class="btn-label">Send message</span>
            <span class="btn-arrow"><svg viewBox="0 0 24 24"><path d="M7 17L17 7M17 7H7M17 7V17"/></svg></span>
          </button>
        </form>
      </div>

      <!-- INFO -->
      <div class="reveal reveal-delay-1 lg:w-2/5">
        <div class="space-y-10">
          <div>
            <p class="font-sans font-medium text-xs tracking-widest uppercase text-ink/30 mb-3">Email</p>
            <a href="mailto:{{ $siteSettings['contact_email'] ?? 'hello@hoopless.ai' }}" class="text-h2-sm font-light text-ink hover:text-primary-400 transition-colors" style="text-decoration: none;">{{ $siteSettings['contact_email'] ?? 'hello@hoopless.ai' }}</a>
          </div>
          <div>
            <p class="font-sans font-medium text-xs tracking-widest uppercase text-ink/30 mb-3">Offices</p>
            @foreach($siteSettings['offices'] ?? [['city' => 'Boulder', 'address' => "1942 Broadway, Suite 314,\nBoulder, CO 80302"], ['city' => 'Columbus', 'address' => "21 E State St, Suite 200,\nColumbus, OH 43215"]] as $office)
            <div class="mb-4">
              <p class="font-sans font-medium text-base text-ink">{{ $office['city'] }}</p>
              <p class="text-sm font-light text-ink/50 leading-relaxed">{!! nl2br(e($office['address'])) !!}</p>
            </div>
            @endforeach
          </div>
          <div>
            <p class="font-sans font-medium text-xs tracking-widest uppercase text-ink/30 mb-3">Social</p>
            <div class="flex gap-6">
              <a href="#" class="font-sans text-base text-ink/50 hover:text-ink transition-colors" style="text-decoration: none;">LinkedIn</a>
              <a href="#" class="font-sans text-base text-ink/50 hover:text-ink transition-colors" style="text-decoration: none;">Twitter</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
