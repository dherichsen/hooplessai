<footer class="bg-cream-dark pt-10 pb-8 px-6 md:px-10">
  <div class="flex flex-col lg:flex-row mb-10 md:mb-16 gap-10 lg:gap-0">
    <div class="lg:w-[45%]">
      <p class="font-sans font-medium text-base text-ink mb-4 md:mb-6">Contact</p>
      <div class="flex gap-10 md:gap-16">
        <div class="flex flex-col gap-2">
          <a href="mailto:{{ $siteSettings['contact_email'] ?? 'hello@hoopless.ai' }}" class="text-lg md:text-[22px] font-light text-ink hover:opacity-60 transition-opacity" style="text-decoration: none;">{{ $siteSettings['contact_email'] ?? 'hello@hoopless.ai' }}</a>
          <a href="{{ route('about') }}" class="text-lg md:text-[22px] font-light text-ink hover:opacity-60 transition-opacity" style="text-decoration: none;">Careers</a>
        </div>
        <div class="flex flex-col gap-2">
          @if(!empty($siteSettings['linkedin_url']))
          <a href="{{ $siteSettings['linkedin_url'] }}" class="text-lg md:text-[22px] font-light text-ink hover:opacity-60 transition-opacity" style="text-decoration: none;" target="_blank" rel="noopener">LinkedIn</a>
          @endif
          @if(!empty($siteSettings['twitter_url']))
          <a href="{{ $siteSettings['twitter_url'] }}" class="text-lg md:text-[22px] font-light text-ink hover:opacity-60 transition-opacity" style="text-decoration: none;" target="_blank" rel="noopener">Twitter</a>
          @endif
        </div>
      </div>
    </div>
    <div class="lg:w-[55%]">
      <p class="font-sans font-medium text-base text-ink mb-4 md:mb-6">Offices</p>
      <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 sm:gap-10">
        @foreach($siteSettings['offices'] ?? [['city' => 'Boulder', 'address' => "1942 Broadway, Suite 314,\nBoulder, CO 80302"], ['city' => 'Columbus', 'address' => "21 E State St, Suite 200,\nColumbus, OH 43215"]] as $office)
        <div>
          <p class="font-sans font-medium text-base text-ink mb-2">{{ $office['city'] }}</p>
          <p class="text-sm font-light leading-relaxed text-ink/70">{!! nl2br(e($office['address'])) !!}</p>
        </div>
        @endforeach
      </div>
    </div>
  </div>
  <div class="flex items-center justify-between border-t border-ink/10 pt-6">
    <div class="theme-toggle" id="theme-toggle">
      <span class="toggle-label active">Light</span>
      <div class="toggle-track">
        <div class="toggle-thumb"></div>
      </div>
      <span class="toggle-label">Dark</span>
    </div>
    <a href="#" class="font-sans text-sm text-ink/60 hover:text-ink transition-colors" style="text-decoration: none;">Legal notices</a>
  </div>
</footer>
